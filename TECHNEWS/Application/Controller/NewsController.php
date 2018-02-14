<?php

namespace Application\Controller;

use Application\Model\Categorie\CategorieDb;
use Core\Controller\AppController;

class NewsController extends AppController
{
    public function indexAction() {
       $this->render('news/index');
       # include_once PATH_VIEWS . '/news/index.php';
    }
    public function categorieAction() {
        $this->render('news/categorie');
    }
    public function articleAction() {
        $this->render('news/article');
    }
}