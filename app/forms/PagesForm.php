<?php


namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Textarea;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class PagesForm extends Form
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

        $page = new Text('page', [
            'disabled' => true
        ]);
        $page->setLabel('Страница');
        $this->add($page);

        $keywords = new Text('keywords', [
            'placeholder' => 'Ключевые слова'
        ]);
        $keywords->setLabel('Ключевые слова');
        $this->add($keywords);

        $description = new Text('description', [
            'placeholder' => 'Описание'
        ]);
        $description->setLabel('Описание');
        $this->add($description);

        $content = new Textarea('content', [
            'placeholder' => 'Содержимое'
        ]);
        $content->setLabel('Содержимое');
        $this->add($content);

        $this->add(new Hidden('id'));
    }

}