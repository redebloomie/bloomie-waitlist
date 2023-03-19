const radioBtns = document.querySelectorAll('input[name="radio-btn"]');
const manualBtns = document.querySelectorAll('.manual-btn');

// Adiciona um evento "change" em cada input de radio
radioBtns.forEach(function(radioBtn, index) {
  radioBtn.addEventListener('change', function() {
    if (radioBtn.checked) {
      // Remove a classe "checked" de todos os manual-btns
      manualBtns.forEach(function(manualBtn) {
        manualBtn.classList.remove('checked');
      });

      // Adiciona a classe "checked" ao manual-btn correto
      const manualBtn = document.querySelector(`label[for="radio${index+1}"]`);
      manualBtn.classList.add('checked');
    }
  });
});

// Efeito de digitação

const displayElement = document.getElementById('digitacao');
const text = 'Aqui, você planta o seu futuro.';
let i = 0;

const intervalId = setInterval(() => {
  displayElement.textContent = text.substring(0, i);
  i++;

  if (i > text.length) {
    clearInterval(intervalId);
  }
}, 100);