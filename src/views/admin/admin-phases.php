<?php
session_start();
$_SESSION['username'] = $_SESSION['username'] ?? 'Mercuriohg';

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
        <p>Aqui você pode gerenciar as fases do site.</p>
        <div id="admin-new-phase">
            
            <form action="/admin/phases" method="POST">
                <select name="logic-gate" class="form-control" required>
                    <option value="AND">AND</option>
                    <option value="OR">OR</option>
                    <option value="NOT">NOT</option>
                    <option value="NAND">NAND</option>
                    <option value="NOR">NOR</option>
                    <option value="XOR">XOR</option>
                </select>
                <select name="phase_difficulty" class="form-control" required>
                    <option value="F">Fácil</option>
                    <option value="M">Média</option>
                    <option value="D">Difícil</option>
                </select>
                <input type="text" name="phase_point" placeholder="Pontuação da Fase (0 - 100)" class="form-control" required max="100" min="0">
                <button type="submit" class="btn-admin"> + Adicionar Fase</button>
            </form>
        </div>
            <div class="admin-options">
                <div class="box-admin"><a href="/admin/users" class="btn-admin">Gerenciar Usuários</a></div>
                <div class="box-admin"><a href="/admin/content" class="btn-admin">Gerenciar Ranking</a></div>
                <div class="box-admin"><a href="/admin" class="btn-admin">Admin</a></div>
                <div class="box-admin"><a href="/admin/settings" class="btn-admin">Estatísticas</a></div>
            </div>
    </main>
</body>
</html>