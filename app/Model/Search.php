<?php

namespace Recipes\App\Model;

use Recipes\App\Core\API;

class Search
{
    public function getAllCategories()
    {
        $url = 'https://www.themealdb.com/api/json/v1/1/list.php?c=list';        
        $data = API::getData($url);

        return $data;
    }

    public function getMealsByCategory($category)
    {
        $url = "https://www.themealdb.com/api/json/v1/1/filter.php?c={$category}";
        $data = API::getData($url);

        return $data;

    }

    public function getAllCountries()
    {
        $url = 'https://www.themealdb.com/api/json/v1/1/list.php?a=list';
        $data = API::getData($url);

        return $data;

    }

    public function getMealsByArea($area)
    {
        $url = "https://www.themealdb.com/api/json/v1/1/filter.php?a={$area}";
        $data = API::getData($url);

        return $data;

    }
}
