<?php

namespace App;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/TLI_ACU/public/', function(Request $request, Response $response){
    $response->getBody()->write("Hello world!");
    return $response;
});
