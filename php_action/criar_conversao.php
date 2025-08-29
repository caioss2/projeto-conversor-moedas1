<?php 

session_start();
require_once 'conexao_bd.php';

if (isset($_POST['btn-cadastrar'])) {

    // Recebe o valor digitado pelo usuário
    $valor_input = mysqli_escape_string($connection, $_POST['valor']); // Ex: "50.000,00"

    // Remove pontos de milhar
    $valor_input = str_replace('.', '', $valor_input);

    // Troca vírgula decimal por ponto
    $valor_input = str_replace(',', '.', $valor_input);

    // Converte para float
    $valor = floatval($valor_input);

    $moeda_origem = mysqli_escape_string($connection, $_POST['moeda_origem']);
    $moeda_destino = mysqli_escape_string($connection, $_POST['moeda_destino']);

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

    // Formata valores para gravar no banco (decimal padrão MySQL)
    $valor_gravar = number_format($valor, 2, '.', '');
    $resultado_gravar = number_format($resultado, 2, '.', '');

    // Inserir no banco
    $sql = "INSERT INTO tbConversoes (valor, moeda_origem, moeda_destino, resultado) 
            VALUES ('$valor_gravar', '$moeda_origem', '$moeda_destino', '$resultado_gravar')";

    if(mysqli_query($connection, $sql)) {
        $_SESSION['mensagem'] = "Conversão cadastrada com sucesso.";
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar a conversão.";
        header('Location: ../index.php');  
    }
}
?>
