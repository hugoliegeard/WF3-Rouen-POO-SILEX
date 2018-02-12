<?php

# Importation de notre Classe Ecole
require_once 'Ecole.class.php';

# Importation de notre Classe Eleve
require_once 'Eleve.class.php';

# Importation de notre Classe Classe
require_once 'Classe.class.php';


/**
 * Création d'une instance de la classe Ecole.
 * Ici, notre variable $Ecole est un Object de
 * la classe Ecole. En ce sens, elle à accès à
 * l'ensemble des variables et fonction qui la
 * compose.
 */

$Ecole = new Ecole(
    'WF3 Rouen',
    'Place Saint-Marc',
    'Alexandre MARTINI'
);

# Affichage de l'Objet Ecole
var_dump($Ecole);

# Afficher le nom de l'école
# : Cannot access private property
# echo $Ecole->NomEcole;
echo $Ecole->getNomEcole();

# Je veux changer le nom de l'école ?
$Ecole->setNomEcole('Webforce3 Rouen ltd');
echo '<br>'.$Ecole->getNomEcole();

# Création d'Eleves
$Eleve1 =  new Eleve('JOURAND', 'Benjamin',26);
$Eleve2 =  new Eleve('BACON', 'Terry',24);
$Eleve3 =  new Eleve('BOUKHATEB', 'Abdel',21);
$Eleve4 =  new Eleve('FOLLIN', 'Emilie',48);

# Création des Classes
$Classe1 = new Classe('Front');
$Classe2 = new Classe('Back');
$Classe3 = new Classe('Fullstack');

# On affecte nos Eleves à leur classe
$Classe1->AjouterUnEleve($Eleve1);
$Classe1->AjouterUnEleve($Eleve2);
$Classe2->AjouterUnEleve($Eleve3);
$Classe3->AjouterUnEleve($Eleve4);

# Aperçu d'une des classes
echo '<pre>';
    print_r($Classe1);
echo '</pre>';

# Affecter les Classes à une Ecole
$Ecole->AjouterUneClasse($Classe1);
$Ecole->AjouterUneClasse($Classe2);
$Ecole->AjouterUneClasse($Classe3);

# Aperçu de l'école
echo '<pre>';
    print_r($Ecole);
echo '</pre>';

# Afficher mes Classes et leurs Eleves

