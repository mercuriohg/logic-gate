<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Logic Gate</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <?php include __DIR__ . '/components/header.php'; ?>    

  <main id="container-main">
    <div id="login-container">
      <form action="/cadastro_validate" method="post" id="login-form">
        <h2>Cadastro</h2>
        <div id="user-box">
          <label>Usuário:</label>
          <input type="text" id="username" placeholder="Usuário" class="input-user" name="username">
        </div>
        <div id="email-box">
          <label>Email:</label>
          <input type="email" id="email" placeholder="Email" class="input-user" name="email">
        </div>
        <div id="password-box">
          <label>Senha:</label>
          <input type="password" id="password" placeholder="Senha" class="input-user" name="password">
          <label>Confirmar Senha:</label>
          <input type="password" id="confirm-password" placeholder="Confirmar Senha" class="input-user"
            name="confirm-password">
        </div>
        <div id="button-box">
          <input type="submit" value="Cadastrar" class="btn-login">
        </div>
        <div class="labels">
          <span id="error-message"></span>
          <label class="style-label">Já tem uma conta? <a href="/login">Login</a></label>
          <!--<label name="forgot-password-link" class="style-label"><a href="#">Esqueci minha senha</a></label> -->
        </div>
      </form>
    </div>
  </main>
</body>

</html>