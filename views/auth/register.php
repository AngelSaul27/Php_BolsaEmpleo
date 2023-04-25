<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="<?php echo constant('URL') ?>public/img/App/Logo_small.png" />
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/pages/auth.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/components/app.css">
    <title>Registro</title>
</head>

<body>

    <main class="MainLog flex">
        <div class="MainLog_desing">
            <div class="MainLog_desing-header">
                <a href="<?php echo constant('URL') ?>">
                    <img class="MainLog_desing-logo" src="<?php echo constant('URL') ?>public/img/App/Logo_small.png" alt="Logotipo Astro Login">
                </a>
                <h1>Encuentra el mejor trabajo en <span style="font-weight: 500; color: rgb(255, 181, 121)">Astro</span>
                </h1>
            </div>
            <img class="MainLog_desing-ilustracion" src="<?php echo constant('URL') ?>public/svg/undraw_career_progress.svg" alt="" width="80%">
        </div>
        <div class="MainLog_form">
            <div class="breadcrumb">
                <ol class="breadcrumb_box">
                    <li>
                        <a class="breadcrumb_box_home active" href="<?php echo constant('URL') ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="breadcrumb_row">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                    <li class="breadcrumb_page">
                        <span>Registro</span>
                    </li>
                </ol>
            </div>
            <div class="MainLog_Form-head">
                <h1>Crea una cuenta</h1>
                <span>Por favor seleccione una cuenta.</span>
            </div>
            <div class="MainSelect flex">
                <div class="MainSelect-box flex-col">
                    <a href="<?php echo constant('URL') ?>register/empresas">
                        <img src="<?php echo constant('URL') ?>public/img/App/empleador_avatar.png" alt="" width="200px">
                    </a>
                    <a href="<?php echo constant('URL') ?>register/empresas">
                        Ofrezco Empleo
                    </a>
                </div>
                <div class="MainSelect-box flex-col">
                    <a href="<?php echo constant('URL') ?>register/aspirantes">
                        <img src="<?php echo constant('URL') ?>public/img/App/empleado_avatar.png" alt="" width="200px">
                    </a>
                    <a href="<?php echo constant('URL') ?>register/aspirantes">
                        Busco Empleo
                    </a>
                </div>
            </div>

            <small>¿Ya tienes una cuenta? <a href="<?php echo constant('URL') ?>login">Ingresa aquí</a></small>
        </div>
    </main>

    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
</body>

</html>