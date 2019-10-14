<?php

namespace App\Controllers;

use Db\Connect;
use App\models\UserService;
use App\exceptions\NotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginController
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->userService = $GLOBALS['user_service'];
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function index(Request $request, Response $response): Response
    {
        try {
            $template = $GLOBALS['smarty']->fetch('login.tpl');
            $response->getBody()->write($template);

            return $response;
        } catch (\Exception $e) {
            return $response->withStatus(500, $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function login(Request $request, Response $response): Response
    {
        try {
            $user = $this->userService->getByLogin(filter_input(INPUT_POST, 'login'));
            if ($this->userService->comparePassword($user, filter_input(INPUT_POST, 'password'))) {
                $data = ['status'=>'success', 'login'=>$user->getLogin()];
            } else {
                $data = ['status'=>'failed', 'message'=>'Identifiant / mot de passe incorrect'];
            }
        } catch (NotFoundException $e) {
            $data = ['status'=>'failed', 'message'=>$e->getMessage()];
        } catch (\Exception $e) {
            $data = ['status'=>'failed', 'message'=>'Une erreur est survenue'];
        }
        $payload = json_encode($data);
        $response->getBody()->write($payload);

        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}
