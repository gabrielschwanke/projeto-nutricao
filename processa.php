<?php
session_start();

// Só aceitar POST (se navegar direto, volta pro formulário)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: formulario.php');
    exit;
}

// Recebe e normaliza inputs
$sexo      = $_POST['sexo'] ?? '';
$idade     = (int)($_POST['idade'] ?? 0);
$peso      = (float)($_POST['peso'] ?? 0);
$altura    = (float)($_POST['altura'] ?? 0); // aceita 1.75 ou 175
$atividade = (float)($_POST['atividade'] ?? 0); 
$objetivo  = $_POST['objetivo'] ?? 'manter';

// Validação básica
if (empty($sexo) || $idade <= 0 || $peso <= 0 || $altura <= 0 || $atividade <= 0) {
    $pageTitle = "Erro no formulário";
    $pageClass = "processa-page";
    include 'header.php';
    echo "<div class='container'>";
    echo "<h2>Erro: preencha todos os campos corretamente.</h2>";
    echo "<p><a href='formulario.php' class='btn btn-outline'>Voltar</a></p>";
    echo "</div>";
    include 'footer.php';
    exit;
}

// Converter altura para cm caso tenha sido digitada em metros
if ($altura < 3) {
    $altura = $altura * 100;
}

// ===== Cálculo de IMC =====
$altura_m = $altura / 100;
$imc = $peso / ($altura_m * $altura_m);

// ===== Faixas de peso ideal =====
$peso_minimo_ideal = 18.5 * ($altura_m * $altura_m);
$peso_maximo_ideal = 24.9 * ($altura_m * $altura_m);

// ===== Verificações de objetivo incoerente =====
$alerta_imc = "";

if ($imc < 18.5 && $objetivo === 'perder') {
    $alerta_imc = "
        <div class='alerta-imc alerta-perder'>
            ⚠️ Seu IMC é <strong>" . number_format($imc, 1, ',', '.') . "</strong>, indicando que você está abaixo do peso.
            <br><br>
            Não é recomendado buscar perda de peso neste momento. Mantenha hábitos saudáveis e, se necessário, procure um nutricionista.
        </div>
    ";
} elseif ($imc > 25 && $objetivo === 'ganhar') {
    $alerta_imc = "
        <div class='alerta-imc alerta-ganhar'>
            ⚠️ Seu IMC é <strong>" . number_format($imc, 1, ',', '.') . "</strong>, o que indica sobrepeso.
            <br><br>
            No entanto, se você for uma pessoa com bastante massa muscular, esse número pode não refletir excesso de gordura corporal.
            <br><br>
            💡 Dica: meça sua cintura e quadril para ter uma ideia melhor da composição corporal. Uma relação cintura/altura abaixo de 0,5 costuma indicar boa saúde.
            <br><br>
            Caso tenha dúvidas, consulte um nutricionista para avaliação individualizada.
        </div>
    ";
}

// ===== TMB (Mifflin-St Jeor) =====
if ($sexo === 'M') {
    $tmb = (10 * $peso) + (6.25 * $altura) - (5 * $idade) + 5;
} else {
    $tmb = (10 * $peso) + (6.25 * $altura) - (5 * $idade) - 161;
}

// ===== TDEE / GET =====
$tdee = $tmb * $atividade;

// ===== Ajuste por objetivo =====
if ($objetivo === 'perder') {
    $calorias = $tdee * 0.8;     // -20%
} elseif ($objetivo === 'ganhar') {
    $calorias = $tdee * 1.15;    // +15%
} else {
    $calorias = $tdee;
}

// ===== Macronutrientes =====
$proteina = $peso * 2;             
$cal_proteina = $proteina * 4;

$cal_gordura = $calorias * 0.25;  
$gordura = $cal_gordura / 9;

$cal_carbo = $calorias - ($cal_proteina + $cal_gordura);
$carboidrato = ($cal_carbo > 0) ? ($cal_carbo / 4) : 0;

// ===== Percentuais =====
$perc_proteina = ($cal_proteina / $calorias) * 100;
$perc_gordura  = ($cal_gordura / $calorias) * 100;
$perc_carbo    = ($cal_carbo > 0) ? (($cal_carbo / $calorias) * 100) : 0;

