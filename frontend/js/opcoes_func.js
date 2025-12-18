document.addEventListener('DOMContentLoaded', function () {

    const edicoes = document.getElementById('editar_func');
    const pesquisar = document.getElementById('get_func');
    const cadastro = document.getElementById('cadastro')

    if (edicoes) {
        edicoes.addEventListener('click', function () {
            window.location.replace('../pages/editar_func.html');
        });
    }

    if (pesquisar) {
        pesquisar.addEventListener('click', function () {
            window.location.replace('https://www.youtube.com/watch?v=WF7LLl7r4Os&list=RDOJ_oQCbg7_U&index=3'); 
        });
    }
    if (cadastro) {
        cadastro.addEventListener('click', function(){
            window.location.replace('https://www.youtube.com/watch?v=WF7LLl7r4Os&list=RDOJ_oQCbg7_U&index=3')
        });
    }

});
