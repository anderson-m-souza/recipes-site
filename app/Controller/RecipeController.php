<?php

namespace Recipes\App\Controller;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;
use \Recipes\App\Model\Recipe;

class RecipeController
{
    public function index($parameters)
    {
        $loader = new FilesystemLoader('app/View/');
        $twig = new Environment($loader);
        $page = $parameters['page'] . '.html';

        $meal = new Recipe();
        $meal = $meal->getMealById($_GET['id']);
        $meal = json_decode($meal, true);

        $variables = array();
        $variables = $meal['meals'][0];
        $variables = self::organizeIngredients($variables);
        $variables['strInstructions'] = str_replace("\r\n", '</p><p>', $variables['strInstructions']);
        if ($variables['strYoutube']) {
            $variables['strYoutube'] = explode('v=',$variables['strYoutube'])[1];
        }

        echo $twig->render($page, $variables);
    }

    public function organizeIngredients($variables)
    {
        $ingredients = array();

        foreach ($variables as $name => $variable) {
            
            if (strpos($name, 'strIngredient') !== false) {

                $number = str_replace('strIngredient', '', $name);

                if ($variable) {
                    $ingredients[$number - 1] = [
                        'name' => $variable,
                        'measure' => $variables['strMeasure' . $number]
                    ];
                }

                unset($variables[$name]);
                unset($variables['strMeasure' . $number]);
            }
        }

        $variables['strIngredients'] = $ingredients;
        return $variables;
    }
}
