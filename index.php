<?php

require_once 'app/require/autoload.php';
require_once 'vendor/autoload.php';

use Recipes\App\Core\App;

$template = file_get_contents('app/Template/index.html');

ob_start();

$core = new App();
$core->start($_GET);

$content = ob_get_contents();

ob_end_clean();

$page = str_replace('{{main}}', $content, $template);

echo $page;