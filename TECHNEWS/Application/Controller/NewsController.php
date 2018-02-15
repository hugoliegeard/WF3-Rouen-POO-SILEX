<?php

namespace Application\Controller;

use Application\Model\Article\ArticleDb;
use Application\Model\Categorie\CategorieDb;
use Core\Controller\AppController;

class NewsController extends AppController
{
    public function indexAction() {

        # Connexion à la BDD
        $articleDb = new ArticleDb;

        # Récupération des Articles
        $articles = $articleDb->fetchAll();

        # Récupération des Articles en Spotlight
        $spotlight = $articleDb->fetchAll('SPOTLIGHTARTICLE = 1');

        $this->render('news/index',[
            'articles' => $articles,
            'spotlight' => $spotlight
        ]);
        # include_once PATH_VIEWS . '/news/index.php';
    }
    public function categorieAction() {
        $this->render('news/categorie');
    }
    public function articleAction() {
        $this->render('news/article');
    }
}