<?php

namespace App\Frontend\Controllers;

use App\Models\Pages;

class ContactsController extends ControllerBase
{

    public function indexAction()
    {
        $this->tag->setTitle('Контакты');
        $this->view->page = Pages::findFirst('page = "contacts"');
        $this->view->pick('page/index');
    }

}