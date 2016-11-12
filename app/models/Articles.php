<?php

namespace App\Models;

use Phalcon\Mvc\Model;

class Articles extends Model
{

    public $id;
    public $category;

    public function initialize()
    {
    }

}