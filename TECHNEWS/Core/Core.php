<?php

class Core
{
    public function __construct($params)
    {
        # print_r($params);

        #Valeur par défaut.
        if(empty($params)) :
            $params['controller']   = 'news';
            $params['action']       = 'index';
        endif;

        # Récupération des Paramètres
        $controller = $params['controller'];
        $action     = $params['action'];

        if($controller == 'news' && $action == 'index') {
            echo '<h1>JE SUIS LA PAGE D\'ACCUEIL</h1>';
        }

        if($controller == 'news' && $action == 'categorie') {
            echo '<h1>JE SUIS LA PAGE CATEGORIE</h1>';
        }

        if($controller == 'news' && $action == 'article') {
            echo '<h1>JE SUIS LA PAGE ARTICLE</h1>';
        }

        if($controller == 'membre' && $action == 'inscription') {
            echo '<h1>JE SUIS LA PAGE INSCRIPTION</h1>';
        }
    }
}