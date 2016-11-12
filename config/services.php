<?php

use Phalcon\Mvc\Router;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;

$di->setShared('router', function() {
    $router = new Router();
    $router->setDefaultModule('frontend');
    $router->setDefaultNamespace('App\Frontend\Controllers');

    return $router;
});

$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

$di->setShared('flash', function() {
    return new Flash(array(
        'success' => 'alert alert-success',
        'error'   => 'alert alert-danger',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ));
});

$di->setShared('flashSession', function() {
    return new FlashSession(array(
        'success' => 'alert alert-success',
        'error'   => 'alert alert-danger',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ));
});