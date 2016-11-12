<?php

namespace App\Backend\Controllers;

use App\Forms\PlacesForm;
use App\Models\Places;

class PlacesController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
        $this->crumbs->add('places', 'admin/places', 'Места');
    }

    public function indexAction()
    {
        $this->setTitle('Места');
        $this->view->places = Places::find();
        $this->view->form = new PlacesForm;
    }

    public function addAction()
    {
        $this->view->disable();

        if($this->request->isPost()) {
            $form = new PlacesForm;
            if(!$form->isValid($this->request->getPost())) {
                $this->errorMessages($form->getMessages(), true);
                $this->response->redirect('places');
                return;
            }

            $place = new Places;

            if(!$place->save($this->request->getPost())) {
                $this->errorMessages($place->getMessages(), true);
                $this->response->redirect('places');
                return;
            }
            $this->response->redirect('places');
        }

        $this->response->redirect('places');
    }

    public function editAction($id)
    {
        $place = Places::findFirst($id);
        $this->setTitle('Изменить место');
        $form = new PlacesForm($place, ['edit' => true]);
        $this->view->form = $form;
        $this->view->place = $place;

        if($this->request->isPost()) {
            if(!$form->isValid($this->request->getPost())) {
                $this->errorMessages($form->getMessages());
                return;
            };

            if(!$place->save($this->request->getPost())) {
                $this->errorMessages($place->getMessages());
                return;
            }
            $this->flashSession->success('Место успешно сохранено');
            $this->response->redirect('places');
        }
    }

    public function deleteAction($id) {
        $this->view->disable();
        $place = Places::findFirst($id);
        if(!$place->delete()) {
            $this->errorMessages($place->getMessages(), true);
        }
        $this->response->redirect('places');
    }

}