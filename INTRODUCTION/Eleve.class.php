<?php

class Eleve
{
    # Propriétés
    private $NomEleve,
            $PrenomEleve,
            $AgeEleve;

    /**
     * Eleve constructor.
     * @param $NomEleve
     * @param $PrenomEleve
     * @param $AgeEleve
     */
    public function __construct($NomEleve, $PrenomEleve, $AgeEleve)
    {
        $this->NomEleve     = $NomEleve;
        $this->PrenomEleve  = $PrenomEleve;
        $this->AgeEleve     = $AgeEleve;
    }

    /**
     * @return mixed
     */
    public function getNomEleve()
    {
        return $this->NomEleve;
    }

    /**
     * @param mixed $NomEleve
     */
    public function setNomEleve($NomEleve)
    {
        $this->NomEleve = $NomEleve;
    }

    /**
     * @return mixed
     */
    public function getPrenomEleve()
    {
        return $this->PrenomEleve;
    }

    /**
     * @param mixed $PrenomEleve
     */
    public function setPrenomEleve($PrenomEleve)
    {
        $this->PrenomEleve = $PrenomEleve;
    }

    /**
     * @return mixed
     */
    public function getAgeEleve()
    {
        return $this->AgeEleve;
    }

    /**
     * @param mixed $AgeEleve
     */
    public function setAgeEleve($AgeEleve)
    {
        $this->AgeEleve = $AgeEleve;
    }




}