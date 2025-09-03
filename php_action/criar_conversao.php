<?php
session_start();
require_once 'conexao_bd.php';

// Ativar exibição de erros temporária (para debug)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['btn-cadastrar'])) {

    // Recebe o valor digitado pelo usuário (ex: "50.000,00")
    $valor_input = mysqli_escape_string($connection, $_POST['valor']);

    // Remove pontos de milhar e troca vírgula por ponto para cálculo
    $valor_input = str_replace('.', '', $valor_input);
    $valor_input = str_replace(',', '.', $valor_input);

    // Converte para float
    $valor = floatval($valor_input);

    // Recebe moedas
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

    // Verifica se as moedas existem no array de taxas
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

    // Inserir no banco
    $sql = "INSERT INTO tbConversoes (valor, moeda_origem, moeda_destino, resultado) 
            VALUES ('$valor_gravar', '$moeda_origem', '$moeda_destino', '$resultado_gravar')";

    if (mysqli_query($connection, $sql)) {
        // Formata os valores para exibição no padrão brasileiro
        $valor_formatado = number_format($valor, 2, ',', '.');
        $resultado_formatado = number_format($resultado, 2, ',', '.');

        $_SESSION['mensagem'] = "Conversão cadastrada com sucesso: $valor_formatado $moeda_origem → $resultado_formatado $moeda_destino";
        header('Location: ../index.php');
        exit;
    } else {
        // Mensagem detalhada de erro para debug
        $_SESSION['mensagem'] = "Erro ao cadastrar a conversão: " . mysqli_error($connection);
        header('Location: ../index.php');
        exit;
    }
}
?>
