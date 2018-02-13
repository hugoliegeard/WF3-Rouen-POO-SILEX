<?php
/**
 * Nous sommes ici sur le point d'entrée de notre App.
 * En MVC, c'est ce que l'on appel : un FrontController.
 * L'ensemble des actions / requètes de notre site internet
 * passera uniquement par ce fichier. Il a pour mission
 * de transférer au bon controleur la demande de l'utilisateur.
 * -----
 * Dans un Framework et en MVC, nous utilisons la puissance de
 * la réécriture des URLs via la création d'un fichier .htaccess
 */

use Core\Core;

# Initialisation du Site
require_once 'bootstrap.php';

# Front Controller
$core = new Core($_GET);
