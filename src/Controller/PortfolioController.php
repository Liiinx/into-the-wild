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
}