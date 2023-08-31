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

//? Rutas Sistema 
$routes->get('/index', 'ControladorIndex::index');
$routes->get('/inicio', 'ControladorMain::inicio');

//? Rutas Datos Estadisticos
$routes->get('/FiltroEstadistico/(:any)', 'ControladorEstadistico::filtroEstadistico/$1');
$routes->get('/BuscarFiltroEstadistico/(:any)/(:any)', 'ControladorEstadistico::BuscarFiltroEstadistico/$1/$2');

//? Datos Estadisticos Grado
$routes->get('/FiltroEstadisticoGrado', 'ControladorEstadistico::filtroEstadisticoGrad');
/* Fechas */
$routes->get('/FiltroEstadisticoGradoBusqueda/(:any)/(:any)', 'ControladorEstadistico::filtroEstadisticoGradoBusqueda/$1/$2');
/* Periodos */
$routes->get('/FiltroEstadisticoGradoPeriodo/(:any)', 'ControladorFEPeriodo::filtroEstadisticoGradoPeriodo/$1');
/* Escuelas */
$routes->get('/FiltroEstadisticoGradoEscuela/(:any)', 'ControladorFEEscuela::filtroEstadisticoGradoEscuela/$1');
/* Carreras */
$routes->get('/FiltroEstadisticoGradoCarrera/(:any)', 'ControladorFECarrera::filtroEstadisticoGradoCarrera/$1');
/* Reporte General Matriculados */
$routes->get('/ReporteGeneralMatriculados', 'ControladorReportes::reporteGeneralMatriculados');
/* Reporte General Graduados*/
$routes->get('/ReporteGeneralGraduados', 'ControladorReportes::reporteGeneralGraduados');
/* Reporte General */
$routes->get('/ReporteGeneral', 'ControladorReportes::reporteGeneral');
/* Reporte Fecha General */
$routes->get('/ReporteFechaGeneral', 'ControladorReportes::reporteFechaGeneral');
/*Reporte Fecha General Busqueda */
$routes->get('/ReporteFechaGeneralBusqueda', 'ControladorReportes::reporteFechaGeneralBusqueda');
/* Reporte Fecha Matriculados */
$routes->get('/ReporteFechaMatriculados', 'ControladorReportes::reporteFechaMatriculados');
/* Reporte Fecha Matriculados Busqueda */
$routes->get('/ReporteFechaMatriculadosBusqueda', 'ControladorReportes::reporteFechaMatriculadosBusqueda');
/* Reporte Fecha Graduados */
$routes->get('/ReporteFechaGraduados', 'ControladorReportes::reporteFechaGraduados');
/* Reporte Fecha Graduados Busqueda */
$routes->get('/ReporteFechaGraduadosBusqueda', 'ControladorReportes::reporteFechaGraduadosBusqueda');
//* Reporte Grado Periodo General
$routes->get('/ReporteGradoPeriodoGeneral/(:any)', 'ControladorFEPeriodo::reporteGradoPeriodoGeneral/$1');
//* Reporte Grado Periodo Matriculados
$routes->get('/ReporteGradoPeriodoMatriculados/(:any)', 'ControladorFEPeriodo::reporteGradoPeriodoMatriculados/$1');
//* Reporte Grado Periodo Graduados
$routes->get('/ReporteGradoPeriodoGraduados/(:any)', 'ControladorFEPeriodo::reporteGradoPeriodoGraduados/$1');
//! Reporte Grado Carrera General
$routes->get('/ReporteGradoCarreraGeneral/(:any)', 'ControladorFECarrera::reporteGradoCarreraGeneral/$1');
//! Reporte Grado Carrera Matriculados
$routes->get('/ReporteGradoCarreraMatriculados/(:any)', 'ControladorFECarrera::reporteGradoCarreraMatriculados/$1');
//! Reporte Grado Carrera Graduados
$routes->get('/ReporteGradoCarreraGraduados/(:any)', 'ControladorFECarrera::reporteGradoCarreraGraduados/$1');

