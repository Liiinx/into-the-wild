<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 26/10/18
 * Time: 13:10
 */

namespace Model;


class CategoryManager extends AbstractManager
{
    const TABLE = 'category';

    /**
     *  Initializes this class.
     */

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    //Affiche toutes les categories
    public function showAllCategory()
    {
        return $this->pdo->query("SELECT category.name, count(article.category_id) as quantity FROM category 
INNER JOIN article ON category.id=article.category_id GROUP BY article.category_id", \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }
}