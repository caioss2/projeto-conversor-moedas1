<?php
session_start();
require_once 'conexao_bd.php';

if (isset($_POST['btn-alterar'])) {

    // Recebe o valor digitado pelo usuário (ex: "1.000,00")
    $valor_input = mysqli_escape_string($connection, $_POST['valor']);

    // Remove pontos de milhar e troca vírgula por ponto
    $valor_input = str_replace('.', '', $valor_input);
    $valor_input = str_replace(',', '.', $valor_input);

    // Converte para float
    $valor = floatval($valor_input);

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

    // Verifica se as moedas existem
    if (!isset($taxas[$moeda_origem]) || !isset($taxas[$moeda_destino])) {
        $_SESSION['mensagem'] = "Erro: Moeda inválida.";
        header('Location: ../index.php');
        exit;
    }

    // Calcula resultado da conversão
    $resultado = ($valor * $taxas[$moeda_destino]) / $taxas[$moeda_origem];

    // Formata valores para gravar no banco (decimal padrão MySQL)
    $valor_gravar = number_format($valor, 2, '.', '');
    $resultado_gravar = number_format($resultado, 2, '.', '');

    // Atualiza no banco
    $sql = "UPDATE tbConversoes SET 
                valor='$valor_gravar', 
                moeda_origem='$moeda_origem', 
                moeda_destino='$moeda_destino', 
                resultado='$resultado_gravar' 
            WHERE id='$id'";

    if (mysqli_query($connection, $sql)) {
        $_SESSION['mensagem'] = "Conversão alterada com sucesso: " . number_format($valor, 2, ',', '.') . " $moeda_origem → " . number_format($resultado, 2, ',', '.') . " $moeda_destino";
        header('Location: ../index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao alterar a conversão: " . mysqli_error($connection);
        header('Location: ../index.php');
        exit;
    }
}
?>
