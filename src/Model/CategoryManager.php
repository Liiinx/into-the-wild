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
        return $this->pdo->query("SELECT category.id, category.name, count(article.category_id) as quantity FROM category 
LEFT JOIN article ON category.id=article.category_id GROUP BY category.id", \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }

    // Ajouter une categorie
    public function insert($category)
    {
        // prepared request

        $statement = $this->pdo->prepare("INSERT INTO $this->table (name)
    VALUES (:name)");


        $statement->bindValue(':name', $category->getName(), \PDO::PARAM_STR);

        $statement->execute();

        return $this->pdo->lastInsertId();

    }

    // Edit un article dans admin
    public function update(Category $category):int
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET name = :name WHERE id=:id");
        $statement->bindValue('id', $category->getId(), \PDO::PARAM_INT);
        $statement->bindValue('name', $category->getName(), \PDO::PARAM_STR);

        return $statement->execute();
    }
}