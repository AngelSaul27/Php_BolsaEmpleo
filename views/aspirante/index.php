<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="<?php echo constant('URL'); ?>public/img/App/Logo_small.png" />
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/components/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pages/aspirante.css">
    <title>Astro - Bolsa de Empleo</title>
</head>

<body>

    <?php include __DIR__ . ('./../layouts/header.php'); ?>

    <main style="height: 100vh;">
        <img src="<?php echo constant('URL') ?>public/img/App/Construccion.png" style="margin: auto; display: block;" width="700px">
    </main>

    <?php include __DIR__ . ('./../layouts/footer.php'); ?>

    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
</body>

</html>