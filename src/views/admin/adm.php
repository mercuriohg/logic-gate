<?php
session_start();
$_SESSION['username'] = $_SESSION['username'] ?? 'Adm';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
        <header id="container-header">
      <img src="/assets/img/logic-gate.png" alt="Logo do Logic Gate" id="logo" height="100em">
        <ul id="list-ul">
            <li><a href="/ranking" class="btn">Ranking</a></li>
            <li><a href="/projeto" class="btn">Projeto</a></li>
            <li><a href="/login" class="btn">Entrar</a></li>
            <li><a href="/" class="btn">Inicio</a></li>

        </ul>
    </header>
    <main class="adm">
        <h2>Bem-vindo, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Aqui você pode gerenciar o conteúdo do site.</p>
        <div id="admin-options">
            <a href="/admin/users" class="btn">Gerenciar Usuários</a>
            <a href="/admin/content" class="btn">Gerenciar Conteúdo</a>
            <a href="/admin/settings" class="btn">Configurações</a>
        </div>
    </main>
</body>
</html>