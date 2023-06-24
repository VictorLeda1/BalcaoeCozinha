<?php

include('./includes/protect.php');
include('./includes/conexao.php');

$data = date('Y-m-d');

$consultaSql = "SELECT * FROM pedidos WHERE data = '$data' AND status = 'Processo'";
$dados = mysqli_query($mysqli, $consultaSql);

include('./includes/head.php');

?>

<body>

  <div class="main-container">
    <div class="sidebar">
      <h2>Cozinha</h2>
      <?php include('./includes/navCozinha.php'); ?>
    </div>

    <div class="content">
      <h1>Pedidos Cozinha</h1>
      <table>
        <thead>
          <tr>
            <th>Pedido</th>
            <th>Status</th>
            <th>Passar Pedido</th>
          </tr>
        </thead>
        <tbody>

          <?php

          if ($dados->num_rows > 0) {
            while ($row = $dados->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['pedido'] . "</td>";
              echo "<td>" . $row['status'] . "</td>";
              echo "<td>
            <a style='text-decoration:none; color: green;' href='./includes/passar.php?id=" . $row['id'] . "'>Passar</a>
            </td>";
              echo "</tr>";
            }
          } else {
            echo "<h2>Nenhum pedido encontrado.</h2>";
          }

          ?>

        </tbody>
      </table>
      <?php
      if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];

        if ($acao = "passar") {
          echo "<h2>Pedido Concluido</h2>";
        }
      }
      ?>
    </div>
</body>

</html>