<?php

namespace App\Controllers;

use Smarty;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function index(Request $request, Response $response): Response
    {
        try {
            $template = $GLOBALS['smarty']->fetch('base.tpl');
            $response->getBody()->write($template);

            return $response;
        }catch (\Exception $e) {
            return $response->withStatus(500, $e->getMessage());
        }
    }
}
