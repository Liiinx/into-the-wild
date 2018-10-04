<?php
/**
 * Created by PhpStorm.
 * User: camilo
 * Date: 03/10/18
 * Time: 12:05
 */

namespace Controller;

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
            header('Location:/item/' . $id);
        }

        return $this->twig->render('Article/add.html.twig');
    }

}