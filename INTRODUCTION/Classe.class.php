<?php

class Classe
{
    private $NomClasse,
            $Eleves = [];

    /**
     * Classe constructor.
     * @param $NomClasse
     */
    public function __construct($NomClasse)
    {
        $this->NomClasse = $NomClasse;
    }

    /**
     * @return mixed
     */
    public function getNomClasse()
    {
        return $this->NomClasse;
    }

    /**
     * @param mixed $NomClasse
     */
    public function setNomClasse($NomClasse)
    {
        $this->NomClasse = $NomClasse;
    }

    /**
     * @return array
     */
    public function getEleves()
    {
        return $this->Eleves;
    }

    /**
     * @param Eleve $Eleves
     */
    public function AjouterUnEleve(Eleve $Eleves)
    {
        $this->Eleves[] = $Eleves;
    }

}