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

/*
    public function insert(Article $article){

        // Préparation de la requête SQL.
        $req = $this->pdo->prepare("INSERT INTO $this->table SET titre = :titre, contenu = :contenu, user_id = :user_id");

        // Execution et traitement de la requête
        $req->execute([
           ":titre" => $article->getTitre(),
           ":contenu" => $article->getContenu(),
           ":user_id" => 55,
        ]);

        // Dans le cas ou tout vas bien, je renvoi le dernier id inseré
        return $this->pdo->lastInsertId();

    }
*/


    public function insert(Article $article): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table ('titre', 'contenu')
                                                        VALUES (:titre, :contenu, :user_id)");
        $statement->bindValue('titre', $article->getTitre(), \PDO::PARAM_STR);
        $statement->bindValue('contenu', $article->getContenu(), \PDO::PARAM_STR);
        /*$statement->bindValue('user_id', $article->getUserId(), \PDO::PARAM_INT); */

        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }




}