<?php

namespace Core\Controller;


use Core\Model\DbFactory;
use Core\Model\Helper;

class AppController
{

    use Helper;

    private $_viewparams;

    /**
     * Permet d'initialiser la connexion à la BDD pour
     * l'ensemble des Actions de mes Controllers.
     * AppController constructor.
     */
    public function __construct()
    {
        # Initialisation de IdiormFactory à la construction
        # de AppController
        DbFactory::IdiormFactory();
    }

    /**
     * Permet de générer l'affichage
     * de la vue passé en paramètre.
     * @param $view Vue à afficher.
     * @param array $viewparam Données à passer à la vue.
     */
    protected function render($view, Array $viewparams = []) {

        # Récupération et Affectation des Paramètres de la Vue
        $this->_viewparams = $viewparams;

        # Permet d'accéder au tableau directement dans des variables
            extract($this->_viewparams);

        # Chargement de la Vue
        $view = PATH_VIEWS . '/' . $view . '.php';
        if( file_exists($view) ) :

            # Chargement du Header
            include_once PATH_HEADER;

            # Chargement de la Vue
            include_once $view;

            # Chargement du Footer
            include_once PATH_FOOTER;

        else :

            $this->render('errors/404', [
                'message' => 'Aucune vue correspondante'
            ]);

        endif;

    }

    /**
     * Effectue un rendu JSON du Tableau passé en Param
     * @param array $param
     */
    protected  function renderJson(Array $param) {
        header('Content-Type: application/json');
        echo json_encode($param);
    }

    /**
     * Renvoi le tableau de paramètres de la vue
     * @return \ArrayObject
     */
    public function getViewparams()
    {
        # http://php.net/manual/fr/class.arrayobject.php
        # Je vais pouvoir accéder à mon tableau comme un objet
        $object = new \ArrayObject($this->_viewparams);
        $object->setFlags(\ArrayObject::ARRAY_AS_PROPS);
        return $object;
    }

    /**
     * Permet de débugger les paramètres de la vue
     * ou le paramètre passé à la fonction.
     * @param array $params
     */
    public function debug($params = '') {
        if(empty($params)) :
            $params = $this->_viewparams;
        endif;

        echo '<pre>';
            print_r($params);
        echo '</pre>';
    }

    /**
     * Vérifie l'existance de valeur dans $_GET['action']
     * @return string
     */
    public function getAction() {
        return empty($_GET['action']) ? 'accueil' : $_GET['action'];
    }

}