<?php 
require 'verifica_login.php';
$pageTitle = "Resultado da Dieta";
$bodyClass = "processa-page";
include 'header.php'; 
?>

<div class="container">

    <?php if (!empty($alerta_imc)): ?>
        <div class="alerta-container">
            <?= $alerta_imc ?>
        </div>
    <?php endif; ?>

    <div class="result-header">
        <h1>Sugestões de Metas para sua dieta</h1>
        <p><strong>Objetivo:</strong> <?= ucfirst(htmlspecialchars($objetivo)) ?></p>
    </div>

    <div class="cards">
        <div class="card">
            <img src="css/icons/caloria.png" alt="Calorias">
            <h2><?= number_format($calorias, 0, ',', '.') ?> <small>kcal</small></h2>
            <p>Total de calorias por dia</p>
        </div>

        <div class="card">
            <img src="css/icons/proteina.png" alt="Proteína">
            <h2><?= number_format($proteina, 1, ',', '.') ?> <small>g</small></h2>
            <p>Proteína diária — <?= number_format($perc_proteina,1,',','.') ?>%</p>
        </div>

        <div class="card">
            <img src="css/icons/carbo.png" alt="Carboidratos">
            <h2><?= number_format($carboidrato, 1, ',', '.') ?> <small>g</small></h2>
            <p>Carboidratos diários — <?= number_format($perc_carbo,1,',','.') ?>%</p>
        </div>

        <div class="card">
            <img src="css/icons/gordura.png" alt="Gordura">
            <h2><?= number_format($gordura, 1, ',', '.') ?> <small>g</small></h2>
            <p>Gordura diária — <?= number_format($perc_gordura,1,',','.') ?>%</p>
        </div>

        <!-- Card Fibras -->
        <div class="card">
            <img src="css/icons/fibra.png" alt="Fibras">
            <h2><?= $fibras ?> g</h2>
            <p>Fibra alimentar diária</p>
        </div> 
        
        <!-- Card Água -->
        <div class="card">
            <img src="css/icons/agua.png" alt="Água" class="icon">
            <h2><?= number_format($agua, 0, ',', '.') ?> ml</h2>
            <p>Ingestão diária de água</p>
        </div>
    </div>

   <!-- Bloco de Orientações -->
<?php if (!empty($orientacao)): ?>
  <div class="orientacoes">
      <h2>Orientações</h2>
      <?= $orientacao ?> <!-- ⚠️ Removido o nl2br -->

      <?php if (!empty($dicas_alimentacao)): ?>
          <div class="dicas-alimentacao" style="margin-top: 20px;">
              <h3>Dicas de Alimentação Diária</h3>
              <?= $dicas_alimentacao ?> <!-- ⚠️ Também sem nl2br -->
          </div>
      <?php endif; ?>

      <?php if (!empty($dicas_macros)): ?>
          <div class="dicas-macros" style="margin-top: 20px;">
              <h3>Distribuição dos Macronutrientes</h3>
              <?= $dicas_macros ?> <!-- ⚠️ Sem nl2br -->
          </div>
      <?php endif; ?>
  </div>
<?php endif; ?>

<div class="actions" style="margin-top:24px;">
  <a href="formulario.php" class="btn btn-primary">Recalcular</a>
</div>

<script src="animacao-orientacoes.js"></script>

<?php include 'footer.php'; ?> 