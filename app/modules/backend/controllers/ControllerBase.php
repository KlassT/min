<?php

namespace App\Backend\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Security\Random;

class ControllerBase extends Controller
{

    public function initialize()
    {
        $this->crumbs->add('dashboard', '/admin', '<i class="fa fa-home"></i> Главная');
    }

    protected function setTitle($title)
    {
        $this->view->title = $title;
    }

    protected function errorMessages($messages, $isSession = false) {
        foreach($messages as $message) {
            if($isSession)
                $this->flashSession->error($message->getMessage());
            else
                $this->flashSession->error($message->getMessage());
        }
    }

    protected function uploadFiles($files, $path)
    {
        $random = new Random;
        $name = null;
        foreach($files as $file) {
            if($file->getName()) {
                $name = $random->uuid() . '.' . $file->getExtension();
                $file->moveTo($path . '/' . $name);
            }
        }
        return $name;
    }

}