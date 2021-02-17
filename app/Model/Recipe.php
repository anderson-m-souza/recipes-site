<?php

namespace Recipes\App\Model;

use Recipes\App\Core\API;

class Recipe
{
    public function getMealById($id)
    {
        $url = "https://www.themealdb.com/api/json/v1/1/lookup.php?i={$id}";
        $data = API::getData($url);

        return $data;
    }
}
