
document.addEventListener('DOMContentLoaded', function() {
    const botao = document.getElementById('editar_func');
    
    botao.addEventListener('click', function() {
        // O usuário não conseguirá voltar para a página anterior pelo histórico
        window.location.replace('editar_func.html'); 
    });
});