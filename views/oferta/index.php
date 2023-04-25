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
    <title>Ofertas</title>
</head>

<body>

    <?php include __DIR__ . ('../../layouts/header.php'); ?>
    <?php
    function tranformar_fecha($fecha)
    {
        //obtener la hora en formato unix
        $ahora = time();
        //obtener la diferencia de segundos
        $segundos = $ahora - $fecha;
        //dias es la division de n segs entre 86400 segundos que representa un dia;
        $dias = floor($segundos / 86400);
        //mod_hora es el sobrante, en horas, de la division de días;	
        $mod_hora = $segundos % 86400;
        //hora es la division entre el sobrante de horas y 3600 segundos que representa una hora;
        $horas = floor($mod_hora / 3600);
        //mod_minuto es el sobrante, en minutos, de la division de horas;	
        $mod_minuto = $mod_hora % 3600;
        //minuto es la division entre el sobrante y 60 segundos que representa un minuto;
        $minutos = floor($mod_minuto / 60);
        if ($horas <= 0) {
            echo $minutos . ' minutos';
        } elseif ($dias <= 0) {
            echo $horas . ' horas ' . $minutos . ' minutos';
        } else {
            echo $dias . ' dias ' . $horas . ' horas ' . $minutos . ' minutos';
        }
    }
    ?>

    <main class="container_oferta">

        <?php if (isset($_SESSION['role']) and $_SESSION['role'] === 'Administrador') : ?>
            <div class="listado_header hidden">
                <div class="listado_header_filtros flex gap-10">
                    <a href="" class="listado_header_filtros_imprimir flex gap-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                        </svg>
                        <span>Listado</span>
                    </a>
                    <div>
                        <select>
                            <option value="All">Todas las ofertas</option>
                            <option value="7">Ultimass 7 días</option>
                            <option value="30">Ultimass Mes</option>
                            <option value="360">Ultimass Año</option>
                            <option value="LIMIT 5">Ultimass 5</option>
                            <option value="LIMIT 10">Ultimass 10</option>
                            <option value="LIMIT 15">Ultimass 15</option>
                            <option value="LIMIT 20">Ultimass 20</option>
                            <option value="LIMIT 25">Ultimass 25</option>
                            <option value="LIMIT 30">Ultimass 30</option>
                        </select>
                    </div>
                    <div class="listado_header_filtros-search relative flex">
                        <input type="search" placeholder="Buscar">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon absolute">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        <button>Buscar</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (!empty($this->items)) : ?>
            <div class="oferta_main">
                <?php foreach ($this->items as $value) : ?>
                    <a href="<?php echo constant('URL') ?>oferta/view/<?php echo $value['id']; ?>" class="ofeta_main-item">
                        <div class="oferta_main-item-header">
                            <small><?php tranformar_fecha(strtotime($value['timestamp'])); ?></small>
                            <h3><?php echo $value['Titulo'] ?></h3>
                            <span>$<?php echo number_format($value['Salario']); ?> Salario</span>
                        </div>
                        <div class="oferta_main-item-body">
                            <p>
                                <?php echo strlen($value['Descripcion']) > 120 ? substr($value['Descripcion'], 0, 120) : $value['Descripcion']; ?>
                            </p>
                        </div>
                        <div class="oferta_main-item-footer">
                            <div class="flex-col">
                                <span>Ubicación</span>
                                <small><?php echo $value['Pais'] . ',' . $value['Estado'] . ',' . $value['Colonia'] ?></small>
                            </div>
                            <div class="flex-col">
                                <span>Puestos</span>
                                <small>10</small>
                            </div>
                            <div class="flex-col">
                                <span>Termina</span>
                                <small><?php echo date('d-m-Y', strtotime($value['Fecha_Termino'])) ?></small>
                            </div>
                            <?php
                            #PROCESADO DE LOGO TEMPORAL
                            $LOGO = $value['Fotografia'];
                            $CHECKING = substr($LOGO, 0, 5);
                            ?>
                            <?php if ($CHECKING == 'https') : ?>
                                <img src="<?php echo $value['Fotografia']; ?>" alt="Fotografia" width="40px">
                            <?php else : ?>
                                <img src="<?php echo constant('URL') ?>public/img/Storage/Ofertas/<?php echo $value['Fotografia'] ?>" width="35px" height="35px" alt="logo_oferta">
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="" style="text-align: center; margin-top:60px;">
                <h2 style="font-weight: 500; color:steelblue">Woops! Sin resultados</h2>
                <p style="color:dimgrey">¡No hay ofertas disponibles actualmente!</p>
            </div>
            <img src="<?php echo constant('URL') ?>public/img/App/not_result.png" style="margin: auto; display: block;" width="700px">
        <?php endif; ?>

    </main>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>
    
    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
</body>

</html>