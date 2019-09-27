<?php

namespace App\Controllers;

use Smarty;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginController
{
    /** @var Smarty */
    private $smarty;

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->smarty = $smarty = new Smarty();
        $smarty->setTemplateDir('../templates');
        $smarty->setCompileDir('../templates_c');
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
        }catch (\Exception $e) {
            return $response->withStatus(500, $e->getMessage());
        }
    }
}
