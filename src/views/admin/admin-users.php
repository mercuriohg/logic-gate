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
    <?php include __DIR__ . '/../components/header.php'; ?>
    <main class="adm">
        <h2>Bem-vindo, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Aqui você pode gerenciar os usuários do site.</p>
        <div id="admin-new-phase">
            
        </div>
            <div class="admin-options">
                <div class="box-admin"><a href="/admin/phases" class="btn-admin">Fases</a></div>
                <div class="box-admin"><a href="/admin/content" class="btn-admin">Gerenciar Ranking</a></div>
                <div class="box-admin"><a href="/admin" class="btn-admin">Admin</a></div>
                <div class="box-admin"><a href="/admin/settings" class="btn-admin">Estatísticas</a></div>
            </div>
    </main>
</body>
</html>