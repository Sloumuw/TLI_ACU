<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/', HomeController::class.':index');
$app->get('/login', LoginController::class.':index');
