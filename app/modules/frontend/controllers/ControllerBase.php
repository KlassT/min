<?php

namespace App\Frontend\Controllers;

use App\Models\Pages;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

    public function initialize()
    {
        $this->tag->appendTitle(' | Сделано в Кузбассе');
        $this->view->pageData = Pages::findFirst([
            'page = :page:',
            'bind' => [
                'page' => $this->dispatcher->getControllerName()
            ]
        ]);

        //$this->mail->send(['name' => 'Имя', 'phone' => 'телефон']);
    }

}