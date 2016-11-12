<?php

namespace App\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Relation;

class Places extends Model
{

    public $id;
    public $place;
    public $phone;
    public $site;

    public function initialize()
    {
        $this->hasMany('id', 'App\Models\Plots', 'place_id', [
            'alias' => 'Plots1',
            'foreignKey' => [
                'action' => Relation::ACTION_RESTRICT,
                'allowNulls' => true,
                'message' => 'Вы не можете удалить место, т.к. в ней есть сюжеты'
            ]
        ]);
    }

}