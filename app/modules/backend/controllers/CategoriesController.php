<?php

namespace App\Backend\Controllers;

use App\Forms\CategoriesForm;
use App\Models\Categories;

class CategoriesController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
        $this->crumbs->add('categories', 'admin/categories', 'Категории');
    }

    public function indexAction()
    {
        $this->setTitle('Категории');
        $this->view->categories = Categories::find();
        $this->view->form = new CategoriesForm;
    }

    public function addAction()
    {
        $this->view->disable();

        if($this->request->isPost()) {
            $form = new CategoriesForm;
            if(!$form->isValid($this->request->getPost())) {
                $this->errorMessages($form->getMessages());
                $this->response->redirect('categories');
                return;
            }
            $category = new Categories;

            if(!$category->save($this->request->getPost())) {
                $this->errorMessages($category->getMessages(), true);
                $this->response->redirect('categories');
                return;
            }
            $this->response->redirect('categories');
        }

        $this->response->redirect('categories');
    }

    public function deleteAction($id) {
        $this->view->disable();
        $category = Categories::findFirst($id);
        if(!$category->delete()) {
            $this->errorMessages($category->getMessages(), true);
        }
        $this->response->redirect('categories');
    }

}