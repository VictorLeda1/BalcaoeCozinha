<?php

if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['id'])) { ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balcão e Cozinha</title>
    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #F2F2F2;
      }

      .container {
        width: 50%;
        height: 200px;
        margin: 0 auto;
        background-color: #FFFFFF;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        margin-top: 15px;
      }

      .container h2 {
        font-size: 24px;
        color: black;
        margin-bottom: 10px;
      }

      .container a {
        display: block;
        font-size: 20px;
        color: #4DA6FF;
        text-decoration: none;
        margin-top: 20px;
      }
    </style>
  </head>

  <body>

    <div class="container">
      <?php die("<h2>Você não pode acessar esta página porque não está logado.</h2><a href=\"login.php\">Entrar</a>"); ?>
    </div>

  </body>

  </html>

<?php
}
?>