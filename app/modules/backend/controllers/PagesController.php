<?php

namespace App\Backend\Controllers;

use Phalcon\Mvc\View;
use App\Forms\PagesForm;
use App\Models\Pages;

class PagesController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
        $this->crumbs->add('pages', 'admin/pages', 'Страницы');
    }

    public function indexAction()
    {
        $this->setTitle('Страницы');
        $this->view->pages = Pages::find();
    }

    public function editAction($id)
    {
        $page = Pages::findFirst($id);
        $form = new PagesForm($page);
        $this->view->page = $page;
        $this->view->form = $form;
        $this->setTitle($page->title);
        $this->crumbs->add('page', null, $page->title, false);

        if($this->request->isPost()) {
            if(!$form->isValid($this->request->getPost())) {
                $this->errorMessages($form->getMessages());
                return;
            }
            if(!$page->save($this->request->getPost())) {
                $this->errorMessages($page->getMessages());
                return;
            }
            $this->flash->success('Данные успешно сохранены');
        }
    }

}