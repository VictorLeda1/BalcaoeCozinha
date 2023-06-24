<?php 

    include('conexao.php');
    if(isset($_GET['id'])){
        $idPedido = $_GET['id'];

        $consultaIdSql = "SELECT * FROM pedidos WHERE id = $idPedido";
        $dadosId = mysqli_query($mysqli, $consultaIdSql);

    if($dadosId->num_rows > 0){
        $pedido = $dadosId->fetch_assoc();
        $idConfirmado = $pedido['id'];

        $processo = "UPDATE pedidos SET status = 'Processo' WHERE id = $idConfirmado";
        $concluido = "UPDATE pedidos SET status = 'Concluido' WHERE id = $idConfirmado";
    
        if ($pedido['status'] === 'Analise') {
            $atualizaProcesso = mysqli_query($mysqli, $processo);
            header('Location: ../pedidosPendentes.php?acao=passar');
        } elseif ($pedido['status'] === 'Processo') {
            $atualizaConcluido = mysqli_query($mysqli, $concluido);
            header('Location: ../cozinha.php?acao=passar');
        }
    
    }else{
        echo "Pedido não encontrado";
    }
}
