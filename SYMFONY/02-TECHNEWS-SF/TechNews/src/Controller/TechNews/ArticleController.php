<?php

namespace App\Controller\TechNews;

use App\Controller\Helper;
use App\Entity\Article;
use App\Entity\Auteur;
use App\Entity\Categorie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{

    use Helper;

    /**
     * Démonstration, Ajouter un Article avec Doctrine
     * @Route("/article", name="article")
     */
    public function index()
    {
        # Création de la Catégorie
        $categorie = new Categorie();
        $categorie->setLibelle('Business');

        # Création de l'Auteur
        $auteur = new Auteur();
        $auteur->setPrenom('Hugo');
        $auteur->setNom('LIEGEARD');
        $auteur->setEmail('wf3@hl-media.fr');
        $auteur->setPassword('test');

        # Création de notre Article
        $article = new Article();
        $article->setTitre('Ceci est un titre');
        $article->setContenu('Ceci est un contenu');
        $article->setFeaturedimage('3.jpg');
        $article->setSpecial(0);
        $article->setSpotlight(1);

        # On associe une catégorie et un auteur à notre article
        $article->setCategorie($categorie);
        $article->setAuteur($auteur);

        # On sauvegarde le tout en BDD
        $em = $this->getDoctrine()->getManager();
        $em->persist($categorie);
        $em->persist($auteur);
        $em->persist($article);
        $em->flush();

        # Retour de la vue
        return new Response(
            'Nouvel article ajouté avec ID: ' .
            $article->getId() . ' et la nouvelle catégorie : ' .
            $categorie->getLibelle() . ' de Auteur : ' .
            $auteur->getPrenom()
        );
    }

    /**
     * Formulaire pour ajouter un article
     * @Route("/creer-un-article", name="article_add")
     * @param Request $request
     * @return Response
     */
    public function addarticle(Request $request) {

        # Récupération des Catégories
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();

        # Création d'un nouvel article
        $article = new Article();

        # Récupération d'un Auteur de l'article
        $auteur = $this->getDoctrine()
            ->getRepository(Auteur::class)
            ->find(2);

        $article->setAuteur($auteur);

        # Créer le formuaire permettant l'ajout d'un article
        $form = $this->createFormBuilder($article)

            ->add('titre', TextType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         => 'form-control',
                    'placeholder'   => 'Titre de l\'Article'
                ]
            ])

            ->add('categorie', EntityType::class, [
                'class'         => Categorie::class,
                'choice_label'  => 'libelle',
                'required'      => true,
                'expanded'      => false,
                'multiple'      => false,
                'attr'          => [
                    'class' => 'form-control'
                ]
            ])

            ->add('contenu', TextareaType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control'
                ]
            ])

            ->add('featuredimage', FileType::class, [
                'required'  => false,
                'label'     => false,
                'attr'      => [
                    'class' => 'dropify'
                ]
            ])

            ->add('special', CheckboxType::class, [
                'required'  => false,
                'label'     => false,
            ])

            ->add('spotlight', CheckboxType::class, [
                'required'  => false,
                'label'     => false,
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Publier',
                'attr'      => [
                    'class' => 'btn btn-primary'
                ]
            ])

            ->getForm();

        # Traitement des données POST
        $form->handleRequest($request);

        # Vérification des données du Formulaire
        if($form->isSubmitted() && $form->isValid()) :

            # Récupération des données
            $article = $form->getData();

            # Récupération de l'image
            $image = $article->getFeaturedimage();

            # Nom du Fichier
            $fileName = $this->slugify($article->getTitre()).$image->guessExtension();
            $image->move(
                $this->getParameter('articles_assets_dir'),
                $fileName
            );
            $article->setFeaturedimage($fileName);

            # Insertion en BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            # Redirection sur l'article qui vient d'être crée
            return $this->redirectToRoute('index_article', [
                'libellecategorie'  => $this->slugify($article->getCategorie()->getLibelle()),
                'slugarticle'       => $this->slugify($article->getTitre()),
                'id'                => $article->getId()
            ]);

        endif;

        # Affichage du Formulaire dans la Vue
        return $this->render('article/ajouterarticle.html.twig', [
            'form' => $form->createView()
        ]);

    }

}
