<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\controllers\PathologyController;
use App\models\CaracteristiqueService;
use App\models\CategorieService;
use App\models\PathologyService;
use App\models\UserService;
use App\models\MeridienService;
use Db\Connect;
use Slim\Factory\AppFactory;

session_start();
$app = AppFactory::create();

$GLOBALS['smarty'] = new Smarty();
$GLOBALS['smarty']->setTemplateDir('../templates');
$GLOBALS['smarty']->setCompileDir('../templates_c');

if (!empty($_SESSION['name'])) {
    $GLOBALS['smarty']->assign('session', true);
}

$GLOBALS['user_service'] = new UserService(new Connect());
$GLOBALS['meridien_service'] = new MeridienService(new Connect());
$GLOBALS['pathology_service'] = new PathologyService(new Connect());
$GLOBALS['carac_service'] = new CaracteristiqueService(new Connect());
$GLOBALS['cat_service'] = new CategorieService(new Connect());

$app->get('/', HomeController::class.':index');
$app->get('/login', LoginController::class.':index');
$app->get('/logout', LoginController::class.':logout');
$app->any('/sign-up', LoginController::class.':signUp');
$app->post('/login-ajax', LoginController::class.':login');
$app->get('/project', HomeController::class.':displayProject');
$app->get('/pathology', PathologyController::class.':index');
