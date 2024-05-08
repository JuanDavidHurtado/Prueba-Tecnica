<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>

    <!-- Hojas de estilo de Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" />

    <!-- Hojas de estilo personalizadas -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />


    <style>
        .nav-link, .navbar-brand {
            color: white !important;
            text-decoration: none;
            padding: 5px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            text-transform: uppercase;
            /* Convierte el texto a mayúsculas */
        }

        footer {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 10px;
            background-color: rgba(248, 245, 245, 0.8);
            /* Fondo con opacidad */
        }

        .footer p {
            margin: 0;
            color: #03a9f3;
            /* Color del texto oscuro */
        }
    </style>

    <script type="text/javascript" src="<?php echo base_url("assets/jquery/jquery.min.js"); ?>"></script>


</head>

<body>