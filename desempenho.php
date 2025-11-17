<?php
session_start();
require 'conexao.php';

// 🔒 Verifica login
if (!isset($_SESSION['usuario']['id'])) {
  header("Location: login.php");
  exit;
}

$id = $_SESSION['usuario']['id'];

// Busca dados de desempenho
$stmt = $conn->prepare("SELECT data_registro, peso FROM desempenho WHERE usuario_id = ? ORDER BY data_registro ASC");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$datas = [];
$pesos = [];

$ultimoPeso = null;

while ($row = $result->fetch_assoc()) {
    $pesoAtual = (float)$row['peso'];

    // Ignora duplicados consecutivos
    if ($pesoAtual === $ultimoPeso) {
        continue;
    }

    $datas[] = date('d/m', strtotime($row['data_registro']));
    $pesos[] = $pesoAtual;

    $ultimoPeso = $pesoAtual;
}


$stmt->close();
$conn->close();

$pageTitle = "Desempenho";
$bodyClass = "desempenho-page";

include 'header.php';
?>

<div class="container desempenho-container">
  <h1>Meu Desempenho</h1>
  <p class="desempenho-intro">Acompanhe sua evolução ao longo do tempo.</p>

  <?php if (!empty($datas)): ?>
    <div class="grafico-card">
      <canvas id="graficoDesempenho"></canvas>
    </div>
  <?php else: ?>
    <p>Você ainda não possui registros de desempenho. Preencha o formulário da calculadora para começar!</p>
  <?php endif; ?>

  <a href="formulario.php" class="btn-voltar">← Voltar para Calculadora</a>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php if (!empty($datas)): ?>
<script>
const ctx = document.getElementById('graficoDesempenho').getContext('2d');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?= json_encode($datas) ?>,
    datasets: [{
      label: 'Peso (kg)',
      data: <?= json_encode($pesos) ?>,
      borderColor: '#a8cb19',
      backgroundColor: 'rgba(168, 203, 25, 0.3)',
      tension: 0.4,
      fill: true,
      pointRadius: 5,
      pointBackgroundColor: '#a8cb19',
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { labels: { color: '#fff' } }
    },
    scales: {
      x: { ticks: { color: '#fff' }, grid: { color: 'rgba(255,255,255,0.2)' } },
      y: { ticks: { color: '#fff' }, grid: { color: 'rgba(255,255,255,0.2)' } }
    }
  }
});
</script>
<?php endif; ?>

<?php include 'footer.php'; ?>
