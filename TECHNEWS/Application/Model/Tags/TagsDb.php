<?php
/**
 * Created by PhpStorm.
 * User: Hugo LIEGEARD
 * Date: 14/02/2018
 * Time: 10:52
 */

namespace Application\Model\Tags;


use Core\Model\DbTable;

class TagsDb extends DbTable
{
    protected $_table       = 'tags';
    protected $_primary     = 'IDTAGS';
    protected $_classToMap  = Tags::class;
}