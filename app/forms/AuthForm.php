<?php


namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;

class AuthForm extends Form
{

    public function getCsrf()
    {
        return $this->security->getToken();
    }

    public function initialize($entity = null, $options = [])
    {
        $login = new Text('login', [
            'placeholder' => 'Логин'
        ]);
        $login->setLabel('Логин');
        $login->addValidators([
            new PresenceOf([
                'message' => 'Введите логин'
            ])
        ]);
        $this->add($login);

        $password = new Password('password', [
            'placeholder' => 'Пароль'
        ]);
        $password->setLabel('Пароль');
        $password->addValidators([
            new PresenceOf([
                'message' => 'Введите пароль'
            ])
        ]);
        $this->add($password);
    }

}