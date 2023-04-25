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
    <script src="<?php echo constant('URL'); ?>public/js/chart.js"></script>
    <title>Estadisticas</title>
</head>

<body>

    <?php include __DIR__ . ('../../layouts/header.php'); ?>

    <!-- Main -->
    <main class="main" style="height: 100vh;">
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
                <li class="breadcrumb_page">
                    <a>
                        <span>Estadisticas</span>
                    </a>
                </li>
            </ol>
        </div>

        <?php if (isset($this->estadisticas) or !empty($this->estadisticas)) : ?>
            <div class="reporte_grafico flex gap-20">
                <div class="reporte_grafico_left">
                    <h1>Estadisticas de Ofertas</h1>
                    <table class="table_default">
                        <thead>
                            <tr>
                                <td style="text-align: center">
                                    <span>Ofertas</span>
                                </td>
                                <td style="text-align: center">
                                    <span>Solicitudes</span>
                                </td>
                                <td style="text-align: center">
                                    <span>Puestos Ofertados</span>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->estadisticas as $dato) { ?>
                                <tr>
                                    <th data-col="1">
                                        <span></span><?php echo $dato['Ofertas'] ?></span>
                                    </th>
                                    <th data-col="2">
                                        <span><?php echo $dato['Total_Solicitudes'] ?></span>
                                    </th>
                                    <th data-col="3">
                                        <span><?php echo $dato['Puestos_Ofertados'] ?></span>
                                    </th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="reporte_grafico_right">
                    <h1>Grafica de Ofertas</h1>
                    <div style="width: 100%; height: 100%;">
                        <canvas id="empleador_Chart_ofertas"></canvas>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="" style="text-align: center; margin-top:60px;">
                <h2 style="font-weight: 500; color:steelblue">Woops! Sin resultados</h2>
                <p style="color:dimgrey">¡Aun no cuenta datos suficientes para generar sus estadisticas!</p>
            </div>
            <img src="<?php echo constant('URL') ?>public/img/App/not_result.png" style="margin: auto; display: block;" width="500px">
        <?php endif; ?>

    </main>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>
    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/empleador/app.js"></script>
</body>

</html>