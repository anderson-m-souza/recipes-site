<?php

function load($classname)
{
    $search = array('Recipes\\App', '\\');
    $replace = array('app', DIRECTORY_SEPARATOR);
    $fullPath = str_replace($search, $replace, $classname) . '.php';

    if (file_exists($fullPath)) {
        require_once $fullPath;
        return true;
    }

    return false;
}

spl_autoload_register('load');