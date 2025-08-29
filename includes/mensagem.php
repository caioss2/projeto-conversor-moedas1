<?php 
// Inicia a sessão para acessar mensagens via $_SESSION
session_start();

// Verifica se existe uma mensagem para exibir
if(isset($_SESSION['mensagem'])) { 
    ?>
    <script>
        // Aguarda o carregamento da página
        window.onload = function() {
            // Exibe a mensagem usando Materialize Toast
            // html: conteúdo da mensagem
            M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});
        };
    </script>
<?php  
} 

// Limpa todas as variáveis de sessão para que a mensagem não se repita
session_unset();
?>
