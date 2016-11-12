<?php

namespace App\Backend\Controllers;

use Phalcon\Security\Random;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->setTitle('Панель управления');
    }

}
