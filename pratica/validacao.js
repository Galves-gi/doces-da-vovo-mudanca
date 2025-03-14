function validarFormulario(Event){
    var nome = document.getElementById('nome').value.trim();
    var email = document.getElementById('email').value.trim();
    var mensagem = document.getElementById('mensagem').value.trim();

    const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if(nome == ""){
        alert("Por gentileza, insira um nome.");
        Event.preventDafault();
        return falsa;
    }else if(/\d/.test(nome)){
        alert("Não pode colocar números no campo nome.");
        Event.preventDafault();
        return falsa;
    }else if(/\w/.test(nome)){
        alert("Não pode caracteres especiais.");
        Event.preventDafault();
        return falsa;
    }

    if(mensagem == ""){
        alert("Por gentileza, insira um nome.");
        Event.preventDafault();
        return falsa;
    }

return true;
}