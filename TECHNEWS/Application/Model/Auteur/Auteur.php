<?php
/**
 * Created by PhpStorm.
 * User: Hugo LIEGEARD
 * Date: 14/02/2018
 * Time: 10:42
 */

namespace Application\Model\Auteur;


class Auteur
{
    private $IDAUTEUR,
            $NOMAUTEUR,
            $PRENOMAUTEUR,
            $EMAILAUTEUR;


    /**
     * @return mixed
     */
    public function getIDAUTEUR()
    {
        return $this->IDAUTEUR;
    }

    /**
     * @return mixed
     */
    public function getNOMAUTEUR()
    {
        return $this->NOMAUTEUR;
    }

    /**
     * @return mixed
     */
    public function getPRENOMAUTEUR()
    {
        return $this->PRENOMAUTEUR;
    }

    /**
     * @return mixed
     */
    public function getEMAILAUTEUR()
    {
        return $this->EMAILAUTEUR;
    }

    /**
     * Retourne le Nom Complet de l'Auteur
     * @return string
     */
    public function getNOMCOMPLETAUTEUR() {
        return $this->PRENOMAUTEUR . ' ' . $this->NOMAUTEUR;
    }
}
