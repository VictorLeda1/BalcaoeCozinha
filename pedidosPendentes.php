<?php

include('./includes/protect.php');
include('./includes/conexao.php');

$data = date('Y-m-d');

$consultaSql = "SELECT * FROM pedidos WHERE data = '$data' AND status = 'Analise'";
$dados = mysqli_query($mysqli, $consultaSql);

include('./includes/head.php');

?>

<body>
  <div class="main-container">
    <div class="sidebar">
      <h2>Balcão</h2>
      <?php include('./includes/navBalcao.php'); ?>
    </div>

    <div class="content">
      <h1>Pedidos Pendentes</h1>
      <h3>Confira os Dados: </h3>
      <table>
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Telefone</th>
            <th>Pedido</th>
            <th>Valor</th>
            <th>Pago</th>
            <th>forma de Pagamento</th>
            <th>Passar Pedido</th>
            <th>Modificações</th>
          </tr>
        </thead>
        <tbody>

          <?php

          if ($dados->num_rows > 0) {
            while ($row = $dados->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['nome'] . "</td>";
              echo "<td>" . $row['telefone'] . "</td>";
              echo "<td>" . $row['pedido'] . "</td>";
              echo "<td>" . $row['valor'] . "</td>";
              echo "<td>" . $row['pago'] . "</td>";
              echo "<td>" . $row['forma_pagamento'] . "</td>";
              echo "<td>
            <a style='text-decoration:none; color: green;' href='./includes/passar.php?id=" . $row['id'] . "'>Passar</a>
            </td>";
              echo "<td>
            <a style='text-decoration:none; color: blue;' href='./includes/editar.php?id=" . $row['id'] . "'>Editar</a> |
            <a style='text-decoration:none; color: red;' href='./includes/deletar.php?id=" . $row['id'] . "'>Deletar</a>
            </td>";
              echo "</tr>";
            }
          } else {
            echo "<h2 style='color: red;'>Nenhum pedido encontrado.</h2>";
          }
          ?>

        </tbody>
      </table>
      <?php
      if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];

        if ($acao == "deletar") {
          echo "<h2>Pedido Deletado</h2>";
        } elseif ($acao == "editar") {
          echo "<h2>Pedido Editado</h2>";
        } elseif ($acao == "passar") {
          echo "<h2>Pedido enviado para Cozinha</h2>";
        } else {
          echo "<h2>Ação não identificada</h2>";
        }
      }
      ?>
    </div>
  </div>
</body>

</html>