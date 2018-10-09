<?php
/**
 * Created by PhpStorm.
 * User: camilo
 * Date: 03/10/18
 * Time: 12:05
 */

namespace Controller; //
use Model\Article;
use Model\ArticleManager;

class ArticleController extends AbstractController
{
    public function show(int $id)
    {
        $articleManager = new ArticleManager($this->getPdo());
        $article = $articleManager->selectOneById($id);

        return $this->twig->render('Article/show.html.twig', ['article' => $article]);
    }
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleManager = new ArticleManager($this->getPdo());
            $article = new Article();
            $article->setTitre($_POST['titre']);
            $article->setContenu($_POST['contenu']);
            $id = $articleManager->insert($article);
            header('Location:/article/' . $id);
        }

        return $this->twig->render('Article/add.html.twig');
    }

   // showListArticles, En tant qu'utilisateur je veux voir la liste des articles afin d'en choisir un(5)

    public function showListArticles()
    {

        $articleManager = new ArticleManager($this->getPdo());
        $articles = $articleManager->selectAll();
        //var_dump($articles);
        return $this->twig->render('Article/showListArticles.html.twig', ['article' => $articles]);

    }
        // voir listes des articles dans l'admin
    public function adminShowArticles()
    {

        $articleManager = new ArticleManager($this->getPdo());
        $articles = $articleManager->selectAll();
        return $this->twig->render('Article/adminListArticles.html.twig', ['article' => $articles]);
    }
}