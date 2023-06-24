<?php
include('protect.php');
include('conexao.php');

if (isset($_GET['id'])) {
    $idPedido = $_GET['id'];

    $consultaIdSql = "SELECT * FROM pedidos WHERE id = $idPedido";
    $dadosId = mysqli_query($mysqli, $consultaIdSql);

    if ($dadosId->num_rows > 0) {
        $pedido = $dadosId->fetch_assoc();
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="../css/styles.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
            <title>Balcão e Cozinha</title>
        </head>

        <body>
            <div class="content">
                <form action="editar.php" method="POST">

                    <h2>Atualizar pedido</h2>

                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" value="<?php echo $pedido['nome']; ?>" id="nome" name="nome" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="number" value="<?php echo $pedido['telefone']; ?>" id="telefone" name="telefone" required>
                    </div>

                    <div class="form-group">
                        <label for="pedido">Pedido:</label>
                        <textarea style="resize: none" id="pedido" name="pedido" required><?php echo $pedido['pedido']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="number" value="<?php echo $pedido['valor']; ?>" id="valor" name="valor" required>
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
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $pedido['id']; ?>">

                        <button type="submit" value="enviar">Enviar</button>
                    </div>
                </form>
            </div>
        </body>

    <?php

    } else {
        echo 'Pedido não encontrado';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idConfirmado = $_POST['id'];
    $nomeAt = $_POST['nome'];
    $telefoneAt = $_POST['telefone'];
    $pedidoAt = $_POST['pedido'];
    $valorAt = $_POST['valor'];
    $forma_pagamentoAt = $_POST['forma_pagamento'];
    $pagoAt = $_POST['pago'];

    $editarSql = "UPDATE pedidos SET nome = '$nomeAt', telefone = '$telefoneAt', pedido = '$pedidoAt', valor = '$valorAt', forma_pagamento = '$forma_pagamentoAt', pago = '$pagoAt' WHERE id = $idConfirmado";

    ?>
<?php
    if ($mysqli->query($editarSql) === TRUE) {
        header('Location: ../pedidosPendentes.php?acao=editar');
    } else {
        echo "Erro ao editar o pedido: " . $conexao->error;
    }
}
?>