<?php

use App\Controllers\HomeController;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/', HomeController::class.':index');
