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

// // CALENDARIO
// $routes->get('agenda', 'ModulosController::agenda');



$routes->get('/', 'LoginController::index');
$routes->add('cerrarSesion', 'LoginController::salir');
$routes->add('login', 'LoginController::index');

$routes->post('validarLogin', 'LoginController::validar');
$routes->add('registro', 'LoginController::registro');
$routes->add('traerMunicipios', 'RegistroController::traerMunicipios');
$routes->post('guardarPersona', 'RegistroController::formulario');

  


// Definiendo grupos para los autenticados
$routes->group('/', ['namespace' => 'App\Controllers', 'filter' => 'Auth'], function ($routes) {

    $routes->add('/home', 'LoginController::home');
    $routes->add('/login', 'LoginController::index');
    $routes->add('notificarCaducidad', 'LoginController::caducos');

});

$routes->group('agenda', ['namespace' => 'App\Controllers\Agenda', 'filter' => 'Auth'], function ($routes) {

    $routes->get('main', 'ModulosController::agenda');
    $routes->get('agenda', 'AgendaController::listarAgenda');
    $routes->get('sucursales', 'AgendaController::listarSucursales');
    $routes->add('horaDisponible', 'AgendaController::listarHorariosDisponibles');
    $routes->add('agendar', 'AgendaController::guardarCitaAgenda');
    
    // Cumpleañeros
    $routes->get('cumpleaneros', 'ModulosController::cumpleanero');
    $routes->add('mostrarCumples','CumpleaneroController::buscar');
    $routes->add('mostrarSucursal','CumpleaneroController::mostrarSucursal');
});


