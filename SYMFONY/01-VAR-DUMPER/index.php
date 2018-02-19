<?php

# Importation de l'Autoload de Composer
require_once 'vendor/autoload.php';

use Symfony\Component\VarDumper\VarDumper;

# Contenu de Démonstration
class Contact {

    private $_firstname,
            $_lastname;

    /**
     * Contact constructor.
     * @param $_firsname
     * @param $_lastname
     */
    public function __construct($_firstname, $_lastname)
    {
        $this->_firstname = $_firstname;
        $this->_lastname = $_lastname;
    }
}

$unString   = 'Une Chaine de Caractère';
$unArray    = ['Hugo','Hocine','Benjamin'];
$unObjet    = new Contact('Hugo','LIEGEARD');

# Test de VarDumper
VarDumper::dump($unString);
VarDumper::dump($unArray);
VarDumper::dump($unObjet);
