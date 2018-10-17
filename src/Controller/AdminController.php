<?php
/**
 * Created by PhpStorm.
 * User: camilo
 * Date: 03/10/18
 * Time: 12:05
 */

namespace Controller; //

use Model\UserManager;

use Model\AdminManager;

class AdminController extends AbstractController
{
    public function index()
    {
     
        $countArticles = new AdminManager($this->getPdo());
        $countTotalArticles = $countArticles->selectAll();
        return $this->twig->render('Admin/index.html.twig', ['countArticles' => $countTotalArticles]); //
    }
}