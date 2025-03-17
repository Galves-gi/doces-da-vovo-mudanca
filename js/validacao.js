function validaCampos(Event) {
    var nome = document.getElementById('nome').value.trim();
    var email = document.getElementById('email').value.trim();
    var mensagem = document.getElementById('mensagem').value.trim();
    const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (nome == "") {
        alert('Por gentileza, insera uma nome valido.');
        Event.preventDefault();
        return false;
    } else if (/\d/.test(nome)) {
        alert('Campo nome não pode conter números.')
        Event.preventDefault();
        return false;
    }
    else if (/\W/.test(nome)) {
        alert('Campo nome não pode conter caracteres especiais.')
        Event.preventDefault();
        return false;
    }

    if (email == "") {
        alert('Por gentileza, insera um e-mail valido.')
        Event.preventDefault();
        return false;
    } else if (!regexEmail.test(email)) {
        alert('Campo e-mail incorreto.')
        Event.preventDefault();
        return false;
    }

    if (mensagem == "") {
        alert('Por gentileza, insera uma mensagem.')
        Event.preventDefault();
        return false;
    }

    return true;

}

/* if (!nome || !email || !mensagem) {
    alert("Todos os campos devem ser preenchidos!");
    event.preventDefault();  // Impede o envio do formulário
    return false;
} */