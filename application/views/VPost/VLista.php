<h1>Lista Post</h1>

<div id="alertContainer"></div>


<input type="text" id="searchInput" class="form-control mb-2" placeholder="Buscar">

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Opción</th>
            </tr>
        </thead>
        <tbody id="lista-posts">
            <!-- Aquí se cargarán los posts -->
        </tbody>
        <tfoot id="noResults" style="display: none;">
            <tr>
                <td colspan="3" class="text-center">No se encontraron datos en la búsqueda.</td>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    var url = "<?php echo base_url('index.php/CPost/traerPost'); ?>";
    var url_guardar = "<?php echo base_url('index.php/CPost/guardar'); ?>";
</script>
<script type="text/javascript" src="<?= base_url('assets/js/post.js') ?>"></script>



