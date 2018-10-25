<?php
/**
 * Created by PhpStorm.
 * User: bobbywcs
 * Date: 17/10/18
 * Time: 14:44
 */

namespace Controller;

//use Model\ItemManager;
use Model\Comment;
use Model\CommentManager;
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
            /* Espace  vérification */
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
                $user->setFirstname(strip_tags(trim(htmlspecialchars($_POST['firstname']))));
                $user->setMail(strip_tags(trim(htmlspecialchars($_POST['mail']))));
                $mdpCrypt=password_hash(strip_tags(trim(htmlspecialchars($_POST['password']))), PASSWORD_BCRYPT);
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

        $commentManager = new CommentManager($this->getPdo());
        if (!empty($_POST)) {
            //var_dump($_POST);
            $comment = new Comment();
            $comment->setComment($_POST['comment']);
            $comment->setArticleId($article->getId());
            $comment->setUserId($_SESSION["user"]["id"]);
            $commentManager->insert($comment);
        }
        $comments = $commentManager->selectArticleComments($id);

        return $this->twig->render('Article/showOneArticleUser.html.twig', ['article' => $article, 'comments' => $comments]);

    }

    /* Affiche les articles page accueil */
    public function homeShowListArticles()
    {

        $articleManager = new ArticleManager($this->getPdo());
        $articles = $articleManager->selectAll();
        //var_dump($_SESSION);
        return $this->twig->render('Article/homePage.html.twig', ['article' => $articles]);


    }

    /* Afficher la liste globale des articles */
    public function showListArticles()
    {

        $articleManager = new ArticleManager($this->getPdo());
        $articles = $articleManager->selectAll();
        return $this->twig->render('Article/showListArticles.html.twig', ['article' => $articles]);

    }

    /* Supprimer 1 commentaire */
    public function deleteComment($id)
    {
        $commentManager = new CommentManager($this->getPdo());
        $comment = $commentManager->deleteComment($id);

    }
}