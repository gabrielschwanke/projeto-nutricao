<?php
session_start();
require 'conexao.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$stmt = $conn->prepare("SELECT id, nome, email, senha FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// 1. VERIFICA SE O USUÁRIO FOI ENCONTRADO
if ($result->num_rows === 1) { 
    $user = $result->fetch_assoc();

    // 2. VERIFICA SE A SENHA ESTÁ CORRETA
    if (password_verify($senha, $user['senha'])) { 
        // CRIAÇÃO PADRONIZADA da SESSÃO como um ARRAY
        $_SESSION['usuario'] = [
            'id' => $user['id'],
            'nome' => $user['nome'],
            'email' => $user['email']
        ];
        
        // Redirecionamento de sucesso
        header("Location: formulario.php");
        exit;

    } else { // 2. ELSE: SENHA INCORRETA
        echo "Senha incorreta.";
    }
} else { // 1. ELSE: USUÁRIO NÃO ENCONTRADO
    echo "Usuário não encontrado.";
}