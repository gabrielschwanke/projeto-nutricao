<?php 
require 'verifica_login.php';
$pageTitle = "Planos";
$bodyClass = "planos-page";
include 'header.php'; 
?>

<main class="planos-section">
  <div class="container-planos">  
    <!-- Card do plano -->
    <div class="plano-card">
      <h1>Invista na sua saúde</h1>
      <p class="subtitulo">Cuide do seu maior bem</p>
      <!-- Alternador de plano -->
      <div class="plano-toggle">
        <span>Mensal</span>
        <label class="switch">
          <input type="checkbox" id="togglePlano">
          <span class="slider"></span>
        </label>
        <span class="ativo">Anual <small>Economize 40%</small></span>
      </div>

      <h2><span class="parcelas">1x</span> <span class="preco">R$ 49,90</span></h2>
      <p class="tipo-plano">Plano mensal</p>

      <ul class="beneficios">
        <li> Interações ilimitadas</li>
        <li> Economize 3 horas por mês</li>
        <li> Use fotos, vídeos, textos e áudios</li>
        <li> Cadastro de receitas e alimentos favoritos</li>
        <li> Relatórios de evolução</li>
        <li> Integração com relógio</li>
        <li> Assistente de dieta AI</li>
        <li> Lembretes diários</li>
        <li> Renovação automática a cada ano</li>
        <li> Garantia de 7 dias</li>
        <li> Desconto e cashback em parceiros</li>
      </ul>

      <button type="button" class="assinatura">ASSINAR AGORA</button>
    </div>
  </div>
</main>

<script>
const toggle = document.getElementById('togglePlano');
const preco = document.querySelector('.preco');
const tipo = document.querySelector('.tipo-plano');
const parcelas = document.querySelector('.parcelas');

// Função para animar o valor numérico
function animarPreco(valorInicial, valorFinal, duracao) {
  const startTime = performance.now();
  const formatar = (valor) => valor.toFixed(2).replace('.', ',');

  function atualizar(tempo) {
    const progresso = Math.min((tempo - startTime) / duracao, 1);
    const valorAtual = valorInicial + (valorFinal - valorInicial) * progresso;
    preco.textContent = `R$ ${formatar(valorAtual)}`;
    if (progresso < 1) requestAnimationFrame(atualizar);
  }
  requestAnimationFrame(atualizar);
}

// Quando o usuário alternar o plano
toggle.addEventListener('change', () => {
  preco.style.opacity = 0;

  setTimeout(() => {
    if (toggle.checked) {
      // Modo anual
      animarPreco(49.90, 29.90, 600);
      tipo.textContent = 'Plano anual';
      parcelas.textContent = '12x';
    } else {
      // Modo mensal
      animarPreco(29.90, 49.90, 600);
      tipo.textContent = 'Plano mensal';
      parcelas.textContent = '1x';
    }
    preco.style.opacity = 1;
  }, 200);
});
</script>

<?php include 'footer.php'; ?>  
