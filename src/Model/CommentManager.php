<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 19/10/18
 * Time: 17:16
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
}