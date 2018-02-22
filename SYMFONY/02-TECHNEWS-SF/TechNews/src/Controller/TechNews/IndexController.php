<?php

namespace App\Controller\TechNews;


use App\Entity\Article;
use App\Entity\Categorie;
use App\Service\Article\ArticleProvider;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{

    /**
     * Page d'accueil de notre site.
     * Configuration de notre route dans routes.yaml
     * @param ArticleProvider $articleProvider
     * @return Response
     */
    public function index(ArticleProvider $articleProvider) {
        # return new Response("<html><body><h1>Page d'Accueil</h1></body></html>");
        # $articles = $articleProvider->getArticles();

        $repository = $this->getDoctrine()
            ->getRepository(Article::class);

        # Récupération des articles depuis la BDD
        $articles = $repository->findAll();

        # Récupération des articles du spotlight
        $spotlight = $repository->findSpotlightArticles();

        # Transmission à la vue
        return $this->render('index/index.html.twig', [
            'articles' => $articles,
            'spotlight' => $spotlight
        ]);
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

        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findOneBy(
                ['libelle' => $libellecategorie]
            );

        $articles = $categorie->getArticles();

        return $this->render('index/categorie.html.twig', [
            'articles' => $articles
        ]);

    }

    /**
     * Page permettant d'afficher un Article
     * @Route("/{libellecategorie}/{slugarticle}_{id}.html",
     *     name="index_article",
     *     requirements={"id" = "\d+"})
     */
    public function article(Article $article) {
        # index.php/business/une-formation-symfony-a-paris_98426852.html

        # Récupération avec Doctrine
        # $article = $this->getDoctrine()
        #     ->getRepository(Article::class)
        #     ->find($idarticle);

        # Si aucun article n'est trouvé...
        if(!$article) :

            # On génère une exception
            #throw $this->createNotFoundException(
            #    "Nous n'avons pas trouvé votre article ID : $idarticle"
            #);

            # Ou on peut aussi rediriger l'utilisateur sur la page index
            return $this->redirectToRoute('index',[],Response::HTTP_MOVED_PERMANENTLY);

        endif;

        $suggestions = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findArticleSuggestions($article->getId(), $article->getCategorie()->getId());

        return $this->render('index/article.html.twig', [
            'article'       => $article,
            'suggestions'   => $suggestions
        ]);

    }

    /**
     * Affiche la sidebar du site.
     * @return Response
     */
    public function sidebar() {

        # Récupération du Répository
        $repository = $this->getDoctrine()->getRepository(Article::class);

        # Récupération des 5 derniers articles
        $articles   = $repository->findLastFiveArticles();

        # Récupération des articles à la position "special"
        $special    = $repository->findSpecialArticles();

        return $this->render('components/_sidebar.html.twig', [
            'articles'  => $articles,
            'special'   => $special
        ]);

    }

}
