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


    public function insert(Article $article)
    {
        // prepared request

        $statement = $this->pdo->prepare("INSERT INTO $this->table (titre, contenu)
    VALUES (:titre, :contenu)");


        $statement->bindValue(':titre', $article->getTitre(), \PDO::PARAM_STR);
        $statement->bindValue(':contenu', $article->getContenu(), \PDO::PARAM_STR);

        // $statement->bindValue(':user_id', $user_id, \PDO::PARAM_STR);


        $statement->execute();

        return $this->pdo->lastInsertId();

    }




}