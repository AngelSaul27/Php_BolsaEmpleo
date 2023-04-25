<?php $value = $this->oferta[0]; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="<?php echo constant('URL'); ?>public/img/App/Logo_small.png" />
    <link rel="icon" type="image/jpg" href="<?php echo constant('URL'); ?>public/img/App/Logo_small.png" />
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/components/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pages/oferta.css">
    <?php include __DIR__ . ('../../layouts/styles.php') ?>
    <title>Ofertas</title>
</head>

<body>
    <?php include __DIR__ . ('../../layouts/header.php'); ?>

    <?php
    function tranformar_fecha($fecha)
    {
        $ahora = time();
        $segundos = $ahora - $fecha;
        $dias = floor($segundos / 86400);
        $mod_hora = $segundos % 86400;
        $horas = floor($mod_hora / 3600);
        $mod_minuto = $mod_hora % 3600;
        $minutos = floor($mod_minuto / 60);
        if ($horas <= 0) {
            echo $minutos . ' minutos';
        } elseif ($dias <= 0) {
            echo $horas . ' horas ' . $minutos . ' minutos';
        } else {
            echo $dias . ' dias ' . $horas . ' horas ' . $minutos . ' minutos';
        }
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
        <meta http-equiv="refresh" content="2; url=<?php echo constant('URL') . 'oferta/view/' . $value['id']; ?>">
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

    <main>
        <div class="flex vw_oferta_back">
            <a href="<?php echo $_SESSION ? constant('URL') . 'aspirante/search' : constant('URL') . 'ofertas'; ?>" style="width: 20%;display: flex; align-items: center;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; color:dimgray; display: block; margin-top: 2.5px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                <h4 style="display: block; color:dimgray">Regresar</h4>
            </a>
        </div>
        <div class="vw_oferta_header padding_default">
            <div style="width: 100%; display: flex; flex-direction: column; text-align: right">
                <small><?php tranformar_fecha(strtotime($value['timestamp'])); ?></small>
            </div>
            <h1><?php echo  $value['Titulo'] ?></h1>
            <h2>$<?php echo number_format($value['Salario']); ?> Salario</h2>
            <h3><?php echo $value['Pais'] . ', ' . $value['Estado'] . ', ' . $value['Colonia'] ?></h3>
        </div>

        <div class="vw_oferta_body">
            <div class="padding_default">
                <h2 style="margin: 10px 0px; font-weight: 400">Descripción</h2>
                <div style="margin: 20px 0px">
                    <p><?php echo  $value['InformaciónExtra'] ?></p>
                </div>
                <h2 style="margin: 10px 0px; font-weight: 400">Beneficios</h2>
                <div style="margin: 15px 0px">
                    <p><?php echo  $value['Beneficios'] ?></p>
                </div>
                <h2 style="margin: 10px 0px; font-weight: 400">Ubicación</h2>
                <div style="margin: 15px 0px">
                    <p><?php echo  $value['Pais'] . ', ' . $value['Estado'] . ', ' . $value['Municipio'] ?></p>
                    <p><?php echo  $value['Colonia'] ?></p>
                    <p><?php echo  $value['Calle'] . ', ' . $value['NumExt'] ?></p>
                </div>
                <div style="margin: 20px 0px">
                    <p><span style="font-weight: 600;">Categoria: </span><?php echo $value['Categoria'] ?></p>
                </div>
            </div>
            <div class="padding_default" style="display: flex; justify-content: right">
                <div class="vw_oferta_form" id="box_oferta_form">
                    <div class="flex-col" style="padding: 20px 15px;">
                        <div style="width: 100%; display: flex; justify-content: center; margin: 10px 0px">
                            <?php
                            #PROCESADO DE LOGO TEMPORAL
                            $LOGO = $value['Logo'];
                            $CHECKING = substr($LOGO, 0, 5);
                            ?>
                            <?php if ($CHECKING == 'https') : ?>
                                <img src="<?php echo $value['Logo']; ?>" alt="Fotografia" width="40px">
                            <?php else : ?>
                                <img src="<?php echo constant('URL') . 'public/img/Storage/LogosEmpresas/' . $value['Logo'] ?>" width="80px" height="80px" alt="logo_oferta">
                            <?php endif; ?>
                        </div>
                        <div class="flex-col gap-10">
                            <?php if ($_SESSION) : ?>
                                <?php if ($this->postulacion or $_SESSION['role'] === 'Empleador') : ?>
                                    <div class="flex-col gap-10">
                                        <span style="margin: 10px 0px;"><?php echo $value['Nombre'] ?></span>
                                        <h2 style="font-weight: 400;"><?php echo $value['Titulo'] ?></h2>
                                        <h3 style="margin: 5px 0px;">$<?php echo number_format($value['Salario']); ?> Salario</h3>
                                        <button class="btn-green" style="width: 100%; height: 50px; font-size: 20px; margin: 10px 0px;">Ya te postulaste!</button>
                                    </div>
                                <?php else : ?>
                                    <form action="<?php echo constant('URL') . 'oferta/postularse/' . $value['id']; ?>" method="POST" class="flex-col gap-10">
                                        <span style="margin: 10px 0px;"><?php echo $value['Nombre'] ?></span>
                                        <h2 style="font-weight: 400;"><?php echo $value['Titulo'] ?></h2>
                                        <h3 style="margin: 5px 0px;">Salario: $<?php echo number_format($value['Salario']); ?></h3>
                                        <button class="btn-green" style="width: 100%; height: 50px; font-size: 20px; margin: 10px 0px;">Postularme</button>
                                    </form>
                                <?php endif; ?>
                            <?php else : ?>
                                <div class="flex-col gap-10">
                                    <span style="margin: 10px 0px;"><?php echo $value['Nombre'] ?></span>
                                    <h2 style="font-weight: 400;"><?php echo $value['Titulo'] ?></h2>
                                    <h3 style="margin: 5px 0px;">$<?php echo number_format($value['Salario']); ?> Salario</h3>
                                    <a href="<?php echo constant('URL') ?>login" class="btn-green" style="text-align: center;width: 100%; height: 50px; font-size: 20px; margin: 10px 0px;">Ingresa y postulate!</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . ('../../layouts/footer.php'); ?>

    <script src="<?php echo constant('URL') ?>public/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/app.js"></script>
    <script>
        $(window).scroll(function() {
            if (window.scrollY > 150) {
                $('#box_oferta_form').css('position', 'sticky');
            } else {
                $('#box_oferta_form').css('position', 'fixed');
            }
        });
    </script>
</body>

</html>