<?php

namespace App\Controller\TechNews;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{

    /**
     * Page d'accueil de notre site.
     * Configuration de notre route dans routes.yaml
     */
    public function index() {
        # return new Response("<html><body><h1>Page d'Accueil</h1></body></html>");
        return $this->render('index/index.html.twig');
    }

    /**
     * Page permettant d'afficher les articles d'une catégorie
     * @Route("/categorie/{libellecategorie}",
     *     name="index_categorie",
     *     requirements={"libellecategorie" = "\w+"},
     *     methods={"GET"})
     * @param string $libellecategorie
     * @return Response
     */
    public function categorie($libellecategorie = 'tout') {
        return new Response("<html><body><h1>Page Catégorie : $libellecategorie</h1></body></html>");
    }

    /**
     * Page permettant d'afficher un Article
     * @Route("/{libellecategorie}/{slugarticle}_{idarticle}.html",
     *     name="index_article",
     *     requirements={"idarticle" = "\d+"})
     */
    public function article($libellecategorie, $slugarticle, $idarticle) {
        # index.php/business/une-formation-symfony-a-paris_98426852.html
        return new Response("<html><body><h1>Page Article : $libellecategorie | $slugarticle | $idarticle</h1></body></html>");
    }

}
