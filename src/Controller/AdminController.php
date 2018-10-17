<?php
/**
 * Created by PhpStorm.
 * User: camilo
 * Date: 03/10/18
 * Time: 12:05
 */

namespace Controller; //

use Model\AdminManager;

class AdminController extends AbstractController
{
    public function index()
    {
        $countAricles = new AdminManager($this->getPdo());


        $countTotalArticles = $countAricles->selectAll();


        return $this->twig->render('Admin/index.html.twig', ['countArticles' => $countTotalArticles]); //
    }
}