<?php

# Quelques constantes utiles
define('PATH_ROOT', dirname(__DIR__));
define('PATH_PUBLIC', '/FORMATION/WF3-ROUEN/POO/TECHNEWS/public');
define('PATH_APPLICATION', PATH_ROOT . '/Application');
define('PATH_LAYOUT', PATH_APPLICATION . '/Layout');
define('PATH_VIEWS', PATH_APPLICATION . '/Views');
define('PATH_HEADER', PATH_LAYOUT. '/header.inc.php');
define('PATH_FOOTER', PATH_LAYOUT. '/footer.inc.php');

# Connexion à la BDD
define('DBHOST', 'localhost');
define('DBNAME', 'technews-rouen');
define('DBUSER', 'root');
define('DBPASW', '');

# Chargement de l'Autoload
require_once 'autoloader.php';
Autoloader::register();
