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


    public function insert(User $user)
    {
        // prepared request

        $statement = $this->pdo->prepare("INSERT INTO $this->table (name, firstname, password, mail)
    VALUES (:name, :firstname, :password, :mail)");


        $statement->bindValue(':name', $user->getName(), \PDO::PARAM_STR);
        $statement->bindValue(':firstname', $user->getFirstname(), \PDO::PARAM_STR);
        $statement->bindValue(':password', $user->getPassword(), \PDO::PARAM_STR);
        $statement->bindValue(':mail', $user->getMail(), \PDO::PARAM_STR);

        // $statement->bindValue(':user_id', $user_id, \PDO::PARAM_STR);

        $statement->execute();
        return $this->pdo->lastInsertId();

    }
    public function countUsers()
    {
        $query = $this->pdo->query('SELECT COUNT(*) FROM ' . $this->table);
        return $query->fetch(\PDO::FETCH_NUM)[0];
    }


}