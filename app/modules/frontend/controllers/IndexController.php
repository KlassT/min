<?php

namespace App\Frontend\Controllers;

use App\Forms\OrderForm;
use App\Models\Plots;
use App\Models\Previews;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->tag->setTitle('Главная');
        $this->view->orderForm = new OrderForm;
        $this->view->plots = Plots::find([
            'order' => 'number DESC, id DESC',
            'limit' => 10
        ]);
        $this->view->previews = Previews::find([
            'status = 1',
            'order' => 'id DESC'
        ]);
        $this->view->isPartners = false;
    }

}