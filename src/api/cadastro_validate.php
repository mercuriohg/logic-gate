<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';

    // Validação básica
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);
        exit;
    }

    if ($password !== $confirmPassword) {
        echo json_encode(['success' => false, 'message' => 'As senhas não coincidem.']);
        exit;
    }

    // Aqui você pode adicionar a lógica para salvar o usuário no banco de dados
    // Por exemplo, usando PDO para inserir os dados em uma tabela de usuários

    // Exemplo de resposta de sucesso
    echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso!']);
    // Redirecionar para a página de login ou outra página após o cadastro
    header("Location: /index.php");
} else {
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
}
?>
