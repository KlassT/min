<?php

$application->registerModules([
    'frontend' => array(
        'className' => 'App\Frontend\Module',
        'path' => APP_PATH . '/modules/frontend/Module.php'
    ),
    'backend' => array(
        'className' => 'App\Backend\Module',
        'path' => APP_PATH . '/modules/backend/Module.php'
    ),
]);