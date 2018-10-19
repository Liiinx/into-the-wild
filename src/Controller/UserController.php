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
        /* Espace validation */
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->validator->sendData($_POST);
            // test name
            $this->validator->isNotEmpty('name');
            $this->validator->isAlpha('name');

            // test firstname
            $this->validator->isNotEmpty('firstname');
            $this->validator->isAlpha('firstname');
            // test email
            $this->validator->isNotEmpty('mail');
            $this->validator->isEmail('mail');

            // test password
            $this->validator->isNotEmpty('password');
            $this->validator->isNotEmpty('password2');
            $this->validator->isSame('password', 'password2');

            // test si ya pas des erreurs
                // insertion

            if(empty($this->validator->getErrors())) {
                $UserManager = new UserManager($this->getPdo());
                $user = new User();
                $user->setName(strip_tags(trim(htmlspecialchars($_POST['name']))));
                $user->setFirstnamestrip_tags(trim(htmlspecialchars($_POST['firstname'])));
                $user->setMail(strip_tags(trim(htmlspecialchars($_POST['mail']))));
                $mdpCrypt=password_hash(strip_tags(trim(htmlspecialchars($_POST['password'], PASSWORD_BCRYPT))));
                $user->setPassword($mdpCrypt);//
                $id = $UserManager->insert($user);
                header('Location:/');
            }

        }


        return $this->twig->render('User/inscription.html.twig', ["errors" => $this->validator->getErrors()]);
    }
    public function verif($data){
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
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