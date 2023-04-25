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
    <title>Dashboard</title>
</head>

<body>

    <?php include __DIR__ . ('../../layouts/header.php'); ?>

    <main class="main">
        <div class="breadcrumb">
            <ol class="breadcrumb_box">
                <li>
                    <a class="breadcrumb_box_home active" href="<?php echo constant('URL'); ?>administrador">
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
                    <span>Empleadores</span>
                </li>
            </ol>
        </div>

        <div class="listado_header">
            <div class="listado_header_filtros flex gap-10">
                <form action="<?php echo constant('URL'); ?>administrador/empleadores/pdf" method="POST" target="_blank" id="listado_empleadores">
                    <button onclick="MapingTable(8, 'span', '<?php echo constant('URL') . 'adminstrador/empleadores/view/'; ?>')" class="listado_header_filtros_imprimir flex gap-10" style="height: 40px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                        </svg>
                        <span>Listado</span>
                    </button>
                </form>
                <div>
                    <select>
                        <option value="">Todas los empleadores</option>
                        <option value="">Ultimos 7 días</option>
                        <option value="">Ultimos Mes</option>
                        <option value="">Ultimos Año</option>
                        <option value="">Ultimos 5</option>
                        <option value="">Ultimos 10</option>
                        <option value="">Ultimos 15</option>
                        <option value="">Ultimos 20</option>
                        <option value="">Ultimos 25</option>
                        <option value="">Ultimos 30</option>
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

        <table class="table_default">
            <thead>
                <tr style="text-align: center;">
                    <td>
                        <span>Nombre</span>
                    </td>
                    <td>
                        <span>Razon Social</span>
                    </td>
                    <td>
                        <span>Correo</span>
                    </td>
                    <td>
                        <span>Tipo de Empresa</span>
                    </td>
                    <td>
                        <span>RFC</span>
                    </td>
                    <td>
                        <span>Fotografia</span>
                    </td>
                    <td>
                        <span>Fecha de Registro</span>
                    </td>
                    <td style="text-align: center;">
                        <p style="color: white">Acciones</p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->datos as $value) { ?>
                    <tr>
                        <th style="display: none">
                            <span><?php echo $value['id']; ?></span>
                        </th>
                        <th>
                            <span><?php echo $value['Nombre']; ?></span>
                        </th>
                        <th>
                            <span><?php echo $value['RazonSocial']; ?></span>
                        </th>
                        <th>
                            <span><?php echo $value['Email']; ?></span>
                        </th>
                        <th>
                            <span><?php echo $value['TipoEmpleador']; ?></span>
                        </th>
                        <th>
                            <span><?php echo $value['RFC']; ?></span>
                        </th>
                        <th>
                            <?php
                            $Validador = false;
                            #PROCESADO DE LOGO TEMPORAL
                            $Valor = $value['Logo'];
                            $check = substr($Valor, 0, 5);
                            if ($check == 'https') {
                                $Validador = true;
                            }
                            ?>
                            <img src="<?php echo !$Validador ? constant('URL') . 'public/img/Storage/LogosEmpresas/' . $value['Logo'] : $value['Logo']; ?>" alt="Fotografia" width="40px">
                        </th>
                        <th>
                            <span><?php echo $value['Timestamp']; ?></span>
                        </th>
                        <th class="flex gap-10" style="justify-content: center;">
                            <a href="" title="Validar">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="mediumseagreen">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg>
                            </a>
                            <span title="Eliminar" data-open-modal="Modal_Container" data-form="administrador/empleador/destroy/<?php echo $value['id'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="tomato">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </span>
                            <a href="<?php echo constant('URL') ?>adminstrador/empleadores/view/<?php echo $value['id'] ?>" target="_blank" title="Ver datos completos">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="cornflowerblue">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </a>
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

    <?php include_once __DIR__ . '../../component/modal.php'; ?>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>

    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/modal.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/pdf.js"></script>
</body>

</html>