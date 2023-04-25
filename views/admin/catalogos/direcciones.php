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
    <style>
        .table_scroll::-webkit-scrollbar {
            max-height: 5px !important;
            height: 5px !important;
            width: 5px !important;
        }
    </style>
    <title>Catalogo | Direcciones</title>
</head>

<body>

    <?php include __DIR__ . ('../../../layouts/header.php'); ?>

    <main>
        <div class="flex gap-20" style="margin: 20px 30px 20px 20px;">
            <!-- Catalogo Pais -->
            <div class="table_scroll" style="max-height: 300px; overflow: auto; width: 100%">
                <table class="table_default">
                    <thead>
                        <tr style="text-align: center;">
                            <td>
                                <span>#</span>
                            </td>
                            <td>
                                <span>Pais</span>
                            </td>
                            <td style="text-align: center;">
                                <span>Acciones</span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->pais as $value) { ?>
                            <tr>
                                <th>
                                    <?php echo $value['id']; ?>
                                </th>
                                <th>
                                    <?php echo $value['Pais']; ?>
                                </th>
                                <th class="flex gap-10" style="justify-content: center;">
                                    <a href="#" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="tomato">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                    <a href="#" target="_blank" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="cornflowerblue">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Catalogo Estado -->
            <div class="table_scroll" style="max-height: 300px; overflow: auto; width: 100%">
                <table class="table_default">
                    <thead>
                        <tr style="text-align: center;">
                            <td>
                                <span>#</span>
                            </td>
                            <td>
                                <span>Estado</span>
                            </td>
                            <td>
                                <span>Pais_id</span>
                            </td>
                            <td style="text-align: center;">
                                <span>Acciones</span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->estado as $value) { ?>
                            <tr>
                                <th>
                                    <?php echo $value['id']; ?>
                                </th>
                                <th>
                                    <?php echo $value['Estado']; ?>
                                </th>
                                <th>
                                    <?php echo $value['Pais_id']; ?>
                                </th>
                                <th class="flex gap-10" style="justify-content: center;">
                                    <a href="#" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="tomato">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                    <a href="#" target="_blank" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="cornflowerblue">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex gap-20" style="margin: 20px 30px 20px 20px;">
            <!-- Catalogo Municipio -->
            <div class="table_scroll" style="max-height: 300px; overflow: auto; width: 100%">
                <table class="table_default">
                    <thead>
                        <tr style="text-align: center;">
                            <td>
                                <span>#</span>
                            </td>
                            <td>
                                <span>Municipio</span>
                            </td>
                            <td>
                                <span>Estado_id</span>
                            </td>
                            <td style="text-align: center;">
                                <span>Acciones</span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->municipio as $value) { ?>
                            <tr>
                                <th>
                                    <?php echo $value['id']; ?>
                                </th>
                                <th>
                                    <?php echo $value['Municipio']; ?>
                                </th>
                                <th>
                                    <?php echo $value['Estado_id']; ?>
                                </th>
                                <th class="flex gap-10" style="justify-content: center;">
                                    <a href="#" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="tomato">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                    <a href="#" target="_blank" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="cornflowerblue">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Catalogo Colonia -->
            <div class="table_scroll" style="max-height: 300px; overflow: auto; width: 100%">
                <table class="table_default">
                    <thead>
                        <tr style="text-align: center;">
                            <td>
                                <span>#</span>
                            </td>
                            <td>
                                <span>Colonia</span>
                            </td>
                            <td>
                                <span>Municipio_id</span>
                            </td>
                            <td style="text-align: center;">
                                <span>Acciones</span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->colonia as $value) { ?>
                            <tr>
                                <th>
                                    <?php echo $value['id']; ?>
                                </th>
                                <th>
                                    <?php echo $value['Colonia']; ?>
                                </th>
                                <th>
                                    <?php echo $value['Municipio_id']; ?>
                                </th>
                                <th class="flex gap-10" style="justify-content: center;">
                                    <a href="#" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="tomato">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                    <a href="#" target="_blank" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="cornflowerblue">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include __DIR__ . ('../../../layouts/footer.php'); ?>

    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
</body>

</html>