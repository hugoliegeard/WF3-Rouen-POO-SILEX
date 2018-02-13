<?php

namespace Application\Model\Categorie;


use Core\Model\DbTable;

class CategorieDb extends DbTable
{
    protected $_table       = 'categorie';
    protected $_primary     = 'IDCATEGORIE';

    /**
     * Depuis PHP 5.5, le mot clé class est également
     * utilisé pour la résolution des noms de classes.
     * Vous pouvez récupérer une chaîne contenant le
     * nom qualifié complet de la classe ClassName
     * en utilisant ClassName::class.
     * http://php.net/manual/fr/language.oop5.basic.php
     */
    protected $_classToMap  = Categorie::class;
}
