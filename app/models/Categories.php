<?php

namespace App\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Relation;

class Categories extends Model
{

    public $id;
    public $category;

    public function initialize()
    {
        $this->hasMany('id', 'App\Models\Plots', 'category_id', [
            'alias' => 'Plots',
            'foreignKey' => [
                'action' => Relation::ACTION_RESTRICT,
                'allowNulls' => true,
                'message' => 'Вы не можете удалить категорию, т.к. в ней есть сюжеты'
            ]
        ]);
    }

}