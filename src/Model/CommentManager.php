<?php
/**
 * Created by PhpStorm.
 * User: bobbywcs
 * Date: 16/10/18
 * Time: 17:21
 */

namespace Model;



class CommentManager extends AbstractManager
{

    const TABLE = 'comment';

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function countComments()
    {
        $query = $this->pdo->query('SELECT COUNT(*) FROM ' . $this->table);
        return $query->fetch(\PDO::FETCH_NUM)[0];
    }

}