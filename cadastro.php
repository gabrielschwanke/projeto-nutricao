<?php 
$pageTitle = "Cadastro";
$bodyClass = "cadastro-page";
include 'header.php';
?>

<div class="cadastro-container">
    <div class="cadastro-box">
        <h2>Crie sua conta</h2>
        
        <form action="registrar.php" method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" required minlength="6">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone (opcional)</label>
                <input type="tel" name="telefone">
            </div>

            <button type="submit" class="btn">Cadastrar</button>
        </form>

        <p class="cadastro-text">Já tem conta? <a href="login.php">Entrar</a></p>
    </div>
</div>

<?php include 'footer.php'; ?>
