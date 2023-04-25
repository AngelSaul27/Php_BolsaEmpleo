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
            <form action="<?php echo constant('URL').'administrador/chart_solicitudes/pdf'?>" method="POST" target="_blank">
                <input type="text" class="hidden" name="base64" id="base64">
                <input type="text" class="hidden" name="tbody" id="tbody">
                <input type="text" class="hidden" name="thead" id="thead">
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
                <h1>Estadisticas de Solicitudes</h1>
                <table class="table_default table_default_body">
                    <thead>
                        <tr>
                            <td style="opacity: 0;" colspan="1"></td>
                            <td style="color: white">
                                <h3 style="font-weight: 600;">Total solicitudes</h3>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($this->chart)) : ?>
                            <?php $count = 0; ?>
                            <tr>
                                <th><span>Enero</span></th>
                                <td style="text-align: center">
                                    <span>
                                        <?php
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 1) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span>Febrero</span></th>
                                <td style="text-align: center">
                                    <span><?php
                                        $count = 0;
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 2) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span>Marzo</span></th>
                                <td style="text-align: center">
                                    <span>
                                        <?php
                                        $count = 0;
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 3) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span>Abril</span></th>
                                <td style="text-align: center">
                                    <span>
                                        <?php
                                        $count = 0;
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 4) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span>Mayo</span></th>
                                <td style="text-align: center">
                                    <span>
                                        <?php
                                        $count = 0;
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 5) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span>Junio</span></th>
                                <td style="text-align: center">
                                    <span>
                                        <?php
                                        $count = 0;
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 6) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span>Julio</span></th>
                                <td style="text-align: center">
                                    <span>
                                        <?php
                                        $count = 0;
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 7) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span>Agosto</span></th>
                                <td style="text-align: center">
                                    <span>
                                        <?php
                                        $count = 0;
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 8) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span>Septiembre</span></th>
                                <td style="text-align: center">
                                    <span>
                                        <?php
                                        $count = 0;
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 9) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span>Octubre</span></th>
                                <td style="text-align: center">
                                    <span>
                                        <?php
                                        $count = 0;
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 10) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span>Noviembre</span></th>
                                <td style="text-align: center">
                                    <span>
                                        <?php
                                        $count = 0;
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 11) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span>Diciembre</span></th>
                                <td style="text-align: center">
                                    <span>
                                        <?php
                                        $count = 0;
                                        foreach ($this->chart as $key => $date) {
                                            if ($date['Mes'] == 12) {
                                                echo $date['Total'];
                                                $count++;
                                            }
                                        }
                                        echo $count < 1 ? '0' : false;
                                        ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="reporte_grafico_right">
                <h1>Grafica</h1>
                <div style="width: 100%; height: auto;">
                    <canvas id="Admon_Chart_Asp" style="margin: auto; display: block; width: 80%"></canvas>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>

    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/admon/chart_solicitudes.js"></script>
</body>

</html>