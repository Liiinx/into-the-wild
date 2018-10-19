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

        /* Si l'utilisateur est déjà connecté alors */
        if(!empty($this->flasher->read('user'))){
            header("Location: /");
        }

        /* Si ont est en post */
        if($_SERVER['REQUEST_METHOD'] === "POST"){

            /* Espace validation */
            $this->validator->sendData($_POST);
            $this->validator->isNotEmpty('username');
            $this->validator->isNotEmpty('password');
            $this->validator->isEmail('username');

            /* Espace vérification */
            $user = new UserManager($this->getPdo());
            $val = $user->selectOneByField("mail", $_POST['username']);

            /**
             * $val => Requête SQL en base de données.
             * Comparaison du mot de passe en base de données avec le mot de passe envoyé dans le POST.
             * Si le mot de passe en BDD === Mot de passe dans $_POST["Password"] alors
             * La connexion est effectuée. Sinon erreur.
             */
            if ($val != false && password_verify($_POST['password'], $val->getPassword())) {

                session_start();

                /**
                 * Fonction getAll() retourne les éléments suivants :
                 * ["id","name","firstname","email","status_id"]
                 * Pas de mot de passe pour des raisons de sécurité.
                 */
                $_SESSION['user'] = $val->getAll();

                /**
                 * Si l'utilisateur est administrateur (1)
                 * Alors je le connecte sur l'administration.
                 * Sinon je l'envois sur la page d'accueil.
                 *
                 * $this->flasher->setFlas("CLASSE BOOTSTRAP ALERT ICI", "MESSAGE à AFFICHER DANS LA PAGE RENVOYER");
                 */
                if($_SESSION["user"]["status_id"] === "1"){

                    $this->flasher->setFlash('success', "Vous êtes dès à présent connecté !");
                    header("location: /admin/");
                    exit();
                } else {
                    // $this->flasher->setFlash('success', "Vous êtes dès à présent connecté !");
                    header("location: /");
                }
            } else {
                $this->validator->setErrors("Echec de la connexion !");
            }
        }

        /* Retour des erreurs ici  */
        return $this->twig->render('login.html.twig', ['errors' => $this->validator->getErrors()]);
    }

    /* Sert à la déconnexion */
    public function disconnect(){

        /**
         * Verification de l'éxistance de la session user via la fonction read
         * Si la session existe = Utilisateur est donc connecté alors la déconnexion est faite.
         * Sinon l'utilisateur n'est pas connecté ont le renvoi sur la page "/"
         */
        if(!empty($this->flasher->read('user'))){
            $this->flasher->delete('user');
            $this->flasher->setFlash('success', "Vous êtes dès à présent déconnecté !");
            header("Location: /connexion");
            exit();
        }
        header("Location: /");
    }

    /* Affiche page inscription */
    public function inscription()
    {

        if(!empty($this->flasher->read('user'))){
            header("Location: /");
        }


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