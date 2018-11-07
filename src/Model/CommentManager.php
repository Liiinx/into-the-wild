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
    //Affiche tous les commentaires côté Admin
    public function selectComments()
    {
        return $this->pdo->query("SELECT comment.comment, comment.id,comment.date, article.title, user.name FROM
   $this->table INNER JOIN article ON comment.article_id=article.id INNER JOIN user ON comment.user_id=user.id ORDER BY date DESC", \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }
    //Affiche la liste des commentaires côté user
    public function selectArticleComments($id) {

        // prepared request
        $statement = $this->pdo->prepare("SELECT comment.user_id, comment.comment,comment.article_id, comment.id, comment.date, user.name, user.firstname FROM $this->table INNER JOIN user ON comment.user_id=user.id INNER JOIN article ON article.id=comment.article_id WHERE article_id=:id ORDER BY comment.date DESC");
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

    // insérer un commentaire
    public function insert(Comment $comment)
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (comment, article_id, user_id) 
VALUES (:comment, :article_id, :user_id)");

        $statement->bindValue(':comment', $comment->getComment(), \PDO::PARAM_STR);
        $statement->bindValue(':article_id', $comment->getArticleId(), \PDO::PARAM_STR);
        $statement->bindValue(':user_id', $comment->getUserId(), \PDO::PARAM_STR);
        $statement->execute();

        return $this->pdo->lastInsertId();

    }

    //supprimer un article côté admin et côté user
    public function DeleteComment($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->execute([':id' => $id]);
        //$_SERVER['HTTP_REFERER'] = Sert à retourner sur la page précédente
        return header('Location: ' .  $_SERVER['HTTP_REFERER']);
    }
}