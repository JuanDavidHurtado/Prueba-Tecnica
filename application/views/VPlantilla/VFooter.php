<!-- Elemento de imagen para el spinner -->
<div id="loading" style="display: none;">
    <div class="spinner-grow text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

</div>

<!-- Pie de pagina -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col text-end">
                <p class="mb-0">2024 © "PRUEBA TECNICA DESARROLLO DE SOFTWARE</p>
            </div>
        </div>
    </div>
</footer>

<script>
    // Función para mostrar una alerta en el contenedor especificado
    function showAlert(type, message, div) {

        const alertDiv = document.createElement('div');
        alertDiv.classList.add('alert', `alert-${type}`, 'alert-dismissible', 'fade', 'show');
        alertDiv.setAttribute('role', 'alert');
        alertDiv.innerHTML = `
<span>${message}</span>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
`;
        div.appendChild(alertDiv);
    }
</script>


<!-- JS de Bootstrap -->

<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>



</body>

</html>
