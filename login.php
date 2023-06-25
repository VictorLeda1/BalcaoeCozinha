<?php

include('./includes/conexao.php');
include('./includes/head.php');

?>

<body>
  <div class="login-container">
    <div class="login-box">
      <h1>Login</h1>
      <form action="" method="POST">
        <div class="form-group">
          <label for="username">Usuário</label>
          <input type="text" name="usuario" placeholder="Digite seu usuário">
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" name="senha" placeholder="Digite sua senha">
        </div>
        <button type="submit">Login</button>
      </form>
      <br>
      <?php
      if (isset($_POST['usuario']) || isset($_POST['senha'])) {
        if (strlen($_POST['usuario']) == 0) {
          echo 'Usuário não preenchido';
        } elseif (strlen($_POST['senha']) == 0) {
          echo 'Senha não preenchida';
        } else {

          /*    */
          $usuario = $mysqli->real_escape_string($_POST['usuario']);
          $senha = $mysqli->real_escape_string($_POST['senha']);

          /*    */

          if ($sql_code = "SELECT * FROM login WHERE username = '$usuario'") {

            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
            $quantidade = $sql_query->num_rows;

            /*    */
            if ($quantidade == 1) {
              $conta = $sql_query->fetch_assoc();
              if (password_verify($senha, $conta['senha'])) {
                if (!isset($_SESSION)) {
                  session_start();
                }
                $_SESSION['id'] = $conta['id'];
                $_SESSION['usuario'] = $conta['username'];

                if ($_SESSION['id'] == 1) {
                  header('Location: cozinha.php');
                } else {
                  header('Location: cadastroPedido.php');
                }
              } else {
                echo "Falha ao logar! Senha incorreta";
              }
            } else {
              echo "Falha ao logar! Usuario ou Senha incorreta";
            }
          }
        }
      }
      ?>
    </div>
  </div>
</body>

</html>

</html>