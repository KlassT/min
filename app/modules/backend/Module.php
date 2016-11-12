<?php

namespace App\Backend;

use App\Backend\Plugins\SecurityPlugin;
use App\Components\Breadcrumbs;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use App\Components\Elements;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

class Module implements ModuleDefinitionInterface
{

    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            'App\Models'               => APP_PATH . '/models/',
            'App\Forms'                => APP_PATH . '/forms',
            'App\Components'           => APP_PATH . '/lib/',
            'App\Backend\Controllers' => __DIR__ . '/controllers',
            'App\Backend\Plugins'     => __DIR__ . '/plugins/',
        ]);
        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $di->setShared('view', function() {
            $view = new View;
            $view->setViewsDir(__DIR__ . '/views/');
            $view->registerEngines([
                '.volt' => function($view, $di) {
                    $volt = new VoltEngine($view, $di);
                    $volt->setOptions([
                        'compiledPath'      => __DIR__ . '/cache/',
                        'compiledSeparator' => '_',
                    ]);

                    return $volt;
                },
            ]);
            return $view;
        });

        $di->setShared('db', function() {
            $config = require_once CONFIG_PATH . '/database.php';
            $config = $config->toArray();
            $dbAdapter = '\Phalcon\Db\Adapter\Pdo\\' . $config['adapter'];
            unset($config['adapter']);

            return new $dbAdapter($config);
        });

        $di->setShared('url', function() {
            $url = new UrlResolver();
            $url->setBaseUri('/admin/');
            $url->setStaticBaseUri('/');
            return $url;
        });

        $di->setShared('dispatcher', function() {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('App\Backend\Controllers');
            $eventsManager = new EventsManager;
            $eventsManager->attach('dispatch', new SecurityPlugin);
            $dispatcher->setEventsManager($eventsManager);
            return $dispatcher;
        });

        $di->setShared('elements', function() {
            return new Elements;
        });

        $di->setShared('crumbs', function() {
            return new Breadcrumbs;
        });
    }

}