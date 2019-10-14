<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\models\UserService;
use Db\Connect;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$GLOBALS['smarty'] = new Smarty();
$GLOBALS['smarty']->setTemplateDir('../templates');
$GLOBALS['smarty']->setCompileDir('../templates_c');

$GLOBALS['user_service'] = new UserService(new Connect());

$app->get('/', HomeController::class.':index');
$app->get('/login', LoginController::class.':index');
$app->post('/login-ajax', LoginController::class.':login');
