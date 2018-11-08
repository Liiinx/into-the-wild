<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:38
 * PHP version 7
 */

namespace Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;

use App\Connection;

use Controller\Validator;
use Controller\Flasher;

use Aptoma\Twig\Extension\MarkdownExtension;
use Aptoma\Twig\Extension\MarkdownEngine;
/**
 *
 */
abstract class AbstractController
{
    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * @var \Controller\Validator
     */
    protected $validator;

    /**
     *  Initializes this class.
     */

    protected $flasher;

    /*
     * This is utils class
     */
    protected $utils;



    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(APP_VIEW_PATH);
        $this->twig = new Twig_Environment(
            $loader,
            [
                'cache' => false,
                'debug' => APP_DEV,
            ]
        );

        $engine = new MarkdownEngine\MichelfMarkdownEngine();

        $this->twig->addExtension(new \Twig_Extension_Debug());
        $this->twig->addExtension(new MarkdownExtension($engine));

        $connection = new Connection();
        $this->pdo = $connection->getPdoConnection();

        $this->validator = new Validator();
        $this->flasher = new Flasher();
        $this->utils = new Utils();
        $this->twig->addGlobal('session', $_SESSION);

        if($this->flasher->hasFlashes()){
            $this->flasher->delete('flash');
        }

    }

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }
}
