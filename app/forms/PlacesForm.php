<?php


namespace App\Forms;

use App\Models\Places;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class PlacesForm extends Form
{

    public function getCsrf()
    {
        return $this->security->getToken();
    }

    public function initialize($entity = null, $options = [])
    {
        $place = new Text('place', [
            'placeholder' => 'Место'
        ]);
        $place->setLabel('Введите место');
        $place->addValidators([
            new PresenceOf([
                'message' => 'Введите название места'
            ])
        ]);
        $this->add($place);

        $phone = new Text('phone', [
            'placeholder' => 'Телефон'
        ]);
        $phone->setLabel('Введите Телефон');
        $this->add($phone);

        $site = new Text('site', [
            'placeholder' => 'Сайт'
        ]);
        $site->setLabel('Введите Сайт');
        $this->add($site);

        if($options['edit']) {
            $this->add(new Hidden('id'));
        }
    }

}