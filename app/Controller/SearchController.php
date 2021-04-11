<?php

namespace Recipes\App\Controller;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;
use \Recipes\App\Model\Search;

class SearchController
{
    public function category($parameters)
    {
        $category = $_GET['name'];

        $loader = new FilesystemLoader('app/View/');
        $twig = new Environment($loader);
        $page = $_GET['page'] . '.html';

        $meals = new Search();
        $meals = $meals->getMealsByCategory($category);
        $meals = json_decode($meals, true);

        $variables = array(
            'strSearch' => $category,
            'meals' => $meals['meals']
        );
        
        echo $twig->render($page, $variables);
    }

    public function area($parameters)
    {
        $area = $_GET['name'];

        $loader = new FilesystemLoader('app/View/');
        $twig = new Environment($loader);
        $page = $parameters['page'] . '.html';

        $meals = new Search();
        $meals = $meals->getMealsByArea($area);
        $meals = json_decode($meals, true);

        $variables = array(
            'strSearch' => $area,
            'meals' => $meals['meals']
        );
        
        echo $twig->render($page, $variables);
    }
}
