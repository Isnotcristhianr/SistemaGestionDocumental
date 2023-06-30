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
$routes->get('/', 'Home::index');

//Rutas Sistema 
$routes->get('/index', 'ControladorIndex::index');
$routes->get('/inicio', 'ControladorMain::inicio');

//Rutas Datos Estadisticos
$routes->get('/FiltroEstadistico/(:any)', 'ControladorEstadistico::filtroEstadistico/$1');
$routes->get('/BuscarFiltroEstadistico/(:any)/(:any)', 'ControladorEstadistico::BuscarFiltroEstadistico/$1/$2');

//Datos Estadisticos Grado
$routes->get('/FiltroEstadisticoGrado', 'ControladorEstadistico::filtroEstadisticoGrad');
$routes->get('/FiltroEstadisticoGradoBusqueda/(:any)/(:any)', 'ControladorEstadistico::filtroEstadisticoGradoBusqueda/$1/$2');
/* Periodos */ $routes->get('/FiltroEstadisticoGradoPeriodo/(:any)', 'ControladorFEPeriodo::filtroEstadisticoGradoPeriodo/$1');
/* Escuelas */ $routes->get('/FiltroEstadisticoGradoEscuela/(:any)', 'ControladorFEEscuela::filtroEstadisticoGradoEscuela/$1');

//Datos Estadisticos Posgrado
$routes->get('/FiltroEstadisticoPosgrado', 'ControladorEstadistico::filtroEstadisticoPosgrado');
$routes->get('/FiltroEstadisticoPosgradoBusqueda/(:any)/(:any)', 'ControladorEstadistico::filtroEstadisticoPosgradoBusqueda/$1/$2');
/* Periodos */ $routes->get('/FiltroEstadisticoPosgradoPeriodo/(:any)', 'ControladorFEPeriodo::filtroEstadisticoPosgradoPeriodo/$1');
/* Escuelas */ $routes->get('/FiltroEstadisticoPosgradoEscuela/(:any)', 'ControladorFEEscuela::filtroEstadisticoPosgradoEscuela/$1');

//Datos Estadisticos Tecnologias
$routes->get('/FiltroEstadisticoTecnologia', 'ControladorEstadistico::filtroEstadisticoTecnologia');
$routes->get('/FiltroEstadisticoTecnologiaBusqueda/(:any)/(:any)', 'ControladorEstadistico::filtroEstadisticoTecnologiaBusqueda/$1/$2');
/* Periodos */
$routes->get('/FiltroEstadisticoTecnologiaPeriodo/(:any)', 'ControladorFEPeriodo::filtroEstadisticoTecnologiaPeriodo/$1');

//Datos Estadisticos Historico Puce-I
$routes->get('/deHistorico', 'ControladorHistorico::dehistorico');

//Reportes
$routes->get('/reporteTitulacion', 'ControladorReportes::reportes');

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
