<?php

namespace Recipes\App\Controller;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class ErrorController
{
    public function index($parameters)
    {
        $loader = new FilesystemLoader('app/View/');
        $twig = new Environment($loader);

        $page = $parameters['page'] . '.html';
        $variables = array();
        
        echo $twig->render($page, $variables);
    }
}