<?php


namespace App\Forms;

use App\Models\Categories;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Textarea;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class CategoriesForm extends Form
{

    public function getCsrf()
    {
        return $this->security->getToken();
    }

    public function initialize($entity = null, $options = [])
    {
        $category = new Text('category', [
            'placeholder' => 'Категория'
        ]);
        $category->setLabel('Введите категорию');
        $category->addValidators([
            new PresenceOf([
                'message' => 'Введите название категории'
            ])
        ]);
        $this->add($category);
    }

}