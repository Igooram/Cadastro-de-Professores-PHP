// Adiciona efeito de hover ao botão "Adicionar Professor"
document.addEventListener('DOMContentLoaded', function() {
    var btnAdicionarProfessor = document.getElementById('btn-adicionar-professor');
    
    btnAdicionarProfessor.addEventListener('mouseenter', function() {
        this.classList.add('btn-hover');
    });

    btnAdicionarProfessor.addEventListener('mouseleave', function() {
        this.classList.remove('btn-hover');
    });
});
