        </div> <!-- fecha .container -->
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; 2025 Calculadora de Dieta — Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        // Script do menu responsivo
        document.querySelector(".menu-toggle").addEventListener("click", function() {
            document.querySelector(".site-nav").classList.toggle("active");
        });

        // --- Animação de aparecer ao rolar (para .orientacoes) ---
        const orientacoes = document.querySelectorAll('.orientacoes');

    if (orientacoes.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // quando aparece
                    entry.target.classList.add('visivel');
                } else {
                    // quando sai da tela
                    entry.target.classList.remove('visivel');
                }
            });
        }, {
            threshold: 0.2, // ativa quando 20% estiver visível
        });

        orientacoes.forEach(el => observer.observe(el));
    }
</script>
</body>
</html>


