<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// $routes->add('/contacto', 'Home::contacto');
// $routes->add('/home', 'Home::index');
// $routes->get('/contacto', 'ContactoController::index');
// $routes->get('/documentacion/(:num)', 'ContactoController::documentacion/$1');
// $routes->get('/documentacion', 'ContactoController::documentacion');
// $routes->post('/recibirFormulario', 'ContactoController::recibirDatos');
// $routes->get('/documentos', 'DocumentosController::index');




// LOGIN
$routes->post('/validarLogin', 'LoginController::validar');
$routes->get('/', 'LoginController::index');
$routes->add('/home', 'LoginController::home');

// AGREGAR USUARIO
$routes->add('/addUser', 'Home::addUser');

// CALENDARIO
$routes->get('agenda', 'ModulosController::agenda');

// CONFIGURACIONES
// 1. Tipo de Documento
$routes->get('tipodocumento', 'ModulosController::tipodocumento');
$routes->get('buscar', 'DocumentosController::buscar');
$routes->add('almacenar', 'DocumentosController::almacenar');
$routes->add('actualizar', 'DocumentosController::actualizar');
$routes->add('obtenerId', 'DocumentosController::obtenerId');
$routes->add('eliminar', 'DocumentosController::eliminar');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
