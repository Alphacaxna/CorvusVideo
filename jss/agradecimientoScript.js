const closeAgradecimientoModal = document.getElementById('closeAgradecimientoModal');
const agradecimientoModal = document.getElementById('agradecimientoModal');

closeAgradecimientoModal.addEventListener('click', function () {
    agradecimientoModal.style.display = 'none';
});


function showAgradecimientoModal() {
    agradecimientoModal.style.display = 'block';
}


registerForm.addEventListener('submit', function (event) {
    event.preventDefault();
    showAgradecimientoModal();
    closeRegisterModalFn();
    registerForm.reset();
});
