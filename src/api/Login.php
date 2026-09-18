<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Aqui você pode adicionar a lógica para validar o login do usuário
    // Por exemplo, usando PDO para verificar as credenciais no banco de dados
    if ($username === 'mercuriohg' && $password === 'admin') {
        $_SESSION['user'] = $username;
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = true;
        header("Location: /admin"); // Redireciona para a página de administrador
        exit;
    } else {
        $_SESSION['login_error'] = 'Credenciais inválidas.';
        header("Location: /login");
        exit;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
}