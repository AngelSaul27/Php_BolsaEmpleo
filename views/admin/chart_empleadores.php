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
        <!-- TEMPORAL -->
        <div class="reporte_grafico flex gap-20">
            <div class="reporte_grafico_left">
                <h1>Estadisticas de Empresas</h1>
                <div style="max-height: 100vh; overflow-y: auto">
                    <table class="table_default">
                        <thead>
                            <tr>
                                <td>
                                    <span>Empresa</span>
                                </td>
                                <td style="text-align: center">
                                    <span>Total Ofertas</span>
                                </td>
                                <td style="text-align: center">
                                    <span>Total Solicitudes</span>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($this->chart)) : ?>
                                <?php foreach ($this->chart as $chart) : ?>
                                    <tr>
                                        <th><span><?php echo $chart['Nombre'] ?></span></th>
                                        <th><span><?php echo $chart['Total_Ofertas'] ?></span></th>
                                        <th><span><?php echo $chart['Total_Solicitudes'] ?></span></th>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="reporte_grafico_right">
                <h1>Grafica</h1>
                <div style="width: 100%; height: 100%;">
                    <canvas id="Admon_Chart_Empresas"></canvas>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>

    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/admon/chart_empleador.js"></script>
</body>

</html>