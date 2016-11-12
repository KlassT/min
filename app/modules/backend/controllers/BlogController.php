<?php

namespace App\Backend\Controllers;

class BlogController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
        $this->crumbs->add('blog', 'admin/blog', 'Блог');
    }

    public function indexAction()
    {
        $this->setTitle('Блог');
        $this->view->categories = Articles::find();
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