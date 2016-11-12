<?php


namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class PreviewForm extends Form
{

    public function getCsrf()
    {
        return $this->security->getToken();
    }

    public function initialize($entity = null, $options = [])
    {
        $title = new Text('title', [
            'placeholder' => 'Название'
        ]);
        $title->setLabel('Название');
        $title->addValidators([
            new PresenceOf([
                'message' => 'Название не может быть пустым'
            ])
        ]);
        $this->add($title);

        $image = new File('image');
        $image->setLabel('Изображение');
        $this->add($image);

        $status = new Check('status');
        $status->setLabel('Показывать?');
        $this->add($status);

        if($options['edit']) {
            $this->add(new Hidden('id'));
        }
    }

}