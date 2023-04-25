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
                    <span>Aspirantes</span>
                </li>
            </ol>
        </div>
        <?php if (isset($this->aspirantes) and !empty($this->aspirantes)) : ?>
            <div class="listado_header">
                <div class="listado_header_filtros flex gap-10">
                    <form action="<?php echo constant('URL'); ?>administrador/aspirantes/pdf" method="POST" target="_blank" id="listado_aspirantes">
                        <button onclick="MapingTable(6, 'span', '<?php echo constant('URL') . 'adminstrador/aspirantes/view/'; ?>')" class="listado_header_filtros_imprimir flex gap-10" style="height: 40px;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                            </svg>
                            <span>Listado</span>
                        </button>
                    </form>
                    <div>
                        <select>
                            <option value="">Todas los aspirantes</option>
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
                            <span>Correo</span>
                        </td>
                        <td>
                            <span>Fecha de Nacimiento</span>
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
                    <?php foreach ($this->aspirantes as $data) : ?>
                        <tr>
                            <th style="display: none">
                                <span><?php echo $data['User_id'] ?></span>
                            </th>
                            <th>
                                <span><a><?php echo $data['Nombre'] . " " . $data['ApellidoPaterno'] . " " . $data['ApellidoMaterno']; ?></a></span>
                            </th>
                            <th>
                                <span><?php echo $data['Email'] ?></span>
                            </th>
                            <th>
                                <span><?php echo $data['FechaNacimiento'] ?></span>
                            </th>
                            <th>
                                <?php
                                #PROCESADO DE LOGO TEMPORAL
                                $LOGO = $data['Fotografia'];
                                $CHECKING = substr($LOGO, 0, 5); ?>
                                <?php if ($CHECKING == 'https') : ?>
                                    <img src="<?php echo $data['Fotografia']; ?>" alt="Fotografia" width="40px">
                                <?php else : ?>
                                    <img src="<?php echo constant('URL') . 'public/img/Storage/Avatars/' . $data['Fotografia']; ?>" alt="Fotografia" width="40px">
                                <?php endif; ?>
                            </th>
                            <th>
                                <span><?php echo $data['Fecha_Registro'] ?></span>
                            </th>
                            <th class="flex gap-10" style="justify-content: center;">
                                <span title="Eliminar Solicitud" data-open-modal="Modal_Container" data-form="administrador/aspirante/destroy/<?php echo $data['User_id'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="tomato">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </span>
                                <a href="<?php echo constant('URL') ?>adminstrador/aspirantes/view/<?php echo $data['User_id'] ?>" target="_blank" title="Ver datos completos">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="cornflowerblue">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                    </svg>
                                </a>
                                <a href="<?php echo constant('URL') . 'administrador/view/curriculum/' . $data['User_id'] ?>" target="_blank" title="Imprimir CV">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" color="#53a08e" class="svg-icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                    </svg>
                                </a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="" style="text-align: center; margin-top:60px;">
                <h2 style="font-weight: 500; color:steelblue">Woops! Sin resultados</h2>
                <p style="color:dimgrey">¡Aun no cuenta con aspirantes registrados o activos!</p>
            </div>
            <img src="<?php echo constant('URL') ?>public/img/App/not_result.png" style="margin: auto; display: block;" width="500px">
        <?php endif; ?>
    </main>

    <?php include_once __DIR__ . '../../component/modal.php'; ?>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>
    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/modal.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/pdf.js"></script>
</body>

</html>