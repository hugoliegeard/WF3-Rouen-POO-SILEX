<?php
/**
 * Created by PhpStorm.
 * User: Hugo LIEGEARD
 * Date: 14/02/2018
 * Time: 10:26
 */

namespace Application\Model\Article;


use Core\Model\DbTable;

class ArticleDb extends DbTable
{
    protected $_table       = 'article';
    protected $_primary     = 'IDARTICLE';
    protected $_classToMap  = Article::class;
}