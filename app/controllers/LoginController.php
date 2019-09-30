<?php

namespace App\Controllers;

use Db\Connect;
use Smarty;
use App\models\UserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginController
{
    /** @var Smarty */
    private $smarty;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->smarty = $smarty = new Smarty();
        $smarty->setTemplateDir('../templates');
        $smarty->setCompileDir('../templates_c');
        $this->userService = new UserService(new Connect());
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function index(Request $request, Response $response): Response
    {
        try {
            $template = $this->smarty->fetch('login.tpl');
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
            $user = $this->userService->getByLogin($request->getAttribute('login'));
            if ($this->userService->comparePassword($user, $request->getAttribute('password'))) {
                $data = ['status'=>'success', 'login'=>$user->getLogin()];
            } else {
                $data = ['status'=>'failed', 'login'=>$user->getLogin()];
            }

            $payload = json_encode($data);
            $response->getBody()->write($payload);

            return $response
                ->withHeader('Content-Type', 'application/json');
        }catch (\Exception $e) {
            return $response->withStatus(500, $e->getMessage());
        }
    }
}
