<?php

namespace Core\Model;


class DbFactory
{
    public static function PdoFactory() {

        # Création d'une connexion PDO
        $pdo = new \PDO('mysql:host='.DBHOST.';dbname='.DBNAME,
            DBUSER,DBPASW);

        # Gestion des erreurs : http://php.net/manual/fr/pdo.error-handling.php
        $pdo->setAttribute(\PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION);

        # On retourne $pdo
        return $pdo;
    }

    /**
     * Créer une instance de Idiorm ORM
     */
    public static function IdiormFactory() {

        # Initialisation de Idiorm
        ORM::configure('mysql:host='.DBHOST.';dbname='.DBNAME);
        ORM::configure('username', DBUSER);
        ORM::configure('password', DBPASW);

        /**
         * Configuration de la clé primaire de chaque table.
         * Cette configuration n'est nécessaire que si les
         * clé primaires sont différentes de 'id'
         * @see http://idiorm.readthedocs.io/en/latest/configuration.html#id-column
         */
        ORM::configure('id_column_overrides', array(
            'article'       => 'IDARTICLE',
            'view_articles' => 'IDARTICLE',
        ));

    }
}