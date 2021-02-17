<?php

namespace Recipes\App\Controller;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;
use \Recipes\App\Model\Search;

class HomeController
{
    public function index($parameters)
    {
        $loader = new FilesystemLoader('app/View/');
        $twig = new Environment($loader);
        $page = $parameters['page'] . '.html';
        $template = $twig->load($page);

        $search = new Search();

        $categories = $search->getAllCategories();
        $categories = json_decode($categories, true);

        $countries = $search->getAllCountries();
        $countries = json_decode($countries, true);

        $variables = array(
            'categories' => $categories['meals'],
            'countries' => $countries['meals']
        );

        $main = $template->render($variables);

        echo $main;
    }
}
