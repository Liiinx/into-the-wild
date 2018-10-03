<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 03/10/18
 * Time: 12:42
 */

namespace Model;


class ArticleManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'article';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }
}