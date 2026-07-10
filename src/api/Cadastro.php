<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';

    // Validação básica
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = '/cadastro';</script>";
        exit;
    }

    if ($password !== $confirmPassword) {
        echo "<script>alert('As senhas não coincidem.'); window.location.href = '/cadastro';</script>";
        exit;
    }

    // Aqui você pode adicionar a lógica para salvar o usuário no banco de dados
    // Por exemplo, usando PDO para inserir os dados em uma tabela de usuários
    $_SESSION['username'] = $username;
    // Redirecionar para a página de login ou outra página após o cadastro
    header("Location: /");
} else {
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
}
?>
