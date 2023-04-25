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
    <title>Perfil</title>
</head>

<body>

    <?php include __DIR__ . ('../../layouts/header.php'); ?>

    <?php
    if (isset($this->profile_data)) {
        $profile = $this->profile_data[0];
    }
    ?>

    <?php if (!empty($this->success)) { ?>
        <div id="errorsSession" class="alert_box">
            <div class="aler_box_icon_success">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="alert_box_mensaje">
                <ul class="alert_box_mensaje_ul">
                    <li>
                        <?php echo $this->success ?>
                    </li>
                </ul>
            </div>
        </div>
        <meta http-equiv="refresh" content="2; url=<?php echo constant('URL'); ?>empleador/perfil">
    <?php } ?>

    <?php if (!empty($this->mensaje)) { ?>
        <div id="errorsSession" class="alert_box">
            <div class="aler_box_icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="alert_box_mensaje">
                <ul class="alert_box_mensaje_ul">
                    <?php
                    foreach ($this->mensaje as $valor) {
                        echo '<li>  ' . $valor .  '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php } ?>

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
                    <span>Mis datos</span>
                </li>
            </ol>
        </div>

        <form action="<?php echo constant('URL') ?>empleador/perfil" method="POST" enctype="multipart/form-data" class="PfContainer flex gap-20">
            <div class="PfPersonales">
                <div class="PfPersonales_avatar flex-col">
                    <div class="PfPersonales_avatar-box">
                        <label for="FileProfie" style="margin: 0px; height: 100%" class="relative eventHover">
                            <?php
                            $Validador = false;
                            #PROCESADO DE LOGO TEMPORAL
                            $Valor = $profile['Logo'];
                            $check = substr($Valor, 0, 5);
                            if ($check == 'https') {
                                $Validador = true;
                            }
                            ?>
                            <img src="<?php echo !$Validador ? constant('URL') . 'public/img/Storage/LogosEmpresas/' . $profile['Logo'] : $profile['Logo']; ?>" alt="burgerking logo">
                            <input type="file" class="hidden" name="fotografia" id="FileProfie">
                            <div class="reloadOpacity opacity-0 absolute overflow_avatar"></div>
                        </label>
                    </div>
                    <input type="text" class="hidden" name="FotografiaDefault" value="<?php echo $profile['Logo']; ?>">
                    <div class="PfPersonales_avatar-nombre flex-col">
                        <span>!Hola¡</span>
                        <span><?php echo $profile['Nombre']; ?></span>
                    </div>
                    <hr>
                    <div class="PfPersonales_avatar-status flex gap-10">
                        <?php if ($profile['Status'] == 'Sin verificar') : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="#837337">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                            <small>Tu cuenta no esta verificada</small>
                        <?php endif; ?>

                        <?php if ($profile['Status'] == 'En Revision') : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="#375883">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                            </svg>
                            <small>Tu cuenta esta en revisión</small>
                        <?php endif; ?>

                        <?php if ($profile['Status'] == 'No aceptado') : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="#833737">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <small>Tu cuenta esta fue denegada, sera eliminada en 7 dias</small>
                        <?php endif; ?>

                        <?php if ($profile['Status'] == 'Verificado') : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" color="#378371">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                            <small>Tu cuenta esta verificada</small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="PfDatos flex gap-20">
                <div class="PfDatos_Empresa flex-col gap-10">
                    <h1>Datos de la Empresa</h1>
                    <div class="PfDatos_Empresa-form">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" value="<?php echo $profile['Nombre']; ?>">
                    </div>
                    <div class="input-group">
                        <div>
                            <label for="razon_social">Razón Social</label>
                            <input type="text" name="razon_social" value="<?php echo $profile['RazonSocial']; ?>">
                        </div>
                        <div>
                            <label for="RFC">RFC (13 caracteres)</label>
                            <input type="text" name="RFC" value="<?php echo $profile['RFC']; ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <div>
                            <label for="tipo_empresa">Tipo de Empresa</label>
                            <select name="tipo_empresa">
                                <option value="null" class="hidden">Selecciona su tipo de empresa</option>
                                <?php if (isset($this->catalogo_empresa)) : ?>
                                    <?php foreach ($this->catalogo_empresa['Tipo_Empleador'] as $value) { ?>
                                        <option value="<?php echo $value['id'] ?>" <?php echo $profile['TipoEmpleador'] === $value['valor'] ? 'selected' : ''; ?>><?php echo $value['valor'] ?></option>
                                    <?php } ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <label for="sector_actividad">Sector de Actividad</label>
                            <select name="sector_actividad">
                                <option value="null" class="hidden">Selecciona su sector de actividad</option>
                                <?php if (isset($this->catalogo_empresa)) : ?>
                                    <?php foreach ($this->catalogo_empresa['Sector_Actividad'] as $value) { ?>
                                        <option value="<?php echo $value['id'] ?>" <?php echo $profile['Sector'] === $value['valor'] ? 'selected' : ''; ?>><?php echo $value['valor'] ?></option>
                                    <?php } ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <div>
                            <label for="actividad_economica">Actividad Economica Principal</label>
                            <select name="actividad_economica">
                                <option value="null" class="hidden">Selecciona su actividad economica</option>
                                <?php if (isset($this->catalogo_empresa)) : ?>
                                    <?php foreach ($this->catalogo_empresa['Actividad_Economica'] as $value) { ?>
                                        <option value="<?php echo $value['id'] ?>" <?php echo $profile['ActividadEconomica'] === $value['valor'] ? 'selected' : ''; ?>><?php echo $value['valor'] ?></option>
                                    <?php } ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <label for="subsector">Subsector</label>
                            <select name="subsector">
                                <option value="null" class="hidden">Sector de actividades</option>
                                <?php if (isset($this->catalogo_empresa)) : ?>
                                    <?php foreach ($this->catalogo_empresa['Subsector'] as $value) { ?>
                                        <option value="<?php echo $value['id'] ?>" <?php echo $profile['Subsector'] === $value['valor'] ? 'selected' : ''; ?>><?php echo $value['valor'] ?></option>
                                    <?php } ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="" cols="30" rows="10" style="resize: none;"><?php echo $profile['Descripcion']; ?></textarea>
                    </div>
                </div>
                <div class="PfDatos_Adress flex-col gap-10">
                    <h1>Ubicación</h1>
                    <div class="input-group">
                        <div>
                            <label for="pais">Pais</label>
                            <select name="pais" id="Pais_Select">
                                <option value="null" class="hidden">Seleccione su Pais</option>
                                <?php if (isset($this->catalogo_pais)) : ?>
                                    <?php foreach ($this->catalogo_pais as $pais) { ?>
                                        <option value="<?php echo $pais['id'] ?>" <?php echo $pais['Pais'] == $profile['Pais'] ? 'selected' : ''; ?>><?php echo $pais['Pais'] ?></option>
                                    <?php } ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <label for="estado">Estado</label>
                            <select name="estado" id="Estado_Select">
                                <?php if (isset($this->catalogo_estado)) : ?>
                                    <?php foreach ($this->catalogo_estado as $estado) { ?>
                                        <option value="<?php echo $estado['id'] ?>" <?php echo $estado['Estado'] == $profile['Estado'] ? 'selected' : ''; ?>><?php echo $estado['Estado'] ?></option>
                                    <?php } ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <div>
                            <label for="municipio">Municipio</label>
                            <select name="municipio" id="Municipio_Select">
                                <?php if (isset($this->catalogo_municipio)) : ?>
                                    <?php foreach ($this->catalogo_municipio as $municipio) { ?>
                                        <option value="<?php echo $municipio['id'] ?>" <?php echo $municipio['Municipio'] == $profile['Municipio'] ? 'selected' : ''; ?>><?php echo $municipio['Municipio'] ?></option>
                                    <?php } ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <label for="colonia">Colonia</label>
                            <select name="colonia" id="Colonia_Select">
                                <?php if (isset($this->catalogo_colonia)) : ?>
                                    <?php foreach ($this->catalogo_colonia as $colonia) { ?>
                                        <option value="<?php echo $colonia['id'] ?>" <?php echo $colonia['Colonia'] == $profile['Colonia'] ? 'selected' : ''; ?>><?php echo $colonia['Colonia'] ?></option>
                                    <?php } ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="calle">Calles</label>
                        <input type="text" name="calle" value="<?php echo $profile['Calle']; ?>">
                    </div>
                    <div>
                        <label for="referencias">Referencias</label>
                        <input type="text" name="referencias" value="<?php echo $profile['Referencias']; ?>">
                    </div>
                    <div class="input-group">
                        <div>
                            <label for="num_ext">Num. Ext.</label>
                            <input type="number" name="num_ext" value="<?php echo $profile['NumExt']; ?>">
                        </div>
                        <div>
                            <label for="num_int">Num. Int.</label>
                            <input type="number" name="num_int" value="<?php echo $profile['NumInt']; ?>">
                        </div>
                    </div>
                    <div class="input-group">
                        <button class="btn-green btn-green-shadow">Actualizar</button>
                        <div class="btn-red btn-red-shadow" style="text-align: center;" data-open-modal="Modal_Container">Eliminar Cuenta</div>
                    </div>
                    <span style="color: darkslategray">Fecha de Registro: <span style="color: darkcyan"><?php echo $profile['Registado']; ?></span></span>
                </div>
            </div>
        </form>
    </main>

    <div id="Modal_Container" class="modal_filter hidden">
        <div id="Modal_Container-target" class="modal_container" style="display: none;">
            <div class="modal_close_menu">
                <span class="modal_close_menu_btn" data-close-modal="Modal_Container">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
            <div class="modal_body">
                <p>Estas a punto de eliminar este elemento, ¿Quieres continuar?</p>
            </div>
            <form action="<?php echo constant('URL') . 'aspirante/perfil/destroy'; ?>" method="POST" class="modal_footer">
                <button class="btn-green btn-green-shadow">Eliminar</button>
                <div data-close-modal="Modal_Container" class="btn-red btn-red-shadow" style="text-align: center;">Cancelar</div>
            </form>
        </div>
    </div>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>
    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/modal.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/request.js"></script>
</body>

</html>