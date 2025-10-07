<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?? "Calculadora de Dieta" ?></title>
    <link rel="stylesheet" href="/projetonutricao/css/style.css">
    <script src="custom-select.js" defer></script>

    <link rel="icon" type="img/png" href="img/icone4.png">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <!-- Logo com link para home -->
        <a href="formulario.php" class="logo">
            <img src="img/logo3.png" alt="Logo Calculadora de Dieta">
        </a>

            <!-- Botão hambúrguer (só aparece no mobile) -->
            <button class="menu-toggle" aria-label="Abrir menu">&#9776;</button>

            <nav class="site-nav">
                <a href="formulario.php">Início</a>
                <a href="/">Quem Somos</a>
                <a href="/">Planos</a>
                <a href="/">Funcionalidades</a>
                <a href="/">Contato</a>
                <a href="login.php">Login</a>
                <button type="submit" class="assinatura">ASSINAR AGORA</button>
            </nav>
        </div>
    </header>
    <main class="site-main">
        <div class="container">
