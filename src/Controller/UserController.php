<?php
/**
 * Created by PhpStorm.
 * User: bobbywcs
 * Date: 17/10/18
 * Time: 14:44
 */

namespace Controller;

//use Model\ItemManager;
use Model\User;
use Model\UserManager;
use Model\ArticleManager;


class UserController extends AbstractController
{

    /* Pour afficher le formulaire */
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */

    /* Affiche page login */
    public function login ()
    {

        if($_SERVER['REQUEST_METHOD'] === "POST"){

            /* Espace validation */
            $this->validator->sendData($_POST);
            $this->validator->isNotEmpty('username');
            $this->validator->isNotEmpty('password');
            $this->validator->isEmail('username');

            /* Espace vérification */

            $user = new UserManager($this->getPdo());
            $val = $user->selectOneByField("mail", $_POST['username']);


            if($val != false && password_verify($_POST['password'], $val->getPassword())){


                echo "Obon !";


            } else {
                echo "Le mot de passe n'est pas bon !";
            }

        }

        return $this->twig->render('login.html.twig', ['errors' => $this->validator->getErrors()]);
    }

    /* Affiche page inscription */
    public function inscription()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $UserManager = new UserManager($this->getPdo());
            $user = new User();
            $user->setName($_POST['name']);
            $user->setFirstname($_POST['firstname']);
            $user->setMail($_POST['mail']);
            $user->setPassword($_POST['password']);
            $id = $UserManager->insert($user);
            header('Location:/');
        }

        return $this->twig->render('User/inscription.html.twig');
    }

    /* Affiche un seul article */
    public function showArticleUser(int $id)
    {

        $articleManager = new ArticleManager($this->getPdo());
        $article = $articleManager->selectOneById($id);

        return $this->twig->render('Article/showOneArticleUser.html.twig', ['article' => $article]);
    }

    /* Affiche les articles page accueil */
    public function homeShowListArticles()
    {

        $articleManager = new ArticleManager($this->getPdo());
        $articles = $articleManager->selectAll();
        //var_dump($articles);
        return $this->twig->render('Article/homePage.html.twig', ['article' => $articles]);

    }

    /* Afficher la liste globale des articles */
    public function showListArticles()
    {

        $articleManager = new ArticleManager($this->getPdo());
        $articles = $articleManager->selectAll();
        //var_dump($articles);
        return $this->twig->render('Article/showListArticles.html.twig', ['article' => $articles]);

    }

}