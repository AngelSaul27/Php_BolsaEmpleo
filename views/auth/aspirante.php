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
    <title>Registro | Aspirante</title>
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
                    <li>
                        <a class="breadcrumb_box_home active" href="<?php echo constant('URL') ?>register">
                            <span>Registro</span>
                        </a>
                    </li>
                    <li class="breadcrumb_row">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                    <li class="breadcrumb_page">
                        <span>Aspirante</span>
                    </li>
                </ol>
            </div>
            <div class="MainLog_Form-head">
                <h1>Crea una cuenta</h1>
                <span>Por favor completa todos los campos.</span>
                <br><br>
                <?php if (isset($this->success)) : ?>
                    <div>
                        <?php
                        echo '<span  style="color: lightseagreen; width: max-content">' . $this->success . '</span>';
                        ?>
                    </div>
                <?php endif; ?>
                <div style="display: flex; flex-wrap: wrap; gap: 5px 15px;">
                    <?php
                    function randomColor()
                    {
                        $str = '#';
                        for ($i = 0; $i < 6; $i++) {
                            $randNum = rand(0, 12);
                            switch ($randNum) {
                                case 10:
                                    $randNum = 'A';
                                    break;
                                case 11:
                                    $randNum = 'B';
                                    break;
                                case 12:
                                    $randNum = 'C';
                                    break;
                                case 13:
                                    $randNum = 'D';
                                    break;
                                case 14:
                                    $randNum = 'E';
                                    break;
                                case 15:
                                    $randNum = 'F';
                                    break;
                            }
                            $str .= $randNum;
                        }
                        return $str;
                    }
                    foreach ($this->mensaje as $valor) {
                        echo '<span  style="color: ' . randomColor() . '; width: max-content">' . $valor . '</span>';
                    }
                    ?>
                </div>
            </div>
            <form action="<?php echo constant('URL') ?>register/aspirantes/authenticar" method="POST" enctype="multipart/form-data">
                <div class="MainRegistro">
                    <div id="Step1" data-step="true" aria-step="1">
                        <span class="MainRegistro_Steps">Paso 1 de 2</span>
                        <!-- INPUTS -->
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" placeholder="Nombre">
                        <!-- INPUTS -->
                        <div class="input-group">
                            <div class="flex-col">
                                <!-- INPUTS -->
                                <label for="email">Correo electronico</label>
                                <input type="email" name="email" placeholder="example@gmail.com">
                                <!-- INPUTS -->
                            </div>
                            <div class="flex-col">
                                <!-- INPUTS -->
                                <label for="confirmar_email">Comfirmar correo electronico</label>
                                <input type="email" name="confirmar_email" placeholder="example@gmail.com">
                                <!-- INPUTS -->
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="flex-col">
                                <!-- INPUTS -->
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" placeholder="**********">
                                <!-- INPUTS -->
                            </div>
                            <div class="flex-col">
                                <!-- INPUTS -->
                                <label for="confirmar_password">Comfirmar contraseña</label>
                                <input type="password" name="confirmar_password" placeholder="**********">
                                <!-- INPUTS -->
                            </div>
                        </div>
                        <div class="btn-green btn-green-shadow max-content btn-registro btn_next_step">Continuar
                        </div>
                    </div>
                    <div id="Step2" class="hidden" data-step="true" aria-step="2">
                        <span class="MainRegistro_Steps">Paso 2 de 2</span>
                        <div class="input-group">
                            <div>
                                <!-- INPUTS -->
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento">
                                <!-- INPUTS -->
                            </div>
                            <div>
                                <!-- INPUTS -->
                                <label for="telefono">Numero</label>
                                <input type="number" name="telefono">
                                <!-- INPUTS -->
                            </div>
                            <div>
                                <!-- INPUTS -->
                                <label for="ext_telefonica">Extension</label>
                                <input type="number" name="ext_telefonica">
                                <!-- INPUTS -->
                            </div>
                        </div>
                        <div class="MainRegistro_Steps-input_foto">
                            <label for="Fotografia_Input" class="flex-col">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                </svg>
                                <span><Small>CLIC PARA SUBIR UN ARCHIVO</Small></span>
                                <small>Solo: Jpg,Jpeg Max: 3mb</small>
                                <!-- INPUTS -->
                                <input type="file" name="fotografia" class="hidden" id="Fotografia_Input">
                                <!-- INPUTS -->
                            </label>
                        </div>
                        <p><small>Al crear tu cuenta aceptas los <a href="#">terminos</a> y <a href="#">condiciones</a>.</small></p>
                        <button type="submit" class="btn-green btn-green-shadow max-content btn-registro">Crear cuenta</button>
                    </div>
                </div>
            </form>
            <small id="Btn_redirect">¿Ya tienes una cuenta? <a href="<?php echo constant('URL') ?>login">Ingresa aquí</a></small>
        </div>
    </main>

    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>/public/js/auth.js"></script>
</body>

</html>