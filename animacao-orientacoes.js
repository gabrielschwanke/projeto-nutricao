document.addEventListener("DOMContentLoaded", function () {
  const orientacoes = document.querySelector(".orientacoes");

  if (!orientacoes) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        orientacoes.classList.add("visivel");
        observer.disconnect(); // aparece uma vez e nunca mais some
      }
    });
  }, {
    threshold: 0.2
  });

  observer.observe(orientacoes);
});
