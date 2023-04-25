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
    <title>Ingresar</title>
</head>

<body>

    <main class="MainLog flex">
        <div class="MainLog_desing">
            <div class="MainLog_desing-header">
                <a href="<?php echo constant('URL') ?>">
                    <img class="MainLog_desing-logo" src="<?php echo constant('URL') ?>public/img/App/Logo_small.png" alt="Logotipo Astro Login">
                </a>
                <h1>Encuentra el mejor trabajo en <span style="font-weight: 500; color: rgb(255, 181, 121)">Astro</span></h1>
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
                        <span>Login</span>
                    </li>
                </ol>
            </div>
            <div class="MainLog_Form-head">
                <small>¿No tienes una cuenta? <span style="color: white;" 2>_</span><a href="<?php echo constant('URL') ?>register">Crea una aquí</a></small>
                <h1>Inicia Sessión</h1>
                <span>Por favor complete todos los campos.</span>
                <?php
                foreach ($this->mensaje as $valor) {
                    echo '<p style="color: tomato">' . $valor . '</p>';
                }
                ?>
            </div>

            <form action="<?php echo constant('URL') ?>login/authenticar" method="POST" class="MainLog_Form-Box">
                <label for="">Correo electronico</label>
                <div class="relative">
                    <input type="email" placeholder="exmaple@gmail.com" name="email">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute svg-icon icons_input">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </div>
                <label for="">Contraseña</label>
                <div class="relative">
                    <input type="password" placeholder="************" name="password">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute svg-icon icons_input">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                </div>
                <button type="submit" class="btn-green btn-green-shadow btn-IniciarSession">Iniciar Sessión</button>
            </form>
            <small>Olvidaste tu contraseña? <a href="#">Recuperala aquí</a></small>
        </div>
    </main>

    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
</body>

</html>