// Definiendo grupos para los de tipo Admin
$routes->group('config', ['namespace' => 'App\Controllers\Configuracion', 'filter' => 'Admin'], function ($routes) {
    // CONFIGURACIONES
    // 1. Tipo de Documento
    $routes->get('tipodocumento', 'ModulosController::tipodocumento');
    $routes->get('buscar', 'DocumentosController::buscar');
    $routes->add('almacenar', 'DocumentosController::almacenar');
    $routes->add('actualizar', 'DocumentosController::actualizar');
    $routes->add('obtenerId', 'DocumentosController::obtenerId');
    $routes->add('eliminar', 'DocumentosController::eliminar');

    // 2. Intereses o Gustos
    $routes->get('intereses', 'ModulosController::intereses');
    $routes->get('buscarInteres', 'InteresesController::buscar');
    $routes->add('almacenarInteres', 'InteresesController::almacenar');
    $routes->add('actualizarInteres', 'InteresesController::actualizar');
    $routes->add('obtenerInteresId', 'InteresesController::obtenerId');
    $routes->add('eliminarInteres', 'InteresesController::eliminar');

    // 3. Profesiones
    $routes->get('profesiones', 'ModulosController::profesiones');
    $routes->get('buscarProfesion', 'ProfesionesController::buscar');
    $routes->add('almacenarProfesion', 'ProfesionesController::almacenar');
    $routes->add('actualizarProfesion', 'ProfesionesController::actualizar');
    $routes->add('obtenerProfesionId', 'ProfesionesController::obtenerId');
    $routes->add('eliminarProfesion', 'ProfesionesController::eliminar');

    // 4. Medios Conocer
    $routes->get('mediosconocer', 'ModulosController::mediosconocer');
    $routes->post('buscarMedio', 'MediosConocerController::buscar');
    $routes->add('almacenarConocer', 'MediosConocerController::almacenar');
    $routes->add('actualizarMediosConocer', 'MediosConocerController::actualizar');
    $routes->add('obtenerIdConocer', 'MediosConocerController::obtenerId');
    $routes->add('eliminarMediosConocer', 'MediosConocerController::eliminar');

    // 5. Franja Horario
    $routes->get('franjahorario', 'ModulosController::franjahorario');
    $routes->get('buscarFranjaH', 'FranjaHorarioController::buscar');
    $routes->add('almacenarFranja', 'FranjaHorarioController::almacenar');
    $routes->add('actualizarFranja', 'FranjaHorarioController::actualizar');
    $routes->add('obtenerIdFranja', 'FranjaHorarioController::obtenerId');
    $routes->add('eliminarFranja', 'FranjaHorarioController::eliminar');

    // 6. Personas
    $routes->get('personas', 'ModulosController::personas');
    $routes->get('mostrarPersonas', 'PersonasController::buscar');
    $routes->add('almacenarPersonas', 'PersonasController::almacenar');
    $routes->add('eliminarPersonas', 'PersonasController::eliminar');
    $routes->add('obtenerPersonasId', 'PersonasController::obtenerId');
    $routes->add('actualizarPersona', 'PersonasController::actualizar');
    $routes->get('mostraMunicipios', 'PersonasController::municipios');

    // 7. Usuarios
    $routes->get('usuarios', 'ModulosController::usuarios');
    $routes->get('mostrarUsuarios', 'UsuariosController::buscar');
    $routes->add('eliminarUsuario', 'UsuariosController::eliminar');
    $routes->get('mostrarPersona', 'UsuariosController::persona');
    $routes->get('mostrarRol', 'UsuariosController::rol');
    $routes->add('almacenarUsuarios', 'UsuariosController::almacenar');
    $routes->add('obtenerUsuarioId', 'UsuariosController::obtenerId');
    $routes->add('actualizarUsuario', 'UsuariosController::actualizar');

    // 8. Tipo de Contacto
    $routes->get('tipocontacto', 'ModulosController::tipocontacto');
    $routes->get('lookup', 'ContactosController::lookup');
    $routes->add('create', 'ContactosController::create');
    $routes->add('update', 'ContactosController::update');
    $routes->add('getId', 'ContactosController::getId');
    $routes->add('delete', 'ContactosController::delete');

    // 9. Tipo de Cargo
    $routes->get('cargo', 'ModulosController::cargo');
    $routes->get('buscarCargo', 'CargoController::buscarCargo');
    $routes->add('almacenarCargo', 'CargoController::almacenarCargo');
    $routes->add('actualizarCargo', 'CargoController::actualizarCargo');
    $routes->add('getCargoId', 'CargoController::getCargoId');
    $routes->add('borrarCargo', 'CargoController::borrarCargo');

    // 10. Rol de Usuario
    $routes->get('rol', 'ModulosController::rol');
    $routes->get('buscarRol', 'RolesController::buscarRol');
    $routes->add('almacenarRol', 'RolesController::almacenarRol');
    $routes->add('actualizarRol', 'RolesController::actualizarRol');
    $routes->add('obtenerRolId', 'RolesController::obtenerRolId');
    $routes->add('eliminarRol', 'RolesController::eliminarRol');

    // 11. Empleado
    $routes->get('empleado', 'ModulosController::empleado');
    $routes->get('buscarEmpleado', 'EmpleadosController::buscarEmpleado');
    $routes->add('almacenarEmpleado', 'EmpleadosController::almacenarEmpleado');
    $routes->add('actualizarEmpleado', 'EmpleadosController::actualizarEmpleado');
    $routes->add('obtenerEmpleadoId', 'EmpleadosController::obtenerEmpleadoId');
    $routes->add('eliminarEmpleado', 'EmpleadosController::eliminarEmpleado');
    $routes->get('mostrarNombreEmpleado','EmpleadosController::mostrarNombreEmpleado');
    $routes->get('mostrarNombreCargo','EmpleadosController::mostrarNombreCargo');
    $routes->get('buscarJoin','EmpleadosController::buscarJoin');

    // 12. Profesión Empleado
    $routes->post('buscarProfesion', 'EmpleadosProfesionController::buscar');
    $routes->add('almacenarEmpleadoProfesion', 'EmpleadosProfesionController::almacenar');
    $routes->add('actualizarEmpleadoProfesion', 'EmpleadosProfesionController::actualizar');
    $routes->add('obtenerEmpleadoProfesionId', 'EmpleadosProfesionController::obtenerId');
    $routes->add('eliminarEmpleadoProfesion', 'EmpleadosProfesionController::eliminar');
    $routes->get('mostrarNombreEmpleado','EmpleadosProfesionController::NombreEmpleado');
    $routes->get('mostrarProfesion','EmpleadosProfesionController::NombreProfesion');

    // 13. Sucursal Empleado
    $routes->post('buscarSucursal', 'EmpleadoSucursalController::buscar');
    $routes->add('almacenarEmpleadoSucursal', 'EmpleadoSucursalController::almacenar');
    $routes->add('actualizarEmpleadoSucursal', 'EmpleadoSucursalController::actualizar');
    $routes->add('obtenerEmpleadoSucursalId', 'EmpleadoSucursalController::obtenerId');
    $routes->add('eliminarEmpleadoSucursal', 'EmpleadoSucursalController::eliminar');
    $routes->get('mostrarNombreEmpleado','EmpleadoSucursalController::mostrarSucEmpleado');
    $routes->get('mostrarSucursal','EmpleadoSucursalController::mostrarSucursal');


    // 14. Documentos
    $routes->add('mostrarDocumento', 'DocPersonaController::mostrar');
    $routes->get('mostrarTipoDoc', 'DocPersonaController::TipoDoc');
    $routes->add('agregarTipoDoc', 'DocPersonaController::almacenar');
    $routes->add('obtenerDocumentoId', 'DocPersonaController::obtenerId');
    $routes->add('actualizarTipoDoc', 'DocPersonaController::actualizar');
    $routes->add('eliminarDoc', 'DocPersonaController::eliminar');

    // 15. Contactos
    $routes->add('mostrarContactos', 'ContPersonasController::mostrar');
    $routes->get('mostrarTipoCont', 'ContPersonasController::TipoContacto');
    $routes->add('agregarTipoContacto', 'ContPersonasController::almacenar');
    $routes->add('eliminarContacto', 'ContPersonasController::eliminar');
    $routes->add('obtenerContactoId', 'ContPersonasController::obtenerId');
    $routes->add('actualizarTipoContacto', 'ContPersonasController::actualizar');

    // 16. Usuarios
    $routes->get('usuarios', 'ModulosController::usuarios');
    $routes->get('mostrarUsuarios', 'UsuariosController::buscar');
    $routes->add('eliminarUsuario', 'UsuariosController::eliminar');
    $routes->get('mostrarPersona', 'UsuariosController::persona');
    $routes->get('mostrarRol', 'UsuariosController::rol');
    $routes->add('almacenarUsuarios', 'UsuariosController::almacenar');
    $routes->add('obtenerUsuarioId', 'UsuariosController::obtenerId');
    $routes->add('actualizarUsuario', 'UsuariosController::actualizar');
    $routes->add('verificarNombreUsuario', 'UsuariosController::verificarUsuario');

    // 17. Proveedores
    $routes->get('proveedor', 'ModulosController::proveedor');
    $routes->get('buscarProveedor', 'ProveedoresController::buscar');
    $routes->add('almacenarProveedor', 'ProveedoresController::almacenar');
    $routes->add('actualizarProveedor', 'ProveedoresController::actualizar');
    $routes->add('obtenerProveedorId', 'ProveedoresController::obtenerId');
    $routes->add('eliminarProveedor', 'ProveedoresController::eliminar');
    $routes->get('NombreProveedor','ProveedoresController::selectProveedor');

    // 18. Medicamentos
    $routes->get('medicamento', 'ModulosController::medicamento');
    $routes->get('buscarMedicamento', 'MedicamentosController::buscar');
    $routes->add('almacenarMedicamento', 'MedicamentosController::almacenar');
    $routes->add('actualizarMedicamento', 'MedicamentosController::actualizar');
    $routes->add('obtenerMedicamentoId', 'MedicamentosController::obtenerId');
    $routes->add('eliminarMedicamento', 'MedicamentosController::eliminar');

     // 19. Conversiones
     $routes->get('conversion', 'ModulosController::conversion');
     $routes->get('buscarConversion', 'ConversionesController::buscar');
     $routes->add('almacenarConversion', 'ConversionesController::almacenar');
     $routes->add('actualizarConversion', 'ConversionesController::actualizar');
     $routes->add('obtenerConversionId', 'ConversionesController::obtenerId');
     $routes->add('eliminarConversion', 'ConversionesController::eliminar');
     $routes->get('NombreUnidad','ConversionesController::selectUnidad');
     $routes->get('NombreInsumo','ConversionesController::selectInsumo');
});








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
