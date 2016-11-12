<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

$router = $di->get("router");
$router->setDefaultModule('frontend');

$backend = new RouterGroup(array(
    'module' => 'backend',
    'namespace' => 'App\Backend\Controllers'
));
$backend->setPrefix('/admin');
$backend->add('/', array(
    'controller' => 'index',
    'action' => 'index'
));
$backend->add('/:controller', array(
    'controller' => 1,
    'action' => 'index'
));
$backend->add('/:controller/:action/:params', array(
    'controller' => 1,
    'action' => 2,
    'params' => 3
));
$router->mount($backend);

$router->add('/admin', array(
    'module' => 'backend',
    'namespace' => 'App\Backend\Controllers'
));

$di->set("router", $router);