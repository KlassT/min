<?php

namespace App\Frontend\Controllers;

use App\Models\Plots;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class PartnersController extends ControllerBase
{

    public function indexAction()
    {
        $this->tag->setTitle('Партнеры');
        $this->view->isPartners = true;
        $this->view->plots = Plots::find([
            'order' => 'id DESC'
        ]);

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
        $this->view->pageData = $plot;
        $this->view->isPartners = true;
        $this->view->pick('plots/plot');
    }

    public function searchAction()
    {
        $s = $this->request->get('s', 'string');
        $this->tag->setTitle('Поиск');
        $result = $this->modelsManager->createBuilder()
            ->columns(['Plots.id AS id', 'Plots.title AS title', 'Plots.description AS description', 'Plots.video AS video', 'Categories.category AS category', 'Places.place AS place', 'Places.phone AS phone', 'Places.site AS site'])
            ->from(['Plots' => 'App\Models\Plots'])
            ->leftJoin('App\Models\Categories', 'Categories.id = Plots.category_id', 'Categories')
            ->leftJoin('App\Models\Places', 'Places.id = Plots.place_id', 'Places')
            ->where('Plots.title LIKE :s: OR Plots.description LIKE :s: OR Categories.category LIKE :s: OR Places.place LIKE :s:', ['s' => '%' . $s . '%'])
            ->orderBy('Plots.number DESC, id DESC')
            ->getQuery()
            ->execute();
        $this->view->plots = $result;
        $this->view->isPartners = true;
    }

}