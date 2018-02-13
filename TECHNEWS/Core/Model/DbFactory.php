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
}