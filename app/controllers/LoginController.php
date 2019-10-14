<?php

namespace App\Controllers;

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
                session_start();
                $_SESSION['name']=$user->getLogin();
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

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function signUp(Request $request, Response $response): Response
    {
        try {
            if ($request->getMethod() == 'POST') {
                $userInfo = [
                    'login' => $request->getParsedBody()['login'],
                    'password' => $request->getParsedBody()['password']
                ];
                $this->userService->create($userInfo['login'], $userInfo['password']);
                $GLOBALS['smarty']->assign('feedback', 'success');
                $GLOBALS['smarty']->assign('signedMsg', 'Inscription réussie');
            }
        } catch (\PDOException $e) {
            $GLOBALS['smarty']->assign('feedback', 'alert');
            $GLOBALS['smarty']->assign('signedMsg', 'Identifiant déjà utilisé');
        } catch (\Exception $e) {
            return $response->withStatus(500, $e->getMessage());
        }

        $template = $GLOBALS['smarty']->fetch('sign-up.tpl');
        $response->getBody()->write($template);
        return $response;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function logout(Request $request, Response $response): Response
    {
        try {
            session_unset();
            session_destroy();

            $GLOBALS['smarty']->clearAssign('session');
            $GLOBALS['smarty']->assign('disconnect', true);
            $template = $GLOBALS['smarty']->fetch('login.tpl');
            $response->getBody()->write($template);

            return $response;
        } catch (\Exception $e) {
            return $response->withStatus(500, $e->getMessage());
        }
    }
}
