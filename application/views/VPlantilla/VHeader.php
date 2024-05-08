<?php
if (!$this->session->userdata('login')) {
    redirect(base_url());
}
?>

<nav class="navbar navbar-expand-lg" style="background-color: #03a9f3; padding: 10px;display: flex; justify-content: space-between;">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= site_url('CHome') ?>">
            DASHBOARD
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('CPost') ?>">Post</a>
                </li>
            </ul>
            <div class="navbar-nav d-flex mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        USUARIO <?= $this->session->userdata('nom_user'); ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="<?= site_url('CLogin/logout') ?>">Cerrar
                                sesión</a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>
<div class="mt-5"></div>

<div class="container">