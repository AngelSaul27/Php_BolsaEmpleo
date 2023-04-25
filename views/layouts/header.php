<div class="loader-page"></div>
<header class="flex-col" id="Header_Id">
    <div class="header_main flex">
        <div class="header_main-brand flex gap-20">
            <!-- Logo -->
            <div class="flex gap-20" style="align-items: center;">
                <div class="header_main-logo">
                    <a href="<?php echo constant('URL') ?>">
                        <img src="<?php echo constant('URL') ?>public/img/App/Logo_small.png" alt="Logotipo Astro">
                    </a>
                </div>
                <nav class="header_logo_filter" style="background-color: #021b2b;">
                    <ul class="flex gap-20">
                        <li>
                            <a href="">Perfiles de Empresas </a>
                        </li>
                        <li>
                            <a href="<?php echo constant('URL') ?>ofertas">Ofertas Mas buscadas</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Accesos rapidos -->
            <nav class="header_main_filters" style="display: none;">
                <ul class="flex gap-20">
                    <li>
                        <a href="#">Perfiles de empresas</a>
                    </li>
                    <li>
                        <a href="#">Ofertas más buscadas</a>
                    </li>
                </ul>
            </nav>
        </div>
        <nav class="header_main_registro flex-center gap-20">
            <?php if (!isset($_SESSION['role'])) : ?>
                <!-- SESSION FORM -->
                <ul class="header_main_registro-box flex gap-20">
                    <li>
                        <a href="<?php echo constant('URL'); ?>login">Ingresar</a>
                    </li>
                    <li>
                        <a href="<?php echo constant('URL'); ?>register">Registrate</a>
                    </li>
                </ul>
            <?php else : ?>
                <?php if ($_SESSION['role'] == 'Empleador') : ?>
                    <a href="<?php echo constant('URL') ?>empleador/oferta" class="btn_Created_ofert">
                        Crear Ofertas
                    </a>
                <?php endif ?>
                <!-- TOGGLE NAV -->
                <div class="header_togglet">
                    <div id="DropdownMenu" data-dropdown="ToggleMenuNav" class="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </div>
                    <div id="ToggleMenuNav" class="dropdown-content dropdown-right">
                        <a href="<?php echo constant('URL') ?>logout"><small> Exit </small></a>
                    </div>
                </div>
            <?php endif ?>
        </nav>
    </div>
    <!-- NAVEGATION -->
    <?php
    if ($_SESSION) {

        if ($_SESSION['role'] == 'Administrador') {
            include 'nav_admon.php';
            return false;
        }

        if ($_SESSION['role'] == 'Aspirante') {
            include 'nav_asp.php';
            return false;
        }

        if ($_SESSION['role'] == 'Empleador') {
            include 'nav_emp.php';
            return false;
        }
    }
    ?>
</header>