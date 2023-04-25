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
    <title>Mis ofertas</title>
</head>

<body>
    <style>
        .table_scroll::-webkit-scrollbar {
            max-height: 8px !important;
            height: 10px !important;
            width: 10px !important;
        }
    </style>

    <?php include __DIR__ . ('../../layouts/header.php'); ?>

    <!-- Main -->
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
                <li class="breadcrumb_page">
                    <a>
                        <span>Estadisticas</span>
                    </a>
                </li>
            </ol>
        </div>
        <!-- ARRAY -->
        <?php if (isset($this->estadisticas) or !empty($this->estadisticas)) : ?>
            <div class="flex gap-10 align-center" style="justify-content: right">
                <select name="" id="changue_filter" style="width: max-content">
                    <option id="changue_filter_placeholder" value="null" class="hidden">Filtro por defecto (Categoria)</option>
                    <option data-referencia="categoria" value="<?php echo constant('URL') . 'empleador/mis_ofertas/categoria/?ref=categoria' ?>">Categoria</option>
                    <option data-referencia="mes" value="<?php echo constant('URL') . 'empleador/mis_ofertas/mes/?ref=mes' ?>">Meses</option>
                    <option data-referencia="consulta" value="<?php echo constant('URL') . 'empleador/mis_ofertas/consulta/?ref=consulta' ?>">Consultas</option>
                </select>
                <a href="" id="changue_filter_btn" style="background-color: #235b4e; color: white; padding: 10px; width: 80px;text-align:center;">
                    <span>Filtrar</span>
                </a>
            </div>
            <div class="reporte_grafico flex gap-20">
                <div class="reporte_grafico_left">
                    <h1>Estadisticas de Ofertas</h1>
                    <div class="table_scroll flex-col" style="overflow-y: auto; max-height: 500px">
                        <table class="table_default data_enero">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Enero</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 1) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span></span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Enero = 1; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Enero)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <table class="table_default data_febrero">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Febrero</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 2) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span></span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Febrero = 2; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Febrero)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <table class="table_default data_marzo">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Marzo</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 3) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span></span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Marzo = 3; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Marzo)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <table class="table_default data_abril">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Abril</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 4) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span></span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Abril = 4; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Abril)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <table class="table_default data_mayo">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Mayo</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 5) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span></span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Mayo = 5; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Mayo)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <table class="table_default data_junio">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Junio</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 6) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span></span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Junio = 6; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Junio)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <table class="table_default data_julio">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Julio</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 7) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span></span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Julio = 7; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Julio)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <table class="table_default data_agosto">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Agosto</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 8) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span></span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Agosto = 8; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Agosto)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <table class="table_default data_septiembre">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Septiembre</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 9) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span></span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Septiembre = 9; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Septiembre)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <table class="table_default data_octubre">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Octubre</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 10) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Octubre = 10; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Octubre)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <table class="table_default data_noviembre">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Noviembre</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 11) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span></span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Noviembre = 11; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Noviembre)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                        <table class="table_default data_diciembre">
                            <thead>
                                <tr>
                                    <td colspan="3" style="text-align: center">
                                        <span>Diciembre</span>
                                        </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <td style="text-align: center">
                                        <span>Total Ofertas</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div style="width: max-content !important">
                                            <span>Tipo / Categoria</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <span>Consultas</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->estadisticas as $dato) { ?>
                                    <?php if ($dato['Mes'] == 12) : ?>
                                        <tr>
                                            <th data-col="1">
                                                <span></span><?php echo $dato['Total'] ?></span>
                                            </th>
                                            <th data-col="2">
                                                <span><?php echo $dato['Categoria'] ?></span>
                                            </th>
                                            <th data-col="3">
                                                <span><?php echo $dato['Consulta'] ?></span>
                                            </th>
                                        </tr>
                                        <?php $Diciembre = 12; ?>
                                    <?php endif; ?>
                                <?php } ?>
                                <?php if (!isset($Diciembre)) : ?>
                                    <tr>
                                        <th colspan="3">
                                            <p>Sin Registros</p>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
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
    <script>
        const valores = window.location.search;
        //Creamos la instancia
        const urlParams = new URLSearchParams(valores);
        //Accedemos a los valores
        var param = urlParams.get('ref');

        switch (param) {
            case 'mes':
                $('#changue_filter_placeholder').text('Mes');
                $('option[data-referencia=mes]').css('display', 'none');
                break;
            case 'consulta':
                $('#changue_filter_placeholder').text('Consulta');
                $('option[data-referencia=consulta]').css('display', 'none');
                break;
            case 'categoria':
                $('#changue_filter_placeholder').text('Categoria');
                $('option[data-referencia=categoria]').css('display', 'none');
                break;
            default:
                $('option[data-referencia=categoria]').css('display', 'none');
                break;
        }

        $('#changue_filter').change(function() {
            $URL = $(this).val();
            $('#changue_filter_btn').attr('href', $URL);
        });

        let Temp_color;
        const data = {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [
                <?php
                for ($i = 0; $i < count($this->OrganizeArray); $i++) {
                    echo '{
                            data: ' . $this->OrganizeArray[$i] . ', 
                            borderWidth: 1,
                            backgroundColor: Temp_color = generatedColors(),
                            borderColor: Temp_color,
                        },';
                }
                ?>
            ],
        }
        const ctx = document.getElementById("empleador_Chart_ofertas");
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grafica de consultas por ofertas'
                    }
                },
            }
        });

        function generatedColors() {
            var simbolos, color;
            simbolos = "97523456789ABCDEF";
            color = "#";

            for (var i = 0; i < 6; i++) {
                color = color + simbolos[Math.floor(Math.random() * 16)];
            }
            return color;
        };
    </script>
</body>

</html>