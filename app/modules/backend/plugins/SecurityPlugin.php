<?php

namespace App\Backend\Plugins;

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;

class SecurityPlugin extends Plugin
{

    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        if(!$this->session->has('auth')) {
            if($dispatcher->getControllerName() != 'auth') {
                $dispatcher->forward(array(
                    'controller' => 'auth',
                    'action' => 'login'
                ));
                return false;
            }
            return;
        }
    }

}