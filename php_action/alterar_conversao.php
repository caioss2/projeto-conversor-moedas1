<?php 

session_start();
require_once 'conexao_bd.php';

if (isset($_POST['btn-alterar'])) {
    
    $valor = mysqli_escape_string($connection, $_POST['valor']);
    $moeda_origem = mysqli_escape_string($connection, $_POST['moeda_origem']);
    $moeda_destino = mysqli_escape_string($connection, $_POST['moeda_destino']);
    $id = mysqli_escape_string($connection, $_POST['id']);

    // Taxas de câmbio fixas
    $taxas = [
        'BRL' => 1,
        'USD' => 5.30,
        'EUR' => 5.50,
        'CNY' => 0.77,
        'GBP' => 6.40,
        'RUB' => 0.06
    ];

    // Calcular resultado da conversão
    $resultado = ($valor * $taxas[$moeda_destino]) / $taxas[$moeda_origem];

    $sql = "UPDATE tbConversoes SET 
                valor='$valor', 
                moeda_origem='$moeda_origem', 
                moeda_destino='$moeda_destino', 
                resultado='$resultado' 
            WHERE id='$id'";

    if(mysqli_query($connection, $sql)) {
        $_SESSION['mensagem'] = "Conversão alterada com sucesso.";
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao alterar a conversão.";
        header('Location: ../index.php');  
    }
}
?>
