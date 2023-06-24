<?php

include('./includes/protect.php');
include('./includes/conexao.php');

$data = date('Y-m-d');

$consultaSql = "SELECT * FROM pedidos WHERE data = '$data' AND status = 'Concluido'";
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
      <h1>Pedidos Concluidos</h1>
      <table>
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Telefone</th>
            <th>Pedido</th>
            <th>Pago | Forma de Pag.</th>
            <th>Status</th>
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
              echo "<td>" . $row['pago'] . " | " . $row['forma_pagamento'] . "</td>";
              echo "<td>" . $row['status'] . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<h2>Nenhum pedido encontrado.</h2>";
          }

          ?>

        </tbody>
      </table>
    </div>
  </div>
</body>

</html>