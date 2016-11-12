<?php


namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Textarea;
use Phalcon\Validation\Validator\PresenceOf;

class OrderForm extends Form
{

    public function getCsrf()
    {
        return $this->security->getToken();
    }

    public function initialize($entity = null, $options = [])
    {
        $name = new Text('name', [
            'placeholder' => 'Ваше имя'
        ]);
        $name->addValidators([
            new PresenceOf([
                'message' => 'Введите, пожалуйста, имя'
            ])
        ]);
        $this->add($name);

        $phone = new Text('phone', [
            'placeholder' => 'Ваш телефон'
        ]);
        $phone->addValidators([
            new PresenceOf([
                'message' => 'Введите, пожалуйста, телефон'
            ])
        ]);
        $this->add($phone);

        $message = new Textarea('message', [
            'placeholder' => 'Ваше сообщение'
        ]);
        $message->addValidators([
            new PresenceOf([
                'message' => 'Введите, пожалуйста, сообщение'
            ])
        ]);
        $this->add($message);
    }

}