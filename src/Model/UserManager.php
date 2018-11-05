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

        $statement = $this->pdo->prepare("INSERT INTO $this->table (name, firstname, password, mail, confirmation_token)
    VALUES (:name, :firstname, :password, :mail, :confirmation_token)");


        $statement->bindValue(':name', $user->getName(), \PDO::PARAM_STR);
        $statement->bindValue(':firstname', $user->getFirstname(), \PDO::PARAM_STR);
        $statement->bindValue(':password', $user->getPassword(), \PDO::PARAM_STR);
        $statement->bindValue(':mail', $user->getMail(), \PDO::PARAM_STR);
        $statement->bindValue(':confirmation_token', $user->getConfirmationToken(), \PDO::PARAM_STR);

        // $statement->bindValue(':user_id', $user_id, \PDO::PARAM_STR);

        $statement->execute();
        return $this->pdo->lastInsertId();

    }
    public function countUsers()
    {
        $query = $this->pdo->query('SELECT COUNT(*) FROM ' . $this->table);
        return $query->fetch(\PDO::FETCH_NUM)[0];
    }
    public function delete($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $statement->execute([':id' => $id]);

        //$_SERVER['HTTP_REFERER'] = Sert à retourner sur la page précédente
        return header('Location: ' .  $_SERVER['HTTP_REFERER']);
    }

    public function setConfirm($value)
    {
        $getUser = $this->pdo->prepare("SELECT * FROM $this->table WHERE confirmation_token = '$value'");
        $getUser->execute();
        $resUser = $getUser->fetchAll(\PDO::FETCH_CLASS, 'Model\User');

        if($resUser){
            $setConfirm = $this->pdo->prepare("UPDATE user SET confirmation_token = null, is_validate = 1");
            $setConfirm->execute();
            return true;
        } else {
            return false;
        }
    }

}