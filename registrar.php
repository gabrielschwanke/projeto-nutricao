<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'conexao.php';

$nome     = $_POST['nome'] ?? '';
$email    = $_POST['email'] ?? '';
$senha    = $_POST['senha'] ?? '';
$telefone = $_POST['telefone'] ?? ''; // NUNCA null

// Validação básica
if (empty($nome) || empty($email) || empty($senha)) {
    die("❌ Preencha todos os campos obrigatórios.");
}

// Criptografar senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Preparar SQL
$stmt = $conn->prepare(
    "INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?, ?, ?, ?)"
);

if (!$stmt) {
    die("❌ Erro no prepare: " . $conn->error);
}

// Bind
$stmt->bind_param("ssss", $nome, $email, $senhaHash, $telefone);

// Executar
if ($stmt->execute()) {

    session_start();

    $_SESSION['usuario'] = [
        'id'    => $conn->insert_id,
        'nome'  => $nome,
        'email' => $email
    ];

    header("Location: formulario.php");
    exit;

} else {
    die("❌ Erro ao cadastrar: " . $stmt->error);
}
