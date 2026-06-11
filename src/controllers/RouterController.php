<?php

class RouterController
{
    public static function route($uri)
    {
        $routes = [
            //PAGES
            '' => __DIR__ . '/../views/index.php',
            'login' => __DIR__ . '/../views/login.php',
            'projeto' => __DIR__ . '/../views/projeto.php',
            'cadastro' => __DIR__ . '/../views/cadastro.php',
            'admin' => __DIR__ . '/../views/admin/adm.php',
            'ranking' => __DIR__ . '/../views/ranking.php',

            //APIS
            'login_validate' => __DIR__ . '/../api/login_validate.php',
            'cadastro_validate' => __DIR__ . '/../api/cadastro_validate.php',
            
        ];

        if (isset($routes[$uri])) {
            require $routes[$uri];
            return;
        }

        require __DIR__ . '/../views/404.php';
    }
}