//? Datos Estadisticos Posgrado
$routes->get('/FiltroEstadisticoPosgrado', 'ControladorEstadistico::filtroEstadisticoPosgrado');
$routes->get('/FiltroEstadisticoPosgradoBusqueda/(:any)/(:any)', 'ControladorEstadistico::filtroEstadisticoPosgradoBusqueda/$1/$2');
/* Periodos */
$routes->get('/FiltroEstadisticoPosgradoPeriodo/(:any)', 'ControladorFEPeriodo::filtroEstadisticoPosgradoPeriodo/$1');
/* Escuelas */
$routes->get('/FiltroEstadisticoPosgradoEscuela/(:any)', 'ControladorFEEscuela::filtroEstadisticoPosgradoEscuela/$1');
/* Carreras */
$routes->get('/FiltroEstadisticoPosgradoCarrera/(:any)', 'ControladorFECarrera::filtroEstadisticoPosgradoCarrera/$1');
/* Reporte General */
$routes->get('/ReporteGeneralPosgrado', 'ControladorReportes::reporteGeneralPosgrado');
/* Reporte General Matriculados */
$routes->get('/ReporteGeneralMatriculadosPosgrado', 'ControladorReportes::reporteGeneralMatriculadosPosgrado');
/* Reporte General Graduados*/
$routes->get('/ReporteGeneralGraduadosPosgrado', 'ControladorReportes::reporteGeneralGraduadosPosgrado');
/* Reporte Fecha General */
$routes->get('/ReporteFechaGeneralPosgrado', 'ControladorReportes::reporteFechaGeneralPosgrado');
/* Reporte Fecha General Busqueda */
$routes->get('/ReporteFechaGeneralPosgradoBusqueda', 'ControladorReportes::reporteFechaGeneralPosgradoBusqueda');
/* Reporte Fecha Matriculados */
$routes->get('/ReporteFechaMatriculadosPosgrado', 'ControladorReportes::reporteFechaMatriculadosPosgrado');
/* Reporte Fecha Matriculados Busqueda */
$routes->get('/ReporteFechaMatriculadosPosgradoBusqueda', 'ControladorReportes::reporteFechaMatriculadosPosgradoBusqueda');
/* Reporte Fecha Graduados */
$routes->get('/ReporteFechaGraduadosPosgrado', 'ControladorReportes::reporteFechaGraduadosPosgrado');
/* Reporte Fecha Graduados Busqueda */
$routes->get('/ReporteFechaGraduadosPosgradoBusqueda', 'ControladorReportes::reporteFechaGraduadosPosgradoBusqueda');
//* Reporte Posgrado Periodo General
$routes->get('/ReportePosgradoPeriodoGeneral/(:any)', 'ControladorFEPeriodo::reportePosgradoPeriodoGeneral/$1');
//* Reporte Posgrado Periodo Matriculados
$routes->get('/ReportePosgradoPeriodoMatriculados/(:any)', 'ControladorFEPeriodo::reportePosgradoPeriodoMatriculados/$1');
//* Reporte Posgrado Periodo Graduados
$routes->get('/ReportePosgradoPeriodoGraduados/(:any)', 'ControladorFEPeriodo::reportePosgradoPeriodoGraduados/$1');
//! Reporte Posgrado Carrera General
$routes->get('/ReportePosgradoCarreraGeneral/(:any)', 'ControladorFECarrera::reportePosgradoCarreraGeneral/$1');
//! Reporte Posgrado Carrera Matriculados
$routes->get('/ReportePosgradoCarreraMatriculados/(:any)', 'ControladorFECarrera::reportePosgradoCarreraMatriculados/$1');
//! Reporte Posgrado Carrera Graduados
$routes->get('/ReportePosgradoCarreraGraduados/(:any)', 'ControladorFECarrera::reportePosgradoCarreraGraduados/$1');