// ===== Água =====
$agua = $peso * 35; // ml

// ===== Fibras =====
$fibras = ($calorias / 1000) * 14;
$fibras = round($fibras, 1);

// ===== Ajustes de formatting =====
$calorias     = round($calorias);
$proteina     = round($proteina, 1);
$carboidrato  = round($carboidrato, 1);
$gordura      = round($gordura, 1);

$perc_proteina = round($perc_proteina, 1);
$perc_carbo    = round($perc_carbo, 1);
$perc_gordura  = round($perc_gordura, 1);

// ===== Mensagem de orientação =====
switch ($objetivo) {
    case "perder":
        $orientacao = "
    <div class='macros-section'>
      <h2>🥗 Como distribuir seus macronutrientes (para perda de peso)</h2>
      <p>Perder peso de forma saudável vai muito além de apenas 'comer menos'. O segredo está em <strong>equilibrar corretamente os macronutrientes</strong> — proteínas, carboidratos e gorduras — de acordo com seu objetivo, metabolismo e nível de atividade física.</p>
      <p>A seguir, veja como cada um deles contribui e como ajustar suas proporções para <strong>otimizar o emagrecimento sem perder massa magra.</strong></p>

      <h3>🍗 1. Proteínas (30–40%)</h3>
      <p>As proteínas são fundamentais para <strong>preservar e construir massa muscular</strong>, especialmente durante o déficit calórico. Elas aumentam a <strong>saciedade</strong> e possuem alto <strong>efeito térmico</strong>.</p>
      <p><strong>Boas fontes:</strong> Frango, peixe, ovos, carne magra, iogurte natural, queijos brancos, feijão, lentilha, grão-de-bico.</p>
      <p><em>💡 Dica:</em> Consuma proteína em todas as refeições principais.</p>

      <h3>🍚 2. Carboidratos (30–40%)</h3>
      <p>São a principal fonte de <strong>energia</strong> para o corpo e o cérebro. Prefira <strong>carboidratos complexos</strong>, que liberam energia lentamente e mantêm a saciedade.</p>
      <p><strong>Boas fontes:</strong> Arroz integral, batata-doce, aveia, quinoa, frutas e vegetais.</p>
      <p><em>💡 Dica:</em> Evite cortar totalmente os carboidratos, reduza apenas as porções.</p>

      <h3>🥑 3. Gorduras boas (20–30%)</h3>
      <p>Essenciais para hormônios e absorção de vitaminas. Prefira <strong>gorduras insaturadas</strong> e naturais.</p>
      <p><strong>Boas fontes:</strong> Azeite, abacate, castanhas, amêndoas, salmão, sementes de linhaça e chia.</p>
      <p><em>💡 Dica:</em> Use pequenas quantidades — 1 colher de azeite ou um punhado de castanhas já é o suficiente.</p>

      <h3>⚖️ Distribuição sugerida</h3>
      <ul>
        <li><strong>Proteínas:</strong> 35%</li>
        <li><strong>Carboidratos:</strong> 35%</li>
        <li><strong>Gorduras boas:</strong> 30%</li>
      </ul>

      <h3>🔥 Resumo prático</h3>
      <ul>
        <li>🍗 Priorize proteínas magras.</li>
        <li>🍚 Prefira carboidratos complexos.</li>
        <li>🥑 Inclua gorduras boas.</li>
        <li>💧 Beba bastante água e mantenha constância.</li>
      </ul>
    </div>
    ";
    break;
    case "manter":
        $orientacao = "⚖️ A manutenção calórica ocorre quando a ingestão de calorias é aproximadamente igual ao gasto energético diário...";
        break;
    case "ganhar":
    $orientacao = "
    <div class='macros-section'>
      <h2>💪 Como distribuir seus macronutrientes (para ganho de massa muscular)</h2>
      <p>Ganhar massa muscular de forma saudável exige <strong>superávit calórico controlado</strong> — ou seja, consumir mais calorias do que você gasta, mas sem exageros que levem ao acúmulo de gordura.</p>
      <p>O segredo é fornecer <strong>nutrientes de qualidade</strong> e energia suficiente para sustentar o crescimento muscular e a recuperação após os treinos.</p>

      <h3>🍗 1. Proteínas (25–35%)</h3>
      <p>As proteínas são os <strong>blocos construtores dos músculos</strong>. Elas devem estar presentes em todas as refeições para promover a síntese proteica e evitar a perda de massa magra.</p>
      <p><strong>Boas fontes:</strong> Frango, peixe, carne bovina magra, ovos, iogurte natural, queijo cottage, feijão, lentilha e grão-de-bico.</p>
      <p><em>💡 Dica:</em> Procure ingerir uma fonte de proteína de qualidade a cada 3–4 horas.</p>

      <h3>🍚 2. Carboidratos (45–55%)</h3>
      <p>São a principal <strong>fonte de energia</strong> para o treino e a recuperação muscular. Fornecem glicogênio, que é o combustível que mantém a intensidade e o desempenho durante os exercícios.</p>
      <p><strong>Boas fontes:</strong> Arroz integral, batata, macarrão integral, aveia, frutas, quinoa e mandioca.</p>
      <p><em>💡 Dica:</em> Inclua uma boa porção de carboidratos antes e após o treino para maximizar o ganho muscular.</p>

      <h3>🥑 3. Gorduras boas (20–25%)</h3>
      <p>Essenciais para o <strong>equilíbrio hormonal</strong> e para a absorção de vitaminas lipossolúveis (A, D, E e K). Também ajudam na saciedade e fornecem energia de longa duração.</p>
      <p><strong>Boas fontes:</strong> Azeite de oliva, abacate, castanhas, amêndoas, sementes e peixes gordos como salmão.</p>
      <p><em>💡 Dica:</em> Pequenas quantidades já são suficientes — adicione 1 colher de azeite às refeições ou um punhado de castanhas como lanche.</p>

      <h3>⚖️ Distribuição sugerida</h3>
      <ul>
        <li><strong>Proteínas:</strong> 30%</li>
        <li><strong>Carboidratos:</strong> 50%</li>
        <li><strong>Gorduras boas:</strong> 20%</li>
      </ul>

      <h3>🔥 Resumo prático</h3>
      <ul>
        <li>💪 Mantenha um leve superávit calórico (+10–15%).</li>
        <li>🍗 Consuma proteína em todas as refeições.</li>
        <li>🍚 Carboidratos ao redor do treino são fundamentais.</li>
        <li>🥑 Inclua gorduras boas para suporte hormonal.</li>
        <li>💧 Hidrate-se e descanse bem — o músculo cresce no repouso!</li>
      </ul>
    </div>
    ";
    break;
    default:
        $orientacao = "";
}

