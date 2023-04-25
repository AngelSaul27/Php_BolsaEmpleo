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
        <div class="flex" style="justify-content: right;">
            <form action="<?php echo constant('URL') . 'administrador/chart_ofertas/pdf' ?>" method="POST" target="_blank">
                <input type="text" class="hidden" name="base64" id="base64">
                <input type="text" class="hidden" name="data1" id="data1">
                <input type="text" class="hidden" name="data2" id="data2">
                <input type="text" class="hidden" name="data3" id="data3">
                <button class="listado_header_filtros_imprimir flex gap-10" style="height: 40px;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                    </svg>
                    <span>Generar documento</span>
                </button>
            </form>
        </div>
        <div class="reporte_grafico flex gap-20">
            <div class="reporte_grafico_left">
                <h1>Estadisticas de Ofertas</h1>
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
                                <td style="text-align: center">
                                    <span>Registro</span>
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
                                        <th><span><?php echo $chart['Registro'] ?></th>
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
    <script src="<?php echo constant('URL') ?>public/js/admon/chart_ofertas.js"></script>
</body>

</html>