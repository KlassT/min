<?php

namespace App\Backend\Controllers;

use Phalcon\Mvc\View;
use App\Forms\AuthForm;
use App\Models\Auth;

class AuthController extends ControllerBase
{

    private function _registerSession($user)
    {
        $this->session->set('auth', $user);
    }

    public function loginAction()
    {
        $form = new AuthForm;
        $this->view->loginForm = $form;
        $this->view->setRenderLevel(View::LEVEL_LAYOUT);

        if($this->request->isPost()) {
            if (!$this->security->checkToken()) {
                $this->flash->error('Неверный токен');
                return;
            }

            $user = Auth::findFirst(array(
                'login = :login:',
                'bind' => array(
                    'login' => $this->request->getPost('login')
                )
            ));
            if(!$user) {
                $this->flash->error('Пользователь не найден');
                return;
            }

            if(!$this->security->checkHash($this->request->getPost('password'), $user->password)) {
                $this->flash->error('Неверный пароль');
                return;
            }

            $this->_registerSession($user);
            $this->response->redirect('');
        }
    }

    public function logoutAction()
    {
	$this->session->destroy();
	$this->response->redirect('');
    }

}
