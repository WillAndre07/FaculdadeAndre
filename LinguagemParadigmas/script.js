var btnAbrirFormulario = document.getElementById('btnAbrirFormulario');
var modal = document.getElementById('modal');
var fecharModal = document.getElementById('fecharModal');

btnAbrirFormulario.addEventListener('click', function() {
    modal.style.display = 'block';
});

fecharModal.addEventListener('click', function() {
    modal.style.display = 'none';
});

// Fecha a modal se clicar fora dela
window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
