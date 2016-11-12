<?php

namespace App\Components;

use Phalcon\Mvc\User\Component;

class Elements extends Component
{

    private $_navigation = [
        '#plots-main' => [
            'controller' => 'plots',
            'caption' => 'Сюжеты',
            'scroll' => true
        ],
        '#about' => [
            'controller' => 'about',
            'caption' => 'О канале',
            'scroll' => true
        ],
        '#contacts' => [
            'controller' => 'contacts',
            'caption' => 'Контакты',
            'scroll' => true
        ],
        'partners' => [
            'controller' => 'partners',
            'caption' => 'Партнеры',
            'scroll' => false
        ],
        'channel' => [
            'controller' => 'channel',
            'caption' => 'Эфир',
            'scroll' => false
        ],
    ];

    private $_adminMenu = [
        'previews' => [
            'controller' => 'previews',
            'caption' => 'Анонсы'
        ],
        'plots' => [
            'controller' => 'plots',
            'caption' => 'Сюжеты',
        ],
        'categories' => [
            'controller' => 'categories',
            'caption' => 'Категории'
        ],
        'pages' => [
            'controller' => 'pages',
            'caption' => 'Страницы'
        ],
        'places' => [
            'controller' => 'places',
            'caption' => 'Места'
        ]
    ];

    public function getMenu()
    {
        $currentController = $this->view->getControllerName();

        echo '<ul>';
        foreach($this->_navigation as $link => $options) {
            if($currentController == $options['controller'])
                echo '<li class="active">';
            else
                echo '<li>';

            $class = '';
            if($options['scroll'])
                $class .= 'scroll-link';

            if($options['controller'] == 'channel')
                $class .= ' channel-link';

            echo $this->tag->linkTo([$link, $options['caption'], 'class' => $class]);
            echo '</li>';
        }
        echo '</ul>';
    }

    public function getAdminMenu()
    {
        $controllerName = $this->view->getControllerName();
        echo '<div class="title">Главное меню</div>';
        echo '<div class="sidebar-block">';
        echo '<ul class="clear">';
        foreach($this->_adminMenu as $link => $options) {
            if($options['controller'] == $controllerName)
                echo '<li class="active">';
            else
                echo '<li>';
            echo $this->tag->linkTo($link, $options['caption']);
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }

}