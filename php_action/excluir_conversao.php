<?php 

// Inicia a sessão para permitir o uso de mensagens via $_SESSION
session_start();

// Inclui a conexão com o banco de dados
require_once 'conexao_bd.php';

// Verifica se o botão de excluir foi clicado no formulário
if (isset($_POST['btn-excluir'])) {
    
    // Recebe o ID da conversão a ser excluída e protege contra SQL Injection
    $id = mysqli_escape_string($connection, $_POST['id']);

    // Monta o comando SQL para excluir o registro da tabela tbConversoes
    $sql = "DELETE FROM tbConversoes WHERE id = '$id'";

    // Executa a query e verifica se deu certo
    if(mysqli_query($connection, $sql)) {
        // Se sucesso, cria uma mensagem de confirmação
        $_SESSION['mensagem'] = "Conversão excluída com sucesso.";

        // Redireciona de volta para a página principal (histórico)
        header('Location: ../index.php');
    } else {
        // Se ocorrer algum erro, cria mensagem de erro
        $_SESSION['mensagem'] = "Erro ao excluir a conversão.";

        // Redireciona de volta para a página principal
        header('Location: ../index.php');  
    }
}
?>
