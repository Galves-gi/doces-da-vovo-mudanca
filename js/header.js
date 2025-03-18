function trocarMenu(){
    const menu = document.querySelector('.menu');
    menu.classList.toggle('active');

    const icon = document.getElementById('icon');

    if(icon.classList.contains('bi-list')){
        icon.classList.remove('bi-list');
        icon.classList.add('bi-x');
    }else{
        icon.classList.remove('bi-x');
        icon.classList.add('bi-list');
    }
}



