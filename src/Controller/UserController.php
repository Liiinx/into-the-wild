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


class UserController extends AbstractController
{

    /* Pour afficher le formulaire */
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */

    public function form ()
    {

        if($_SERVER['REQUEST_METHOD'] === "POST"){

            $this->validator->sendData($_POST);
            $this->validator->isNotEmpty('username');
            $this->validator->isNotEmpty('password');
            $this->validator->isEmail('username');

            $user = new UserManager($this->getPdo());
            $val = $user->selectOneByField("mail", "root@root.com");

            if(password_verify("root", $val->getPassword())){
                echo "Bon !";
            } else {
                echo "Pas bon !";
            }

        }

        return $this->twig->render('login.html.twig', ['errors' => $this->validator->getErrors()]);
    }

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

}