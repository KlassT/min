<?php

namespace App\Frontend\Controllers;

use App\Models\Plots;
use Phalcon\Mvc\View;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class SearchController extends ControllerBase
{

    public function indexAction($s)
    {
        $this->tag->setTitle('Поиск');
        $this->view->plots = Plots::find([
            'title = :s: OR description = :s:',
            'bind' => [
                's' => 'LIKE %' . $s . '%'
            ],
            'order' => 'id DESC'
        ]);
        $this->view->isPartners = true;
        $this->view->pick('partners/index');
    }

    public function plotAction($id)
    {
        $plot = Plots::findFirst($id);
        $this->tag->setTitle($plot->title);
        $this->view->plot = Plots::findFirst($id);
        $this->view->plots = Plots::find([
            'id <> ' . $plot->id,
            'order' => 'RAND()',
            'limit' => 3
        ]);
        $this->view->isPartners = false;
        $this->view->pageData = $plot;
    }

}