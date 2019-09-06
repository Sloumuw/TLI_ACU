<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../routes/web.php';

/** Smarty example */
//require('../vendor/smarty/Smarty.class.php');
//
//$smarty = new Smarty();
//
//$smarty->setTemplateDir('../templates');
//$smarty->setCompileDir('../templates_c');
//
//$smarty->assign('name', 'World');
//$smarty->display('base.tpl');

$app->run();
