<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="<?php echo constant('URL'); ?>public/img/App/Logo_small.png" />
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pages/home.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/components/app.css">
    <?php include('layouts/styles.php') ?>
    <title>ASTRO</title>
</head>

<body>
    <?php include('layouts/header.php'); ?>

    <main>
        <section class="Main_Search">
            <div class="Main_Search_container">
                <div class="Main_Search_container-input input-group">
                    <div class="flex-col gap-10">
                        <label for="">¿Buscar?</label>
                        <div style="position: relative">
                            <input style="padding-left: 40px" type="text" placeholder="Puesto, área laboral o empresa">
                            <svg style="position: absolute; top: 15px; left: 10px; color: #a2ca8e" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                        <small>Recursos humanos, Gerente, Programador</small>
                    </div>
                    <div class="flex-col gap-10">
                        <label for="">¿Donde?</label>
                        <div style="position: relative">
                            <input style="padding-left: 35px" type="text" placeholder="Ciudad o Estado">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon" style="position: absolute; top: 15px; left: 10px; color: #efae78">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>

                        </div>
                        <small>CDMX, Estado de México, Nuevo León, Jalisco</small>
                    </div>
                </div>
                <button class="Main_Search_container-button">Buscar Empleo</button>
            </div>
        </section>
        <section class="Main_Preview">
            <div class="Preview_header flex-col gap-20">
                <span class="Preview_header-title">Puede interesarte</span>
                <div class="Preview_header-filter flex gap-20">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        Home Office
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        Medio Tiempo
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        Tabasco
                    </span>
                </div>
            </div>

            <div class="Preview_empresas">
                <div class="preview_empresas_aside">
                    <div class="preview_empresas_aside-title">
                        <p>
                            Descrube todas las empresas que estan cerca y que tienen los mejores puestos para ti.
                        </p>
                        <a href="">Saber Más</a>
                    </div>
                </div>
                <div class="Preview_empresas_box flex-col gap-20">
                    <div class="Preview_empresas_box-cols flex gap-20">
                        <div class="inactive"></div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/hp.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/amazon.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/amd.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/BBVA.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="inactive"></div>
                    </div>
                    <div class="Preview_empresas_box-cols flex gap-20">
                        <div class="inactive"></div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/bimbo.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/burgerking.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/cinepolis.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/ecolab.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/github.png" width="80px" height="80px" alt="">
                        </div>
                    </div>
                    <div class="Preview_empresas_box-cols flex gap-20">
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/google.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/inbursa.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/intel.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/lala.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/mcdonalds.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="inactive"></div>
                    </div>
                    <div class="Preview_empresas_box-cols flex gap-20">
                        <div class="inactive"></div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/nvidia.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/santander.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/Starbucks.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="active">
                            <img src="<?php echo constant('URL'); ?>public/img/Storage/LogosEmpresas/walmart.png" width="80px" height="80px" alt="">
                        </div>
                        <div class="inactive"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include('layouts/footer.php'); ?>
    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
</body>

</html>