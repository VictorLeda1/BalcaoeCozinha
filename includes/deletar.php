<?php

    include('conexao.php');
    
    if(isset($_GET['id'])){
        $idPedido = $_GET['id'];

        $consultaIdSql = "SELECT * FROM pedidos WHERE id = $idPedido";
        $dadosId = mysqli_query($mysqli, $consultaIdSql);

        if($dadosId->num_rows > 0){
            $pedido = $dadosId->fetch_assoc();

            $idConfirmado = $pedido['id'];
        
            $deleteSql = "DELETE FROM pedidos WHERE id = $idConfirmado";
    
            if ($mysqli->query($deleteSql) === TRUE) {
                header('Location: ../pedidosPendentes.php?acao=deletar');
            } else {
                echo "Erro ao excluir o pedido: " . $conexao->error;
            }

        }else{
            echo 'Pedido não encontrado';
        }
    }
