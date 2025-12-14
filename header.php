<?php 
if (session_status() === PHP_SESSION_NONE) { 
  session_start(); 
} 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title><?= $pageTitle ?? "Calculadora de Dieta" ?></title>
  <link rel="stylesheet" href="css/style.css">
  <script src="custom-select.js" defer></script>
  <link rel="icon" type="image/png" href="img/icone4.png">
</head>
<body class="<?= $bodyClass ?? '' ?>">

<header class="site-header">
  <div class="container">
    <!-- Logo -->
    <a href="formulario.php" class="logo">
      <img src="img/logo3.png" alt="Logo Calculadora de Dieta">
    </a>

    <!-- Botão hambúrguer (mobile) -->
    <button class="menu-toggle" aria-label="Abrir menu">&#9776;</button>

    <nav class="site-nav">
      <a href="formulario.php">Início</a>
      <a href="sobre.php">Quem Somos</a>
      <a href="planos.php">Planos</a>
      <a href="funcionalidades.php">Funcionalidades</a>
      <a href="contato.php">Contato</a>

      <?php if (isset($_SESSION['usuario'])): ?>
        <div class="perfil-menu">
          <button class="perfil-btn">
            <img src="img/perfil6.png" alt="Perfil" class="user-icon">
            <span><?= htmlspecialchars($_SESSION['usuario']['nome']) ?></span>
            <i class="seta">&#9662;</i>
          </button>
          <div class="perfil-dropdown">
            <a href="perfil.php">Meu Perfil</a>
            <hr>
            <a href="suporte.php">Suporte</a>
            <a href="desempenho.php">Desempenho</a>
            <a href="">Configurações</a>
            <a href="logout.php" class="sair">Sair</a>
          </div>
        </div>
      <?php else: ?>
        <a href="index.php">Login</a>
      <?php endif; ?>
    </nav>
  </div>
</header>

<main class="site-main">
  <div class="container">
