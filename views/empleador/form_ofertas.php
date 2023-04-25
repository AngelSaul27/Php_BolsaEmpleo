<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="<?php echo constant('URL'); ?>public/img/App/Logo_small.png" />
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/components/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pages/empleador.css">
    <title>Crear oferta</title>
</head>

<body>

    <?php include __DIR__ . ('../../layouts/header.php'); ?>

    <?php if (!empty($this->success)) { ?>
        <div id="errorsSession" class="alert_box">
            <div class="aler_box_icon_success">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="alert_box_mensaje">
                <ul class="alert_box_mensaje_ul">
                    <li>
                        <?php echo $this->success ?>
                    </li>
                </ul>
            </div>
        </div>
    <?php } ?>

    <?php if (!empty($this->mensaje)) { ?>
        <div id="errorsSession" class="alert_box">
            <div class="aler_box_icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="alert_box_mensaje">
                <ul class="alert_box_mensaje_ul">
                    <?php
                    foreach ($this->mensaje as $valor) {
                        echo '<li>  ' . $valor .  '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php } ?>

    <main class="main">
        <div class="breadcrumb">
            <ol class="breadcrumb_box">
                <li>
                    <a class="breadcrumb_box_home active" href="<?php echo constant('URL') ?>empleador">
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
                <li class="breadcrumb_box_medium active">
                    <a href="<?php echo constant('URL') ?>empleador/publicaciones">
                        <span>Mis Publicaciones</span>
                    </a>
                </li>
                <li class="breadcrumb_row">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
                <li class="breadcrumb_page">
                    <span>Crear Oferta</span>
                </li>
            </ol>
        </div>

        <form action="<?php echo constant('URL') ?>empleador/oferta/crear" method="POST" enctype="multipart/form-data">
            <h1 class="titulo_form">CREAR OFERTA DE EMPLEO</h1>
            <div class="flex aling-center thumbnail">
                <div class="max-content">
                    <label for="Fotografia_Input" class="flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                        </svg>
                        <span><Small>CLIC PARA SUBIR UN ARCHIVO</Small></span>
                        <small>Solo: Jpg,Jpeg Max: 5mb</small>
                        <input type="file" name="fotografia" class="hidden" id="Fotografia_Input">
                    </label>
                </div>
            </div>
            <div class="form_container flex gap-20">
                <div class="form_container_información">
                    <div>
                        <label for="titulo">Titulo de la oferta</label>
                        <input type="text" name="titulo" placeholder="Titulo">
                    </div>
                    <div class="input-group">
                        <div>
                            <label for="fecha_inicio">Inicio de la Publicación</label>
                            <input type="date" name="fecha_inicio">
                        </div>
                        <div>
                            <label for="fecha_termino">Termino de la Publicación</label>
                            <input type="date" name="fecha_termino">
                        </div>
                    </div>
                    <div class="input-group">
                        <div>
                            <label for="oferta_catagoria">Categoria</label>
                            <select name="oferta_catagoria">
                                <option value="null" class="hidden">Seleccione la categoria</option>
                                <?php if (isset($this->catalogo_categoria)) : ?>
                                    <?php foreach ($this->catalogo_categoria as $categoria) { ?>
                                        <option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['Categoria'] ?></option>
                                    <?php } ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <label for="puestos_disponibles">Puestos Disponibles</label>
                            <input type="number" name="puestos_disponibles" placeholder="Puestos 1 - 100">
                        </div>
                    </div>
                    <div class="input-group">
                        <div>
                            <label for="salario">Salario</label>
                            <input type="number" name="salario" placeholder="Salario">
                        </div>
                        <div>
                            <label for="beneficios">Beneficios</label>
                            <input type="text" name="beneficios" placeholder="Beneficios (Agregue una coma para separarlos)">
                        </div>
                    </div>
                    <div>
                        <label for="informacion_extra">Información Extra</label>
                        <textarea name="informacion_extra" cols="30" rows="10" style="resize: none;" placeholder="Información de la oferta"></textarea>
                    </div>
                </div>

                <div class="fomr_container_address">
                    <div class="input-group">
                        <div>
                            <label for="pais">Pais</label>
                            <select name="pais" id="Pais_Select">
                                <option value="null" class="hidden">Seleccione su Pais</option>
                                <?php if (isset($this->catalogo_pais)) : ?>
                                    <?php foreach ($this->catalogo_pais as $pais) { ?>
                                        <option value="<?php echo $pais['id'] ?>"><?php echo $pais['Pais'] ?></option>
                                    <?php } ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <label for="estado">Estado</label>
                            <select name="estado" id="Estado_Select">
                                <option value="null" class="hidden">Seleccione su Estado</option>
                                <option value="null" disabled>Esperando...</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <div>
                            <label for="municipio">Municipio</label>
                            <select name="municipio" id="Municipio_Select">
                                <option value="null" class="hidden">Seleccione su Municipio</option>
                                <option value="null" disabled>Esperando...</option>
                            </select>
                        </div>
                        <div>
                            <label for="colonia">Colonia</label>
                            <select name="colonia" id="Colonia_Select">
                                <option value="null" class="hidden">Seleccione su Colonia</option>
                                <option value="null" disabled>Esperando...</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="calle">Calles</label>
                        <input type="text" name="calle" placeholder="Calle">
                    </div>
                    <div>
                        <label for="referencia">Referencias</label>
                        <input type="text" name="referencia" placeholder="Entre que calles">
                    </div>
                    <div class="input-group">
                        <div>
                            <label for="num_ext">Num. Ext.</label>
                            <input type="text" name="num_ext" placeholder="#">
                        </div>
                        <div>
                            <label for="num_int">Num. Int.</label>
                            <input type="text" name="num_int" placeholder="#">
                        </div>
                    </div>
                    <div class="input-group">
                        <button class="btn-green">Publicar</button>
                        <button class="btn-green hidden" style="background-color:cornflowerblue;">Guardar</button>
                        <button class="btn-red" type="reset">Limpiar</button>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>
    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/request.js"></script>
</body>

</html>