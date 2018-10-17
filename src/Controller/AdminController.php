<?php
/**
 * Created by PhpStorm.
 * User: camilo
 * Date: 03/10/18
 * Time: 12:05
 */

namespace Controller; //

use Model\UserManager;

class AdminController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Admin/index.html.twig');
    }
}