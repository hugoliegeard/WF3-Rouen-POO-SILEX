<?php
/**
 * Création d'une class Ecole :
 * Une Classe PHP est une entité regroupant des
 * variables et des fonctions.
 * Chacune de ces fonctions aura accès aux
 * variables et cette entité.
 */

class Ecole
{
    # Déclaration des propriétés de notre class "Ecole"
    private $NomEcole,
            $AdresseEcole,
            $DirecteurEcole,
            $Classes = [];

    # Afin de pouvoir attribuer une valeur à
    # mes différentes variables, je vais mettre
    # en place un constructeur.

    /**
     * Ecole constructor.
     * @param $NomEcole
     * @param $AdresseEcole
     * @param $DirecteurEcole
     */
    public function __construct(
        $NomEcole,
        $AdresseEcole,
        $DirecteurEcole) {

        # Ici, nous allons attribuer une valeur
        # aux propriété de la class.
        # La valeur est passé grâce au constructeur.

        $this->NomEcole         = $NomEcole;
        $this->AdresseEcole     = $AdresseEcole;
        $this->DirecteurEcole   = $DirecteurEcole;
    }

    /* ------------------------------------- Getters */

    public function getDirecteurEcole() {
        return $this->DirecteurEcole;
    }

    public function  getNomEcole() {
        return $this->NomEcole;
    }

    public function getAdresseEcole() {
        return $this->AdresseEcole;
    }

    /* ------------------------------------- Setters */

    /**
     * Affecter une nouvelle valeur à NomEcole
     * @param $NomEcole
     */
    public function setNomEcole($NomEcole) {
        $this->NomEcole = $NomEcole;
    }

    public function setAdresseEcole($AdresseEcole) {
        $this->AdresseEcole = $AdresseEcole;
    }

    public function setDirecteurEcole($DirecteurEcole) {
        $this->DirecteurEcole = $DirecteurEcole;
    }

    /**
     * @param Classe $uneClasse
     */
    public function AjouterUneClasse(Classe $uneClasse)
    {
        $this->Classes[] = $uneClasse;
    }

}