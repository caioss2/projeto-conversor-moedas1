<?php 

// Dados de conexão com o banco de dados
$server_name = 'localhost';  // Nome do servidor (geralmente localhost)
$user_name = 'techcia';       // Usuário do banco de dados
$password = 'C1y1z2345';        // Senha do banco de dados
$db_name = 'dbConversoes';     // Nome do banco de dados

// Cria a conexão com o banco usando mysqli
$connection = mysqli_connect($server_name, $user_name, $password, $db_name);

// Define o charset para UTF-8, evitando problemas com acentuação
mysqli_set_charset($connection, "utf8");

// Verifica se houve erro na conexão
if (mysqli_connect_error()) {
    // Exibe mensagem de erro caso a conexão falhe
    echo "Erro ao conectar com o banco de dados: " . mysqli_connect_error();
}
?>
