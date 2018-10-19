<?php
/**
 * Created by PhpStorm.
 * User: camilo
 * Date: 03/10/18
 * Time: 12:05
 */

namespace Controller; //

use Model\Article;
use Model\AdminManager;
use Model\ArticleManager;
use Model\UserManager;

class AdminController extends AbstractController
{

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */

    /* Affiche le dashboard */
    public function index()
    {
        $countTable = [];

        $articleManager = new ArticleManager($this->getPdo());
        $userManager = new UserManager($this->getPdo());

        $articleCount = $articleManager->countArticle();
        $countTable['article'] = $articleCount;


        $userCount = $userManager->countUsers();
        $countTable['users'] = $userCount;
        return $this->twig->render('Admin/index.html.twig', ['countTable' => $countTable]);
    }

    /* Ajout d'un article */
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

    /* Edition d'un article */
    public function edit(int $id): string
    {
        $articleManager = new ArticleManager($this->getPdo());
        $article = $articleManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            /* Validation des champs */
            $this->validator->sendData($_POST);
            $this->validator->isNotEmpty('title');
            $this->validator->isNotEmpty('content');

            /* Si il n'y a pas d'erreurs */
            if(empty($this->validator->getErrors())) {
                $article->setTitle($_POST['title']);
                $article->setContent($_POST['content']);
                $articleManager->update($article);
                return header('Location: /admin/articles');

            }
        }
        return $this->twig->render('Article/edit.html.twig', ['errors' => $this->validator->getErrors(), 'article' => $article]);
    }

    /* Affiche un seul article */
    public function show(int $id)
    {
        $articleManager = new ArticleManager($this->getPdo());
        $article = $articleManager->selectOneById($id);

        return $this->twig->render('Article/adminshowArticle.html.twig', ['article' => $article]);
    }

    /* Suppression article */
    public function deleteArticle(int $id)
    {

        // TODO faire une securité qui permet de verifier si c'est bien un admin et qu'il est bien connecté.

        $articleManager = new ArticleManager($this->getPdo());
        $deleteArticle = $articleManager->delete($id);

    }

    /* Affiche tout les articles */
    public function adminShowArticles()
    {

        $articleManager = new ArticleManager($this->getPdo());
        $articles = $articleManager->selectAll();
        return $this->twig->render('Article/adminListArticles.html.twig', ['article' => $articles]);
    }

}