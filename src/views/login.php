
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Logic Gate</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
        <header id="container-header">
      <img src="/assets/img/logic-gate.png" alt="Logo do Logic Gate" id="logo" height="100em">

        <ul id="list-ul">
            <li><a href="/ranking" class="btn">Ranking</a></li>
            <li><a href="/" class="btn">Inicio</a></li>
            <li><a href="/projeto" class="btn">Projeto</a></li>
        </ul>
    </header>
        <main id="container-main">
            <div id="login-container">
            <form action="/login_validate" method="post" id="login-form">
            <h2>Login</h2>
            <div id="user-box">
              <label>Usuário:</label>
              <input type="text" id="username" placeholder="Usuário" class="input-user" name="username">
            </div>

            <div id="password-box">
              <label>Senha:</label>
              <input type="password" id="password" placeholder="Senha" class="input-user" name="password">
                </div>
                <div id="button-box">
            <input type="submit" value="Login" class="btn-login">
                </div>
                <div class="labels">
                    <span id="error-message"></span>
                    <label class="style-label">Não tem uma conta? <a href="/cadastro">Cadastre-se</a></label>
                   <label  class="style-label"><a href="#">Esqueci minha senha</a></label> 
                </div>
                </form>
            </div>
        </main>
</body>
</html>
