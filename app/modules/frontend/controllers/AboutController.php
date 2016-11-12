<?php

namespace App\Frontend\Controllers;

use App\Models\Pages;

class AboutController extends ControllerBase
{

    public function indexAction()
    {
        $this->tag->setTitle('О канале');
        $this->view->page = Pages::findFirst('page = "about"');
        $this->view->pick('page/index');
    }

    public function sendAction()
    {
        $this->mail->send([
            'name' => 'Александр',
            'phone' => '+79130721330'
        ]);
    }

}