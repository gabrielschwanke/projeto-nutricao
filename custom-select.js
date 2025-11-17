document.addEventListener("DOMContentLoaded", function () {
  // ======== CUSTOM SELECT ========
  const customSelects = document.querySelectorAll(".custom-select");

  customSelects.forEach((customSelect) => {
    const selected = customSelect.querySelector(".selected");
    const options = customSelect.querySelector(".options");
    const hiddenInput = customSelect.querySelector("input[type='hidden']");

    if (!selected || !options) return;

    // abre/fecha o menu
    selected.addEventListener("click", () => {
      options.style.display =
        options.style.display === "block" ? "none" : "block";
    });

    // seleciona uma opção
    options.querySelectorAll("div").forEach((option) => {
      option.addEventListener("click", () => {
        selected.textContent = option.textContent;
        if (hiddenInput) hiddenInput.value = option.dataset.value;
        options.style.display = "none";
      });
    });

    // fecha ao clicar fora
    document.addEventListener("click", (e) => {
      if (!customSelect.contains(e.target)) {
        options.style.display = "none";
      }
    });
  });

  // ===================================
  // ======== MENU DE PERFIL ========
  // ===================================

  const perfilBtn = document.querySelector(".perfil-btn");
  const perfilDropdown = document.querySelector(".perfil-dropdown");

  if (perfilBtn && perfilDropdown) {
    perfilBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      perfilDropdown.classList.toggle("open");
      perfilBtn.classList.toggle("active");
    });

    // Fecha ao clicar fora
    document.addEventListener("click", (e) => {
      if (!perfilBtn.contains(e.target) && !perfilDropdown.contains(e.target)) {
        perfilDropdown.classList.remove("open");
        perfilBtn.classList.remove("active");
      }
    });

    // Impede fechamento ao clicar dentro do menu
    perfilDropdown.addEventListener("click", (e) => e.stopPropagation());
  }
});
