<?php
/**
 * Created by PhpStorm.
 * User: bobbywcs
 * Date: 17/10/18
 * Time: 14:44
 */

namespace Controller;

use Model\ItemManager;
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

}