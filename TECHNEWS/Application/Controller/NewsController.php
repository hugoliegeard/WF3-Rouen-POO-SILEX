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

    public function businessAction() {

        # Connexion à la BDD
        $articleDb = new ArticleDb;

        # Récupération des Articles dela NDD
        $articles = $articleDb->fetchAll('IDCATEGORIE = 2');

        # Transmission à la vue
        $this->render('news/categorie', [
            'articles' => $articles
        ]);
    }

    public function computingAction() {

        # Connexion à la BDD
        $articleDb = new ArticleDb;

        # Récupération des Articles dela NDD
        $articles = $articleDb->fetchAll('IDCATEGORIE = 3');

        # Transmission à la vue
        $this->render('news/categorie', [
            'articles' => $articles
        ]);
    }

    public function techAction() {

        # Connexion à la BDD
        $articleDb = new ArticleDb;

        # Récupération des Articles dela NDD
        $articles = $articleDb->fetchAll('IDCATEGORIE = 4');

        # Transmission à la vue
        $this->render('news/categorie', [
            'articles' => $articles
        ]);
    }

    public function articleAction() {
        $this->render('news/article');
    }
}