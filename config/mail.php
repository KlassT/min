<?php

return new Phalcon\Config([
    'fromName' => 'Сделано в Кузбассе',
    'fromEmail' => 'test@madeinkuzbass.ru',
    'smtp' => [
        'server' => '',
        'port' => 465,
        'security' => 'ssl',
        'username' => 'test@madeinkuzbass.ru',
        'password' => 'madeinkuzbass'
    ]
]);