// ===== Dicas de macronutrientes =====
$dicas_macros = "";

$total_refeicoes = 4;
$proteina_por_refeicao = round($proteina / $total_refeicoes, 1);
$carbo_por_refeicao = round($carboidrato / $total_refeicoes, 1);
$gordura_por_refeicao = round($gordura / $total_refeicoes, 1);


$pageTitle = "Resultado da Dieta";
$bodyClass = "processa-page";

// ===== SALVAR PESO ATUAL NO HISTÓRICO (tabela desempenho) =====
require 'conexao.php'; // inclui conexão ao banco

if (isset($_SESSION['usuario']['id']) && $peso > 0) {
    $usuario_id = $_SESSION['usuario']['id'];

    // 1. Buscar o último peso registrado
    $stmt = $conn->prepare("
        SELECT peso 
        FROM desempenho 
        WHERE usuario_id = ? 
        ORDER BY data_registro DESC 
        LIMIT 1
    ");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $stmt->bind_result($ultimo_peso);
    $stmt->fetch();
    $stmt->close();

    // 2. Se o peso NÃO mudou, NÃO salvar novamente
    if (isset($ultimo_peso) && (float)$ultimo_peso === (float)$peso) {
        // não salva, peso repetido
    } else {

        // 3. Gravar peso novo
        $stmt = $conn->prepare("
            INSERT INTO desempenho (usuario_id, peso, data_registro)
            VALUES (?, ?, CURDATE())
        ");
        $stmt->bind_param("id", $usuario_id, $peso);
        $stmt->execute();
        $stmt->close();
    }
}

// ===== Mostra o resultado final =====
include 'resultado.php';
?>
