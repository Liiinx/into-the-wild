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
use Model\Category;
use Model\User;
use Model\CommentManager;
use Model\UserManager;
use Model\CategoryManager;

class AdminController extends AbstractController
{

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */

    public function __construct()
    {
        parent::__construct();

        /**
         * Si la session de l'utilisateur à comme status_id la valeur "1"
         * il est donc admin. Alors il peut utiliser la totalité de l'administration.
         * sinon il ne peut rien faire...
         */

        if($_SESSION["user"]["status_id"] != 1 || !isset($_SESSION["user"])){
            header("Location: /");
        } else {
            return true;
        }

    }

    /* Affiche le dashboard */
    public function index()
    {

        $countTable = [];

        $articleManager = new ArticleManager($this->getPdo());
        $userManager = new UserManager($this->getPdo());
        $commentsManager = new CommentManager($this->getPdo());


        $articleCount = $articleManager->countArticle();
        $countTable['article'] = $articleCount;

        $userCount = $userManager->countUsers();
        $countTable['users'] = $userCount;

        $commentsCount = $commentsManager->countComments();
        $countTable['comments'] = $commentsCount;



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
            $this->validator->checkExtension($_FILES['image']['name']);
            $this->validator->checkSize($_FILES['image']['size']);

            /* Si il n'y a pas d'erreurs */
            if(empty($this->validator->getErrors())){
                $article->setTitle($_POST['title']);
                $article->setContent($_POST['content']);
                $article->setCategoryId($_POST['category']);

                // chargement des images
                $uploadDir = 'assets/images/';
                if(isset($_FILES) && !empty($_FILES)) {
                    $filename = $_FILES['image']['name'];
                    $extension = pathinfo($filename, PATHINFO_EXTENSION); //récupère l'extension
                    $filename = 'image' . uniqid() . '.' .$extension; //numéro unique
                    $article->setImageName($filename);
                    $uploadFile = $uploadDir . basename($filename);
                    move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
                }

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
                // chargement des images

                $uploadDir = 'assets/images/';
                if($_FILES['image']['name'] != "") {
                    $this->validator->checkExtension($_FILES['image']['name']);
                    $this->validator->checkSize($_FILES['image']['size']);
                    if(empty($this->validator->getErrors())) {
                        $filename = $_FILES['image']['name'];
                        $extension = pathinfo($filename, PATHINFO_EXTENSION); //récupère l'extension
                        $filename = 'image' . uniqid() . '.' . $extension; //numéro unique
                        $article->setImageName($filename);
                        $uploadFile = $uploadDir . basename($filename);
                        move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
                    }
                }

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
    public function deleteUser(int $id)
    {
        // Camilo pour le bouton delete user

        $userManager = new UserManager($this->getPdo());
        $deleteUser = $userManager->delete($id);

    }


    /* Affiche tout les articles */
    public function adminShowArticles()
    {

        $articleManager = new ArticleManager($this->getPdo());
        $articles = $articleManager->selectAllArticles();
        return $this->twig->render('Article/adminListArticles.html.twig', ['article' => $articles]);
    }


    /* Affiche tous les commentaires */
    public function showComments()
    {
        $commentManager = new CommentManager($this->getPdo());
        $comments = $commentManager->selectComments();
        return $this->twig->render('Admin/showComments.html.twig', ['comments' => $comments]);
    }

    /* Affiche tout les users */
    public function adminShowUsers()
    {

        $userManager = new UserManager($this->getPdo());
        $users = $userManager->selectAll();
        //var_dump($users);
        return $this->twig->render('User/adminListUsers.html.twig', ['users' => $users]);

    }

    //supprimer un commentaire
    public function deleteComment($id)
    {
        $commentManager = new CommentManager($this->getPdo());
        $deleteComment = $commentManager->DeleteComment($id);
    }

    // Affiche toutes les catégories
    public function showCategories()
    {
        $categoryManager = new CategoryManager($this->getPdo());
        $categories = $categoryManager->showAllCategory();
        return $this->twig->render('Admin/showCategories.html.twig', ['categories' => $categories]);
    }

    // Ajouter une categorie
    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $categoryManager = new CategoryManager($this->getPdo());
            $category = new Category();

            /* Validation des champs */
            $this->validator->sendData($_POST);
            $this->validator->isNotEmpty('name');

            /* Si il n'y a pas d'erreurs */
            if(empty($this->validator->getErrors())){
                $category->setName($_POST['name']);
                $id = $categoryManager->insert($category);
                return header('Location: /admin/categories');
            }
        }

        return $this->twig->render('Admin/addCategory.html.twig', ['errors' => $this->validator->getErrors()]);
    }

    // Editer une catégorie
    public function editCategory(int $id): string
    {
        $categoryManager = new CategoryManager($this->getPdo());
        $category = $categoryManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            /* Validation des champs */
            $this->validator->sendData($_POST);
            $this->validator->isNotEmpty('name');

            /* Si il n'y a pas d'erreurs */
            if(empty($this->validator->getErrors())) {
                $category->setName($_POST['name']);


                $categoryManager->update($category);
                return header('Location: /admin/categories');

            }
        }
        return $this->twig->render('Admin/editCategory.html.twig', ['errors' => $this->validator->getErrors(), 'category' => $category]);
    }

    public function deleteCategory(int $id)
    {

        // TODO faire une securité qui permet de verifier si c'est bien un admin et qu'il est bien connecté.

        $categoryManager = new CategoryManager($this->getPdo());
        $deleteCategory = $categoryManager->delete($id);

    }

    /* Affiche un seul catégorie */
    public function showCategory(int $id)
    {
        $categoryManager = new CategoryManager($this->getPdo());
        $categories = $categoryManager->selectArticlesByCategory($id);

        return $this->twig->render('Admin/showCategory.html.twig', ['categories' => $categories]);
    }
}