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


    public function index(){
        return $this->twig->render('Article/homePage.html.twig');
    }

    /* Fonction qui permet d'afficher tout les articles */
    public function show(int $id)
    {
        $articleManager = new ArticleManager($this->getPdo());
        $article = $articleManager->selectOneById($id);

        return $this->twig->render('Article/adminshowArticle.html.twig', ['article' => $article]);
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $articleManager = new ArticleManager($this->getPdo());
            $article = new Article();

            /* Validation des champs */
            $this->validator->sendData($_POST);
            $this->validator->isNotEmpty('title');
            $this->validator->isNotEmpty('content');

            /* Si il n'y a pas d'erreurs */
            if(empty($this->validator->getErrors())){
                $article->setTitle($_POST['title']);
                $article->setContent($_POST['content']);
                $id = $articleManager->insert($article);
                return header('Location: /admin/articles');
            }
        }

        return $this->twig->render('Article/add.html.twig', ['errors' => $this->validator->getErrors()]);
    }

  
    /* [CLIENT] afficher la liste globale de tout les articles */
    public function showListArticles()
    {

        $articleManager = new ArticleManager($this->getPdo());
        $articles = $articleManager->selectAll();
        //var_dump($articles);
        return $this->twig->render('Article/showListArticles.html.twig', ['article' => $articles]);

    }


    public function showArticleUser(int $id)
    {

        $articleManager = new ArticleManager($this->getPdo());
        $article = $articleManager->selectOneById($id);

        return $this->twig->render('Article/showOneArticleUser.html.twig', ['article' => $article]);
    }

    // voir listes des articles dans l'admin

  public function adminShowArticles()
    {

        $articleManager = new ArticleManager($this->getPdo());
        $articles = $articleManager->selectAll();
        return $this->twig->render('Article/adminListArticles.html.twig', ['article' => $articles]);
    }

    public function homeShowListArticles()
    {

        $articleManager = new ArticleManager($this->getPdo());
        $articles = $articleManager->selectAll();
        //var_dump($articles);
        return $this->twig->render('Article/homePage.html.twig', ['article' => $articles]);

    }

    public function deleteArticle(int $id)
    {

        // TODO faire une securité qui permet de verifier si c'est bien un admin et qu'il est bien connecté.

        $articleManager = new ArticleManager($this->getPdo());
        $deleteArticle = $articleManager->delete($id);

    }

}