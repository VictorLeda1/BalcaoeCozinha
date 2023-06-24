<?php

include('./includes/protect.php');
include('./includes/conexao.php');
/*    */
if ((isset($_POST['nome'])) || (isset($_POST['telefone'])) || (isset($_POST['pedido']))) {

  /*    */
  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $pedido = $_POST['pedido'];
  $valor = $_POST['valor'];
  $forma_pagamento = $_POST['forma_pagamento'];
  $pago = $_POST['pago'];
  $data = date('Y-m-d');
  $statusIncial = "Analise";

  /*    */
  $dadosPedidos = "INSERT INTO pedidos (nome, telefone, pedido, valor, forma_pagamento, pago, data, status) VALUE ('$nome', '$telefone', '$pedido', '$valor', '$forma_pagamento', '$pago', '$data', '$statusIncial')";
  $inserindoDadosPedidos = mysqli_query($mysqli, $dadosPedidos);
}

include('./includes/head.php');
?>

<body>
  <div class="main-container">
    <div class="sidebar">
      <h2>Balcão</h2>
      <?php include('./includes/navBalcao.php'); ?>
    </div>

    <div class="content">
      <form action="" method="POST">

        <h2>Cadastro de pedido</h2>

        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" required>
        </div>

        <div class="form-group">
          <label for="telefone">Telefone:</label>
          <input type="number" id="telefone" name="telefone" required>
        </div>

        <div class="form-group">
          <label for="pedido">Pedido:</label>
          <textarea style="resize: none" id="pedido" name="pedido" required></textarea>
        </div>

        <div class="form-group">
          <label for="valor">Valor:</label>
          <input type="number" id="valor" name="valor" required>
        </div>

        <div class="form-group">
          <label for="forma_pagamento">Forma de Pagamento:</label>
          <select id="forma_pagamento" name="forma_pagamento" required>
            <option value="" disabled selected>Selecione uma opção</option>
            <option value="credito">Crédito</option>
            <option value="debito">Débito</option>
            <option value="pix">Pix</option>
            <option value="dinheiro">Dinheiro</option>
          </select>
        </div>

        <div class="form-group">
          <label for="pago">Pago:</label>
          <select id="pago" name="pago" required>
            <option value="" disabled selected>Selecione uma opção</option>
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
          </select>
        </div>

        <button type="submit" value="enviar">Enviar</button>

        <?php
        /*    */
        if (mysqli_affected_rows($mysqli) > 0) {
          echo '<h2>Pedido Cadastrado</h2>';
        }
        ?>
      </form>
    </div>
  </div>
</body>

</html>