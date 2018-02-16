<?php

namespace Core\Model;

trait Helper {

    public function generateUrl($controller, $action) {
        return PATH_PUBLIC . '/' . $controller . '/' . $action;
    }

    /**
     * Génère l'url pour le masque et les paramètres passé.
     * @param $mask
     * @param array $valeur
     * @example $this->generateUfm('connexion.html');
     * @example $this->generateUfm('article/$1-$2.html', [2, 'mon-slug']);
     * @return string
     */
    public function generateUfm($mask, Array $valeur = []) {

        # Générer le tableau des éléments à rechercher ($1, $2, ...)
        $search = [];
        foreach ($valeur as $key => $value) {
            $search[] = '$' . ++$key;
        }

        # On remplace les $1, $n ... par leur valeur dans le mask
        $url = str_replace($search, $valeur, $mask);

        # On retourne l'url complète
        return PATH_PUBLIC . '/' . $url;

    }

    /**
     * Permet de générer un Slug à partir d'un String
     * @param $text
     * @return String Slug
     * @see https://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string
     */
    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

}