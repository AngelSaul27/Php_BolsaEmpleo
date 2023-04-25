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
    <title>Lista de aspirantes</title>
</head>

<body>

    <?php include __DIR__ . ('../../layouts/header.php'); ?>

    <main class="main flex" style="flex-wrap: wrap; padding-top: 50px !important; justify-content: space-around; gap: 30px">
        <?php if (isset($this->aspirantes)) : ?>
            <?php foreach ($this->aspirantes as $data) : ?>
                <div style="border-radius: 8px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; height: max-content; width: max-content; max-width: 250px; padding: 20px 15px; background: white">
                    <a href="<?php echo constant('URL') . 'empleador/aspirante/view/' . $data['id'] ?>" class="flex-col" style="color: dimgray">
                        <?php #PROCESADO DE LOGO TEMPORAL
                        $LOGO = $data['Fotografia'];
                        $CHECKING = substr($LOGO, 0, 5); ?>
                        <?php if ($CHECKING == 'https') : ?>
                            <img src="<?php echo $data['Fotografia']; ?>" style="display: block; margin: auto; border-radius: 100%;" width="80px" height="80px" alt="Logo">
                        <?php else : ?>
                            <img src="<?php echo constant('URL') . 'public/img/Storage/Avatars/' . $data['Fotografia'] ?>" style="display: block; margin: auto; border-radius: 100%;" width="80px" height="80px" alt="Logo">
                        <?php endif; ?>
                        <span style="margin: 10px 0px 10px 0px; text-align: center"><?php echo $data['Nombre'] . ' ' . $data['ApellidoMaterno'] . ' ' . $data['ApellidoPaterno'] ?></span>
                        <strong style="font-weight: 400; color:steelblue; margin-top: 8px">Dirección</strong>
                        <small><?php echo $data['Pais'] . ', ' . $data['Estado'] . ', ' . $data['Municipio'] . ', ' . $data['Colonia'] ?></small>
                        <strong style="font-weight: 400; color:steelblue; margin-top: 8px">Biografia</strong>
                        <small style="text-align: justify; font-weight:300"><?php echo $data['Biografia'] ?></small>
                        <strong style="font-weight: 400; color:steelblue; margin-top: 8px">Datos Academicos</strong>
                        <?php if (!empty($data['Carrera'])) : ?>
                            <small><?php echo $data['Carrera'] ?></small>
                        <?php else : ?>
                            <small>No hay información de su carrera del aspirante</small>
                        <?php endif; ?>
                        <?php if (!empty($data['Nivel'])) : ?>
                            <small><?php echo $data['Nivel'] ?></small>
                        <?php else : ?>
                            <small>No hay información del nivel academico del aspirante</small>
                        <?php endif; ?>
                        <strong style="font-weight: 400; color:steelblue; margin-top: 8px">Datos Profesionales</strong>
                        <?php if (!empty($data['Profesion'])) : ?>
                            <small><?php echo $data['Profesion'] ?></small>
                        <?php else : ?>
                            <small>No hay datos del puesto de interes</small>
                        <?php endif; ?>
                        <?php if (!empty($data['InformacionProfesional'])) : ?>
                            <small><?php echo $data['InformacionProfesional'] ?></small>
                        <?php else : ?>
                            <small>No hay información profesional</small>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div style="text-align: center; margin-top:60px;">
                <h2 style="font-weight: 500; color:steelblue">Woops! Sin resultados</h2>
                <p style="color:dimgrey">¡Aun no cuenta con aspirantes!</p>
            </div>
            <img src="<?php echo constant('URL') ?>public/img/App/not_result.png" style="margin: auto; display: block;" width="500px">
        <?php endif; ?>
    </main>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>
    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
</body>

</html>