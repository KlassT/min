<?php

namespace App\Backend\Controllers;

use App\Models\Previews;
use App\Forms\PreviewForm;

class PreviewsController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
        $this->crumbs->add('previews', '/admin/previews', 'Анонсы');
    }

    public function indexAction()
    {
        $this->setTitle('Анонсы');
        $this->view->previews = Previews::find();
    }

    public function addAction()
    {
        $form = new PreviewForm;
        $this->view->form = $form;
        $this->setTitle('Добавление анонса');

        if($this->request->isPost()) {
            if(!$form->isValid($this->request->getPost())) {
                $this->errorMessages($form->getMessages());
                return;
            }
            $preview = new Previews;

            $title = $this->request->getPost('title', 'string');
            if($this->request->hasPost('status'))
                $status = 1;
            else
                $status = 0;

            $preview->title = $title;
            $preview->status = $status;

            if($this->request->hasFiles()) {
                $preview->image = $this->uploadFiles($this->request->getUploadedFiles(), 'files/previews');
            }

            if(!$preview->save()) {
                $this->errorMessages($preview->getMessages());
                return;
            }

            $this->flashSession->success('Анонс успешно добавлен');
            $this->response->redirect('previews');
        }
    }

    public function editAction($id)
    {
        $this->setTitle('Изменение анонса');
        $preview = Previews::findFirst($id);
        $this->crumbs->add('preview', null, $preview->title, false);
        $form = new PreviewForm($preview, ['edit' => true]);
        $this->view->form = $form;
        $this->view->preview = $preview;

        if($this->request->isPost()) {
            if(!$form->isValid($this->request->getPost())) {
                $this->errorMessages($form->getMessages());
                return;
            }

            $title = $this->request->getPost('title', 'string');
            if($this->request->hasPost('status'))
                $status = 1;
            else
                $status = 0;

            $preview->title = $title;
            $preview->status = $status;

            if($this->request->hasFiles()) {
                $image = $this->uploadFiles($this->request->getUploadedFiles(), 'files/previews');
                if(!is_null($image))
                    $preview->image = $image;
            }

            if(!$preview->save()) {
                $this->errorMessages($preview->getMessages());
                return;
            }

            $this->flash->success('Анонс успешно сохранен');
        }
    }

    public function deleteAction($id) {
        $preview = Previews::findFirst($id);
        if(!$preview->delete()) {
            $this->errorMessages($preview->getMessages(), true);
        }
        $this->flashSession->success('Анонс успешно удален');
        $this->response->redirect('previews');
    }

}