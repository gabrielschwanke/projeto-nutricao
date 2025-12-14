<?php 
$pageTitle = "Login";
$bodyClass = "login-page";
include 'header.php';
?>

<div class="login-container">
    <div class="login-box">
        <h2>Faça login com sua conta</h2>
        
        <form action="validar_login.php" method="post" id="loginForm">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required minlength="6">
            </div>

            <button type="submit" class="btn">Entrar</button>
        </form>

        <p class="signup-text">Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
    </div>
</div>

<script>
    // Validação extra de email
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        const email = document.getElementById("email").value.trim();
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(email)) {
            alert("Por favor, insira um e-mail válido!");
            event.preventDefault();
        }
    });
</script>

<?php include 'footer.php'; ?>