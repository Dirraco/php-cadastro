const mode = document.getElementById('mode_icon');

mode.addEventListener('click', () => {
    const form =document.getElementById('login_form');
    if(mode.classList.contains('fa-moon')) {
        mode.classList.remove('fa-moon');
        mode.classList.add('fa-sun');

        form.classList.add('dark');
        return;
    }
    mode.classList.add('fa-moon');
    mode.classList.remove('fa-sun');
    form.classList.remove('dark');
});

// Lógica para senha no "index 2"
const botao = document.getElementById("enviar_formulario");

function verificarSenhas(event) {
  // Obtém os valores das senhas
  const senha1 = document.getElementById("password").value;
  const senha2 = document.getElementById("confirmPassword").value;

  // Se as senhas forem diferentes, exibe um alerta e impede o envio do formulário
  if (senha1 !== senha2) {
    alert("As senhas são diferentes!");
    event.preventDefault(); // Impede o envio do formulário
  }
  // Se as senhas forem iguais, o formulário será enviado normalmente
}

// Adiciona um ouvinte de evento para o botão
botao.addEventListener("click", verificarSenhas);
  