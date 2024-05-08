<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
        <div class="col-md-12">
            <div id="alertContainer"></div>
            <div class="d-flex justify-content-center">
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <h5 class="card-header text-center">Iniciar Sesión</h5>
                    <div class="card-body">
                        <form class="row g-2" id="iniciarUser">
                            <div class="form-floating mb-1">
                                <input autocomplete="off" type="text" class="form-control" id="login" placeholder="Usuario" name="login">
                                <label for="login">Usuario</label>
                            </div>
                            <div class="form-floating mb-1">
                                <input type="password" class="form-control" id="clave" placeholder="Contraseña" name="clave">
                                <label for="clave">Contraseña</label>
                            </div>
                            <div class="col-md-12">
                                <div class="d-grid gap-2 mb-3">
                                    <button class="btn btn-outline-primary" type="submit">Iniciar Sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var url = "<?php echo base_url('index.php/CLogin/login'); ?>";
</script>
<script type="text/javascript" src="<?= base_url('assets/js/login.js') ?>"></script>


