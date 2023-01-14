const telefone = document.getElementById('telefone');

telefone.addEventListener('keypress', () => {
    if (telefone.value.length == 0) {
        telefone.value += '(';
    } else if (telefone.value.length == 3) {
        telefone.value += ') ';
    }
})