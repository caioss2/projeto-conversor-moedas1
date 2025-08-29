<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Conversor de Moedas</title> <!-- Título -->

    <!-- Importa o Google Icon Font para usar ícones do Materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Importa o CSS do Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Deixa o site responsivo em dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<!-- Navbar do projeto -->
<nav class="blue darken-2">
    <div class="nav-wrapper container">
        <!-- Logo / Nome do sistema -->
        <a href="index.php" class="brand-logo">Conversor de Moedas</a>
        
        <!-- Menu para dispositivos móveis -->
        <a href="#" data-target="mobile-demo" class="sidenav-trigger">
            <i class="material-icons">menu</i>
        </a>

        <!-- Menu principal -->
        <ul class="right hide-on-med-and-down">
            <li><a href="index.php">Histórico</a></li>
            <li><a href="cadastrar.php">Nova Conversão</a></li>
        </ul>
    </div>
</nav>

<!-- Menu lateral para mobile -->
<ul class="sidenav" id="mobile-demo">
    <li><a href="index.php">Histórico</a></li>
    <li><a href="cadastrar.php">Nova Conversão</a></li>
</ul>

<!-- Inicialização do sidenav do Materialize -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        M.Sidenav.init(elems);
    });
</script>
