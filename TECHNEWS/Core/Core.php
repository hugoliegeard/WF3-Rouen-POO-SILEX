<?php

namespace Core;

use Core\Controller\AppController;

class Core extends AppController
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
        $controller = 'Application\Controller\\'.
            ucfirst($params['controller']).'Controller';

        $action = $params['action'].'Action';

        # On vérifie si le fichier du controller
        # existe avant de l'instancier.
        if( file_exists( PATH_ROOT . '\\' . $controller . '.php' ) ) :

            $obj = new $controller;

            if( method_exists($obj, $action)) :

                $obj->$action();

            else :
                # Aucune action correspondante

                $this->render('errors/404', [
                    'message' => 'Cette action n\'existe pas'
                ]);

            endif;

        else :

            $this->render('errors/404', [
                'message' => 'Ce controleur n\'existe pas'
            ]);

        endif;

        #if($controller == 'news' && $action == 'index') {
        #    echo '<h1>JE SUIS LA PAGE D\'ACCUEIL</h1>';
        #}

        #if($controller == 'news' && $action == 'categorie') {
        #    echo '<h1>JE SUIS LA PAGE CATEGORIE</h1>';
        #}

        #if($controller == 'news' && $action == 'article') {
        #    echo '<h1>JE SUIS LA PAGE ARTICLE</h1>';
        #}

        #if($controller == 'membre' && $action == 'inscription') {
        #    echo '<h1>JE SUIS LA PAGE INSCRIPTION</h1>';
        #}
    }
}