<?php
require 'conexao.php';

$nome     = $_POST['nome'] ?? '';
$email    = $_POST['email'] ?? '';
$senha    = $_POST['senha'] ?? '';
$telefone = $_POST['telefone'] ?? null;

// Segurança: criptografar senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Inserir no banco
$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $email, $senhaHash, $telefone);

if ($stmt->execute()) {
   session_start();
   $user_id = $conn->insert_id; // Pega o ID recém-criado

    // CRIAÇÃO PADRONIZADA da SESSÃO como um ARRAY
    $_SESSION['usuario'] = [
        'id' => $user_id,
        'nome' => $nome,
        'email' => $email // Opcional, mas útil
    ];
    
    header("Location: formulario.php");
    exit;
}
