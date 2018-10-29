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

        $statement = $this->pdo->prepare("INSERT INTO $this->table (title, content, imageName)
    VALUES (:title, :content, :imageName)");


        $statement->bindValue(':title', $article->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue(':content', $article->getContent(), \PDO::PARAM_STR);
        $statement->bindValue(':imageName', $article->getImageName(), \PDO::PARAM_STR);

        // $statement->bindValue(':user_id', $user_id, \PDO::PARAM_STR);


        $statement->execute();

        return $this->pdo->lastInsertId();

    }
    // Delete un article dans admin
    public function delete($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $statement->execute([':id' => $id]);

        //$_SERVER['HTTP_REFERER'] = Sert à retourner sur la page précédente
        return header('Location: ' .  $_SERVER['HTTP_REFERER']);
    }

    // Edit un article dans admin
    public function update(Article $article):int
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET title = :title, content = :content, imageName = :imageName WHERE id=:id");
        $statement->bindValue('id', $article->getId(), \PDO::PARAM_INT);
        $statement->bindValue('title', $article->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('content', $article->getContent(), \PDO::PARAM_STR);
        $statement->bindValue('imageName', $article->getImageName(), \PDO::PARAM_STR);


        return $statement->execute();
    }

    public function countArticle()
    {
        $query = $this->pdo->query('SELECT COUNT(*) FROM ' . $this->table);
        return $query->fetch(\PDO::FETCH_NUM)[0];
    }

    public function getArticlesForPaginate($first, $per)
    {

        $state = $this->pdo->prepare("SELECT * FROM $this->table ORDER BY id ASC LIMIT :fist,:per ");
        $state->bindParam(':fist', $first, \PDO::PARAM_INT);
        $state->bindParam(':per', $per, \PDO::PARAM_INT);
        $state->execute();
        $res = $state->fetchAll(\PDO::FETCH_CLASS, 'Model\User');
        return $res;
    }

}