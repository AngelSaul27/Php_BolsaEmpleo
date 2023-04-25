<?php

require_once 'controllers/errors.php';

class App extends Kernel
{

    function __construct()
    {

        /*
                ====================================================
                    ESTRUCTURA PARA EL BUEN MANEJO DE LAS RUTAS
                ====================================================
                LA SIGUIENTE ESTRUCTURA MANEJA DOS METODOS QUE HACEN 
                ALUSION A LAS PETICIONES DE TIPO GET Y POST.

                ESTOS DOS METODOS RECIBEN LOS SIGUIENTES PARAMATROS URL, 
                CONTROLLER (Opcional), METODO (Opcional), ROLE (Opcional);
                
                URL ES LA DIRECCION O RUTA QUE SE INCLUYE EN 
                EL NAVEGADOR

                CONTROLADOR ES LA UBICACIÓN O EL ARCHIVO QUE SE ENCUENTRA
                EN LA CARPETA CONTROLLERS, LA CUAL NOS PERMITE INTERACTUAR
                ENTRE EL MODELO Y LA VISTA.

                CON EL PARAMTETRO METODO PODEMOS LLAMAR A UNA FUNCION QUE
                SE ENCUENTRE EN NUESTRO CONTROLADOR, POR EJEMPLO UNA FUNCION
                QUE ACTUALIZE LA PAGINA O ALGUN REGISTRO

                ====================================================
                                    EJEMPLO
                ====================================================
                Route::get('login','login')
                    1.- SE VALIDA LA URL
                    2.- SE ACCEDE AL CONTROLADOR (CONSTRUCTOR)

                EN NUESTRO NAVEGADOR TENDRIAMOS: localhost/login

                Route::post('login/validar','login','validar')
                    1.- SE VALIDA LA URL
                    2.- SE ACCEDE AL CONTROLADOR
                    3.- SE ACCEDE AL METODO VALIDAR

                EN NUESTRO NAVEGADOR TENDRIAMOS: localhost/login/validar
                SE USA POST YA QUE ES UNA PETICION AL SERVIDOR DE UN 
                FORMULARIO.

                Route::GET('administrador','administrador', null)
                    1.- SE VALIDA LA URL
                    2.- SE ACCEDE AL CONTROLADOR
                    3.- COMO NO USAREMOS UN METODO LO DEJAMOS EN NULL
                
                EN NUESTRO NAVEGADOR TENDRIAMOS: localhost/administrador
                EVITAR '', ES MEJOR USAR NULL SI NO QUEREMOS DECLARAR UN PARAMETRO

                Route::GET('post/{$id}','blog/post', view)
                    1.- SE VALIDA LA URL Y SE VALIDA QUE SE RECIBE UN PARAMETRO
                    2.- SE ACCEDE AL CONTROLADOR
                    3.- SE ACCEDE AL METODO

                EN NUESTRO NAVEGADOR TENDRIAMOS: localhost/post/1
                ====================================================
            */

        #----------------------------------------------------------#
        #                        METODOS GET
        #----------------------------------------------------------#
        switch ($_SERVER['REQUEST_METHOD'] == 'GET') {
            case 'GET':
                Kernel::get('login', 'auth/login');
                Kernel::get('logout', 'auth/logout');
                Kernel::get('register', 'auth/register');
                Kernel::get('register/empresas', 'auth/register', 'empresas');
                Kernel::get('register/aspirantes', 'auth/register', 'aspirantes');
        
                Kernel::get('aspirante', 'aspirante/index');
                Kernel::get('aspirante/perfil', 'aspirante/perfil');
                Kernel::get('aspirante/search', 'oferta', 'vw_index');
                Kernel::get('aspirante/postulaciones', 'aspirante/postulaciones');
        
                Kernel::get('empleador', 'empleador/index');
                Kernel::get('empleador/perfil', 'empleador/perfil');
                Kernel::get('empleador/oferta', 'oferta', 'vw_form');
                Kernel::get('empleador/solicitudes', 'empleador/solicitudes');
                Kernel::get('empleador/publicaciones', 'empleador/publicaciones');
                Kernel::get('empleador/aspirantes', 'empleador/index', 'aspirante');
                Kernel::get('empleador/estadisticas', 'empleador/estadisticas');
                Kernel::get('empleador/mis_ofertas', 'empleador/estadisticas', 'mis_ofertas');
                Kernel::get('empleador/mis_ofertas/{$id}', 'empleador/estadisticas', 'mis_ofertas');

                Kernel::get('empleador/mis_contrataciones', 'empleador/estadisticas', 'mis_contrataciones');
                Kernel::get('empleador/mis_contrataciones/{$id}', 'empleador/estadisticas', 'mis_contrataciones');
        
                Kernel::get('administrador', 'admin/administrador');
                Kernel::get('administrador/aspirantes', 'admin/administrador', 'aspirantes');
                Kernel::get('administrador/empleadores', 'admin/administrador', 'empleadores');
        
                Kernel::get('administrador/chart_empleadores', 'admin/administrador', 'chart_empleadores');
                Kernel::get('administrador/chart_aspirantes', 'admin/administrador', 'chart_aspirantes');
                Kernel::get('administrador/chart_solicitudes', 'admin/chart_solicitudes', 'chart_solicitudes');
                Kernel::get('administrador/chart_ofertas', 'admin/chart_ofertas', 'chart_ofertas');
        
                Kernel::get('administrador/catalogo/direcciones', 'admin/catalogos');
                Kernel::get('administrador/ofertas', 'oferta', 'vw_index');
        
                Kernel::get('ofertas', 'oferta', 'vw_index');
        
                #----------------------------------------------------------#
                #                      URLS CON PARAMETROS
                #----------------------------------------------------------#
                Kernel::get('adminstrador/empleadores/view/{id}', 'admin/vw_empleadores', 'vw_empleadores');
                Kernel::get('adminstrador/aspirantes/view/{id}', 'admin/vw_aspirantes', 'vw_aspirantes');
        
                Kernel::get('empleador/aspirante/view/{$id}', 'empleador/aspirante', 'vw_aspirantes');
                Kernel::get('empleador/oferta/edit/{$id}', 'oferta', 'vw_form_edit');
        
                Kernel::get('oferta/form/{$id}', 'oferta', 'vw_form'); //Crear oferta
                Kernel::get('oferta/view/{$id}', 'oferta', 'vw_view'); //Oferta detalle
                Kernel::get('oferta/edit/{$id}', 'oferta', 'vw_edit');  //Editar oferta
        
                #----------------------------------------------------------#
                #              DIRECCIONES DE VISTA DE PDF
                #----------------------------------------------------------#
                Kernel::get('administrador/view/curriculum/{$id}', 'pdf/curiculum', 'aspirantes');
                Kernel::get('empleador/view/ofertas/{$id}', 'pdf/ofertas', 'ofertas');
            break;
        }

        #----------------------------------------------------------#
        #                       METODOS POST
        #----------------------------------------------------------#
        switch ($_SERVER['REQUEST_METHOD'] == 'POST') {
            case 'POST':
                Kernel::post('login/authenticar', 'auth/login', 'authenticar');
                Kernel::post('register/empresas/authenticar', 'auth/register', 'empresas');
                Kernel::post('register/aspirantes/authenticar', 'auth/register', 'aspirantes');
        
                Kernel::post('aspirante/perfil/update', 'aspirante/perfil', 'update');
                Kernel::post('aspirante/perfil/destroy', 'aspirante/perfil', 'destroy');
        
                Kernel::post('empleador/oferta/crear', 'oferta', 'create');
                Kernel::post('empleador/perfil', 'empleador/perfil', 'update');
                Kernel::post('empleador/perfil/destroy', 'empleador/perfil', 'destroy');
        
        
                #----------------------------------------------------------#
                #                      URLS CON PARAMETROS
                #----------------------------------------------------------#
                Kernel::post('empleador/solicitudes/destroy/{$id}', 'empleador/solicitudes', 'destroy');
                Kernel::post('empleador/solicitud/respuesta/{$id}', 'empleador/solicitudes', 'status_solicitud');
        
                Kernel::post('aspirante/postulaciones/destroy/{$id}', 'aspirante/postulaciones', 'destroy');
        
                Kernel::post('oferta/edit/{$id}', 'oferta', 'edit');
                Kernel::post('oferta/destroy/{$id}', 'oferta', 'destroy');
                Kernel::post('oferta/postularse/{$id}', 'oferta', 'oferta_postularme');
                Kernel::post('oferta/update/{$id}', 'oferta', 'update');
        
                Kernel::post('administrador/aspirante/destroy/{$id}', 'admin/aspirante', 'destroy');
                Kernel::post('administrador/empleador/destroy/{$id}', 'admin/empleador', 'destroy');
        
                #----------------------------------------------------------#
                #              DIRECCIONES DE GENERACIÓN DE PDF
                #----------------------------------------------------------#
                Kernel::post('administrador/aspirantes/pdf', 'pdf/listado_aspirantes', 'loadData');
                Kernel::post('administrador/empleadores/pdf', 'pdf/listado_empleadores', 'loadData');
        
                Kernel::post('empleador/solicitudes/pdf', 'pdf/listado_solicitudes', 'loadData');

                Kernel::post('administrador/chart_solicitudes/pdf', 'pdf/chart_solicitudes', 'chart_solicitudes');
                Kernel::post('administrador/chart_ofertas/pdf', 'pdf/chart_ofertas', 'chart_ofertas');

                Kernel::post('aspirante/postulaciones/pdf', 'aspirante/postulaciones', 'pdf');

                #----------------------------------------------------------#
                #                  DIRECCIONES DE CONSULTAS
                #----------------------------------------------------------#
                Kernel::post('request/estado/{$id}', 'consultas', 'consulta_estado');
                Kernel::post('request/municipio/{$id}', 'consultas', 'consulta_municipio');
                Kernel::post('request/colonia/{$id}', 'consultas', 'consulta_colonia');
            break;
        }
        new Errores();
        exit();
    }
}
