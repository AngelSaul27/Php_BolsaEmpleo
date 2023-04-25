<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="<?php echo constant('URL'); ?>public/img/App/Logo_small.png" />
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/components/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pages/oferta.css">
    <?php include __DIR__ . ('../../layouts/styles.php') ?>
    <title>CV</title>
</head>

<body>

    <?php include __DIR__ . ('../../layouts/header.php'); ?>

    <?php $profile = $this->aspirantes[0]; ?>
    <style>
        .Fotografia_vw_asp_div {
            background-color: white;
            border-radius: 100%;
            width: 200px;
            height: 200px;
            box-shadow: var(--shadow-blue-700);
            margin: 10px 0px;
            display: block;
            margin: auto
        }

        .Fotografia_vw_asp_div img {
            padding: 8px;
            width: 100%;
            height: 100%;
            border-radius: 100%;
        }

        .Nombre_vw_asp {
            display: flex;
            flex-direction: column;
            display: block;
            margin: auto;
            width: 50%;
            text-align: center;
        }

        .Datos_personales_vw {
            color: cadetblue;
        }

        .Datos_personales_vw h1 {
            font-weight: 400;
        }
    </style>

    <main class="container_oferta">

        <div class="Fotografia_vw_asp">
            <div class="Fotografia_vw_asp_div">
                <?php
                $Validador = false;
                #PROCESADO DE LOGO TEMPORAL
                $Valor = $profile['Fotografia'];
                $check = substr($Valor, 0, 5);
                if ($check == 'https') {
                    $Validador = true;
                }
                ?>

                <img style="border-radius: 100%" src="<?php echo !$Validador ? constant('URL') . 'public/img/Storage/Avatars/' . $profile['Fotografia'] : $profile['Fotografia']; ?>" alt="burgerking logo">
            </div>
        </div>
        <div class="Nombre_vw_asp">
            <p style="margin: 20px"><?php echo $profile['Nombre'] . ' ' . $profile['ApellidoPaterno'] . ' ' . $profile['ApellidoMaterno']; ?></p>
            <div class="flex gap-10" style="justify-content: center">
                <?php if ($profile['Status'] == 'Sin verificar') : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="#837337">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    <small>Su cuenta no esta verificada</small>
                <?php endif; ?>

                <?php if ($profile['Status'] == 'En revision') : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="#375883">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <small>Su cuenta esta en revisión</small>
                <?php endif; ?>

                <?php if ($profile['Status'] == 'No aceptado') : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="#833737">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <small>Su cuenta fue denegada y se eliminara</small>
                <?php endif; ?>

                <?php if ($profile['Status'] == 'Verificado') : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="#378371">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>
                    <small>Su cuenta esta verificada</small>
                <?php endif; ?>
            </div>
            <hr>
        </div>

        <div class="Datos_personales_vw flex-col gap-10">
            <h1 style="text-align: center">Datos Personales</h1>
            <div class="input-group">
                <div>
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <span><?php echo $profile['FechaNacimiento'] ?></span>
                </div>
                <div>
                    <label for="genero">Genero</label>
                    <span><?php echo $profile['Genero'] === "Masculino" ? "Masculino" : ''; ?></span>
                    <span><?php echo $profile['Genero'] === "Femenino" ? "Femenino" : ''; ?></span>
                    <span><?php echo $profile['Genero'] === "Otro" ? "Otro" : '--'; ?></span>
                </div>
                <div>
                    <label>Telefono</label>
                    <span><?php echo $profile['Telefono'] ?></span>
                </div>
                <div style="width: 50%;">
                    <label for="extension">Extension</label>
                    <span><?php echo $profile['Extension'] ?></span>
                </div>
            </div>
            <div class="input-group">
                <div>
                    <label for="Pais">Pais</label>
                    <span><?php echo $profile['Pais'] == '' ? 'Sin registro' : $profile['Pais']; ?></span>
                </div>
                <div>
                    <label for="Estado">Estado</label>
                    <span><?php echo $profile['Estado'] == '' ? 'Sin registro' : $profile['Estado']; ?></span>
                </div>
                <div>
                    <label for="municipio">Municipio</label>
                    <span><?php echo $profile['Municipio'] == '' ? 'Sin registro' : $profile['Municipio']; ?></span>
                </div>
                <div>
                    <label for="colonia">Colonia</label>
                    <span><?php echo $profile['Colonia'] == '' ? 'Sin registro' : $profile['Colonia']; ?></span>
                </div>
            </div>
            <div class="input-group">
                <div>
                    <label for="calle">Calles</label>
                    <span><?php echo $profile['Calle'] == '' ? 'Sin registro' : $profile['Calle']; ?></span>
                </div>
                <div>
                    <label for="referencias">Referencias</label>
                    <span><?php echo $profile['Referencias'] == '' ? 'Sin registro' : $profile['Referencias']; ?></span>
                </div>
                <div style="width: 30%;">
                    <label for="num_ext">Num. Ext.</label>
                    <span><?php echo $profile['NumExt'] == '' ? 'Sin registro' : $profile['NumExt']; ?></span>
                </div>
                <div style="width: 30%;">
                    <label for="num_int">Num. Int.</label>
                    <span><?php echo $profile['NumInt'] == '' ? 'Sin registro' : $profile['NumInt']; ?></span>
                </div>
            </div>
            <div>
            </div>
            <div>
                <label for="bio">Biografia</label>
                <span><?php echo $profile['Biografia'] == '' ? 'Sin registro' : $profile['Biografia']; ?></span>
            </div>
        </div>
        <hr>
        <div class="Datos_personales_vw flex-col gap-10">
            <h1>Datos Escolares</h1>
            <div class="input-group">
                <div>
                    <label for="nivel_academico">Nivel Academico</label>
                    <span><?php echo $profile['Nivel'] == '' ?  'Sin registro' : $profile['Nivel']; ?></span>
                </div>
                <div>
                    <label for="lugar_estudio">Ultimo Lugar de Estudio</label>
                    <span><?php echo $profile['Lugar'] == '' ?  'Sin registro' : $profile['Lugar']; ?></span>
                </div>
                <div>
                    <label for="Titulo">Titulo o Carrera</label>
                    <span><?php echo $profile['Carrera'] == '' ?  'Sin registro' : $profile['Carrera']; ?></span>
                </div>
            </div>
            <div class="input-group">
                <div>
                    <label for="fecha_ingreso">Fecha de Entrada</label>
                    <span><?php echo $profile['FechaIngreso'] == '' ?  'Sin registro' : $profile['FechaIngreso']; ?></span>
                </div>
                <div>
                    <label for="fecha_salida">Fecha de Salida</label>
                    <span><?php echo $profile['FechaSalida'] == '' ?  'Sin registro' : $profile['FechaSalida']; ?></span>
                </div>
            </div>
            <hr>
            <h1>Datos para la profesión</h1>
            <div class="input-group">
                <div>
                    <label for="puesto_interes">Puesto de Interes</label>
                    <?php echo $profile['Profesion'] == '' ?  'Sin registro' : $profile['Profesion']; ?>
                </div>
                <div>
                    <label for="Salario">Salario a esperar aprox.</label>
                    <?php echo $profile['SalarioAprox'] == '' ?  'Sin registro' : $profile['SalarioAprox']; ?>
                </div>
            </div>
            <div>
                <label for="informacion_personal">Información Profesional</label>
                <p><?php echo $profile['InformacionProfesional'] == '' ?  'Sin registro' : $profile['InformacionProfesional']; ?></p>
            </div>
        </div>
    </main>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>

    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
</body>

</html>