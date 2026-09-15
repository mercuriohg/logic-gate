<?php

class RouterController
{
    public static function route($uri)
    {
        $routes = [
            // PAGES
            '' => __DIR__ . '/../views/index.php',
            'login' => __DIR__ . '/../views/login.php',
            'projeto' => __DIR__ . '/../views/projeto.php',
            'cadastro' => __DIR__ . '/../views/cadastro.php',
            'profile' => __DIR__ . '/../views/profile.php',
            'admin' => __DIR__ . '/../views/admin/adm.php',
            'ranking' => __DIR__ . '/../views/ranking.php',
            'admin/phases' => __DIR__ . '/../views/admin/admin-phases.php',
            'admin/users' => __DIR__ . '/../views/admin/admin-users.php',

        ];

        if ($uri === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require __DIR__ . '/../api/Login.php';
            return;
        }

        if ($uri === 'cadastro' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require __DIR__ . '/../api/Cadastro.php';
            return;
        }

        if ($uri === 'logout') {
            require_once __DIR__ . '/../api/Logout.php';
            Logout::logout();
            return;
        }

        if (isset($routes[$uri])) {
            require $routes[$uri];
            return;
        }

        require __DIR__ . '/../views/404.php';
    }
}