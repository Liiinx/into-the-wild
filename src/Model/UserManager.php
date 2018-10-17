<?php
/**
 * Created by PhpStorm.
 * User: bobbywcs
 * Date: 16/10/18
 * Time: 17:21
 */

namespace Model;



class UserManager extends AbstractManager
{

    const TABLE = 'user';

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }




}