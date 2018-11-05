<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 05/11/18
 * Time: 11:12
 */

namespace Controller;


class PortfolioController extends AbstractController
{
    public function groupe1()
    {
        return $this->twig->render('Portfolio/groupe1.html.twig');
    }

    public function  groupe2()
    {
        return $this->twig->render('Portfolio/groupe2.html.twig');
    }

    public function groupe3()
    {
        return $this->twig->render('Portfolio/groupe3.html.twig');
    }

    public function groupe4()
    {
        return $this->twig->render('Portfolio/groupe4.html.twig');
    }
}