//? Datos Estadisticos Tecnologias
$routes->get('/FiltroEstadisticoTecnologia', 'ControladorEstadistico::filtroEstadisticoTecnologia');
$routes->get('/FiltroEstadisticoTecnologiaBusqueda/(:any)/(:any)', 'ControladorEstadistico::filtroEstadisticoTecnologiaBusqueda/$1/$2');
/* Periodos */
$routes->get('/FiltroEstadisticoTecnologiaPeriodo/(:any)', 'ControladorFEPeriodo::filtroEstadisticoTecnologiaPeriodo/$1');
/*  Carreras Tecnologicas */
$routes->get('/FiltroEstadisticoTecnologiaCarrera/(:any)', 'ControladorFECarrera::filtroEstadisticoTecnologiaCarrera/$1');
/* Reporte General */
$routes->get('/ReporteGeneralTecnologia', 'ControladorReportes::reporteGeneralTecnologia');
/* Reporte  General Matriculados */
$routes->get('/ReporteGeneralMatriculadosTecnologia', 'ControladorReportes::reporteGeneralMatriculadosTecnologia');
/* Reporte General Graduados */
$routes->get('/ReporteGeneralGraduadosTecnologia', 'ControladorReportes::reporteGeneralGraduadosTecnologia');
/* Reporte Fecha General */
$routes->get('/ReporteFechaGeneralTecnologia', 'ControladorReportes::reporteFechaGeneralTecnologia');
/* Reporte Fecha General Busqueda */
$routes->get('/ReporteFechaGeneralTecnologiaBusqueda', 'ControladorReportes::reporteFechaGeneralTecnologiaBusqueda');
/* Reporte Fecha Matriculados */
$routes->get('/ReporteFechaMatriculadosTecnologia', 'ControladorReportes::reporteFechaMatriculadosTecnologia');
/* Reporte Fecha Matriculados Busqueda */
$routes->get('/ReporteFechaMatriculadosTecnologiaBusqueda', 'ControladorReportes::reporteFechaMatriculadosTecnologiaBusqueda');
/* Reporte Fecha Graduados */
$routes->get('/ReporteFechaGraduadosTecnologia', 'ControladorReportes::reporteFechaGraduadosTecnologia');
/* Reporte Fecha Graduados Busqueda */
$routes->get('/ReporteFechaGraduadosTecnologiaBusqueda', 'ControladorReportes::reporteFechaGraduadosTecnologiaBusqueda');
//* Reporte Tecnologia Periodo General
$routes->get('/ReporteTecnologiaPeriodoGeneral/(:any)', 'ControladorFEPeriodo::reporteTecnologiaPeriodoGeneral/$1');
//* Reporte Tecnologia Periodo Matriculados
$routes->get('/ReporteTecnologiaPeriodoMatriculados/(:any)', 'ControladorFEPeriodo::reporteTecnologiaPeriodoMatriculados/$1');
//* Reporte Tecnologia Periodo Graduados
$routes->get('/ReporteTecnologiaPeriodoGraduados/(:any)', 'ControladorFEPeriodo::reporteTecnologiaPeriodoGraduados/$1');
//! Reporte Tecnologia Carrera General
$routes->get('/ReporteTecnologiaCarreraGeneral/(:any)', 'ControladorFECarrera::reporteTecnologiaCarreraGeneral/$1');
//! Reporte Tecnologia Carrera Matriculados
$routes->get('/ReporteTecnologiaCarreraMatriculados/(:any)', 'ControladorFECarrera::reporteTecnologiaCarreraMatriculados/$1');
//! Reporte Tecnologia Carrera Graduados
$routes->get('/ReporteTecnologiaCarreraGraduados/(:any)', 'ControladorFECarrera::reporteTecnologiaCarreraGraduados/$1');

//? Datos Estadisticos Historico Puce-I
$routes->get('/deHistorico', 'ControladorHistorico::dehistorico');
$routes->get('/busquedaHistorico', 'ControladorHistorico::busquedaHistorico');
$routes->get('/busquedaHistoricoEspecifico', 'ControladorHistorico::busquedaHistoricoEspecifico');


//? Reportes
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
