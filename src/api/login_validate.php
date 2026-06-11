<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Aqui você pode adicionar a lógica para validar o login do usuário
    // Por exemplo, usando PDO para verificar as credenciais no banco de dados
    if ($username === 'mercuriohg' && $password === 'admin') {
        $_SESSION['user'] = $username; // Armazena o nome do usuário na sessão
        header("Location: /admin"); // Redireciona para a página de administrador
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Credenciais inválidas.']);
    }
    $_SESSION['username'] = $username;
    // Redirecionar para a página principal ou outra página após o login
    header("Location: /");
} else {
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
}