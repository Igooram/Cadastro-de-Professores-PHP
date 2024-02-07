// Adiciona efeito de hover ao botão "Adicionar Professor"
document.getElementById('btn-adicionar-professor').addEventListener('mouseenter', function() {
    this.classList.add('btn-hover');
});

document.getElementById('btn-adicionar-professor').addEventListener('mouseleave', function() {
    this.classList.remove('btn-hover');
});
