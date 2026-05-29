
<?php

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if (str_ends_with($uri, '.php')) {
    $uri = substr($uri, 0, -4);
}

if ($uri === '') {
    $uri = 'index';
}

$file = __DIR__ . '/../views/' . $uri . '.php';

if (file_exists($file)) {
    require $file;
} else {
    require __DIR__ . '/../views/404.php';
}