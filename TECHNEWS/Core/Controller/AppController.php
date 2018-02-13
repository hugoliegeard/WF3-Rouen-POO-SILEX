<?php

namespace Core\Controller;


class AppController
{
    private $_viewparams;

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

        # Chargement du Header
        include_once PATH_HEADER;

        # Chargement de la Vue
        include_once PATH_VIEWS . '/' . $view . '.php';

        # Chargement du Footer
        include_once PATH_FOOTER;

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

}