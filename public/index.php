<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Application;

error_reporting(E_ALL);

define('APP_PATH', realpath('../app'));
define('CONFIG_PATH', realpath('../config'));

try {
    $di = new FactoryDefault;
    require_once CONFIG_PATH . '/services.php';
    $application = new Application($di);
    require_once CONFIG_PATH . '/modules.php';
    require_once CONFIG_PATH . '/routes.php';
    echo $application->handle()->getContent();
}
catch(Exception $e) {
    echo $e->getMessage();
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}