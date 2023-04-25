<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="<?php echo constant('URL'); ?>public/img/App/Logo_small.png" />
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/components/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pages/admin.css">
    <script src="<?php echo constant('URL'); ?>public/js/chart.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <?php include __DIR__ . ('../../layouts/header.php'); ?>

    <main class="main">
        <div class="reporte_grafico flex gap-20">
            <div class="reporte_grafico_left">
                <h1>Estadisticas de Aspirantes</h1>
                <table class="table_default table_default_body">
                    <thead>
                        <tr>
                            <td style="opacity: 0;" colspan="1"></td>
                            <td style="color: white">
                                <h3 style="font-weight: 600;">Total</h3>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($this->chart)) : ?>
                            <?php $data = $this->chart[0] ?>
                            <tr>
                                <th><span>Total de Aspirantes</span></th>
                                <td><span><?php echo $data[0] ?></span></td>
                            </tr>
                            <?php $data = $this->chart[1] ?>
                            <tr>
                                <th><span>Total de Aspirantes sin Verificar</span></th>
                                <td><span><?php echo $data[0] ?></span></td>
                            </tr>
                            <?php $data = $this->chart[2] ?>
                            <tr>
                                <th><span>Total de Aspirantes en Verificación</span></th>
                                <td><span><?php echo $data[0] ?></span></td>
                            </tr>
                            <?php $data = $this->chart[3] ?>
                            <tr>
                                <th><span>Total de Aspirantes Verificados</span></th>
                                <td><span><?php echo $data[0] ?></span></td>
                            </tr>
                            <?php $data = $this->chart[4] ?>
                            <tr>
                                <th><span>Total de Solicitudes Creadas</span></th>
                                <td><span><?php echo $data[0] ?></span></td>
                            </tr>
                            <?php $data = $this->chart[5] ?>
                            <tr>
                                <th><span>Total de Aspirantes con Solicitudes Enviadas</span></th>
                                <td><span><?php echo $data[0] ?></span></td>
                            </tr>
                            <?php $data = $this->chart[6] ?>
                            <tr>
                                <th><span>Total de Aspirantes con Solicitudes Revisandose</span></th>
                                <td><span><?php echo $data[0] ?></span></td>
                            </tr>
                            <?php $data = $this->chart[7] ?>
                            <tr>
                                <th><span>Total de Aspirantes con Solicitudes Aceptadas</span></th>
                                <td><span><?php echo $data[0] ?></span></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="reporte_grafico_right">
                <h1>Grafica</h1>
                <div style="width: 100%; height: auto;">
                    <canvas id="Admon_Chart_Asp" style="margin: auto; display: block; width: 60%"></canvas>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>

    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/admon/chart_aspirantes.js"></script>

</body>

</html>