// Função para fechar a exibição dos dados
function fecharDados() {
    document.querySelector('.dados-enviados').style.display = 'none';
}

// Função para validar os campos do formulário
document.getElementById('formContato').onsubmit = function(event) {
    // Previne o envio do formulário
    event.preventDefault();

    // Limpar mensagens de erro anteriores
    document.getElementById('erro-msg').style.display = 'none';

    // Obtém os valores dos campos
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const mensagem = document.getElementById('mensagem').value;

    // Verifica se os campos estão vazios
    if (nome === '' || email === '' || mensagem === '') {
        document.getElementById('erro-msg').textContent = 'Todos os campos são obrigatórios!';
        document.getElementById('erro-msg').style.display = 'block';
        return false; // Impede o envio do formulário
    }

    // Caso a validação passe, envia o formulário
    this.submit(); // Envia o formulário para o PHP
};
