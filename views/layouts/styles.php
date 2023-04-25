<?php if (isset($_SESSION['role'])) : ?>
    <?php if ($_SESSION['role'] == 'Empleador') : ?>
        <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pages/empleador.css">
    <?php endif ?>
    <?php if ($_SESSION['role'] == 'Aspirante') : ?>
        <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pages/aspirante.css">
    <?php endif ?>
    <?php if ($_SESSION['role'] == 'Administrador') : ?>
        <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pages/admin.css">
    <?php endif ?>
<?php endif ?>