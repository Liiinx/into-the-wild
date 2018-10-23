<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: wilder
 * Date: 19/10/18
 * Time: 17:16
=======
 * User: bobbywcs
 * Date: 16/10/18
 * Time: 17:21
>>>>>>> b93eadf36bc44e119d6225e72c3da498fcac8d5f
 */

namespace Model;



use Controller\AbstractController;


class CommentManager extends AbstractManager
{

    const TABLE = 'comment';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent ::__construct(self::TABLE, $pdo);
    }

    public function selectComments()
    {
        return $this->pdo->query("SELECT comment.comment, article.title, user.name FROM
   $this->table INNER JOIN article ON comment.article_id=article.id INNER JOIN user ON comment.user_id=user.id", \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }

    public function selectArticleComments($id) {

        // prepared request
        $statement = $this->pdo->prepare("SELECT comment.comment,comment.article_id, user.name FROM 
  $this->table INNER JOIN user ON comment.user_id=user.id
   INNER JOIN article ON article.id=comment.article_id WHERE article_id=:id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function countComments()
    {
        $query = $this->pdo->query('SELECT COUNT(*) FROM ' . $this->table);
        return $query->fetch(\PDO::FETCH_NUM)[0];
    }


}