<?php 
require 'verifica_login.php';
$pageTitle = "Contato";
$bodyClass = "contato-page";
include 'header.php'; 
?>

<main class="contato-section">
  <div class="container-contato">
    <h1>Fale Conosco</h1>
    <p class="subtitulo">Envie sua mensagem e entraremos em contato o quanto antes.</p>

    <form class="form-contato" action="enviar_contato.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome completo</label>
        <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
      </div>

      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="seuemail@exemplo.com" required>
      </div>

      <div class="form-group">
        <label for="mensagem">Mensagem</label>
        <textarea id="mensagem" name="mensagem" rows="5" placeholder="Digite sua mensagem aqui..." required></textarea>
      </div>

      <button type="button" class="btn-teste">Enviar mensagem</button>
    </form>
  </div>
</main>

<?php include 'footer.php'; ?> 