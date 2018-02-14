<?php
/**
 * Created by PhpStorm.
 * User: Hugo LIEGEARD
 * Date: 14/02/2018
 * Time: 10:51
 */

namespace Application\Model\Tags;


class Tags
{
    private $IDTAGS,
            $LIBELLETAGS;


    /**
     * @return mixed
     */
    public function getIDTAGS()
    {
        return $this->IDTAGS;
    }

    /**
     * @return mixed
     */
    public function getLIBELLETAGS()
    {
        return $this->LIBELLETAGS;
    }
}