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
//TODO Reporte Escuela General Vigente
$routes->get('/ReporteEscuelaGeneralVigente/(:any)', 'ControladorFEEscuela::reporteEscuelaGeneralVigente/$1/');
//TODO Reporte Escuela General Historico
$routes->get('/ReporteEscuelaGeneralHistorico/(:any)', 'ControladorFEEscuela::reporteEscuelaGeneralHistorico/$1/');
//TODO Reporte Escuela General Tulcan
$routes->get('/ReporteEscuelaGeneralTulcan/(:any)', 'ControladorFEEscuela::reporteEscuelaGeneralTulcan/$1/');
//TODO Reporte Escuela Matriculados Vigente
$routes->get('/ReporteEscuelaMatriculadosVigente/(:any)', 'ControladorFEEscuela::reporteEscuelaMatriculadosVigente/$1/');
//Todo Reporte Escuela Matriculados Historico
$routes->get('/ReporteEscuelaMatriculadosHistorico/(:any)', 'ControladorFEEscuela::reporteEscuelaMatriculadosHistorico/$1/');
//Todo Reporte Escuela Matriculados Tulcan
$routes->get('/ReporteEscuelaMatriculadosTulcan/(:any)', 'ControladorFEEscuela::reporteEscuelaMatriculadosTulcan/$1/');
//Todo Reporte Escuela Graduados Vigente
$routes->get('/ReporteEscuelaGraduadosVigente/(:any)', 'ControladorFEEscuela::reporteEscuelaGraduadosVigente/$1/');
//Todo Reporte Escuela Graduados Historico
$routes->get('/ReporteEscuelaGraduadosHistorico/(:any)', 'ControladorFEEscuela::reporteEscuelaGraduadosHistorico/$1/');
//Todo Reporte Escuela Graduados Tulcan
$routes->get('/ReporteEscuelaGraduadosTulcan/(:any)', 'ControladorFEEscuela::reporteEscuelaGraduadosTulcan/$1/');
//*Selector Reporte Escuela Grado 
$routes->get('/SelectorReporteEscuelaGrad/(:any)', 'ControllerSelector::selectorReporteEscuelaGrad/$1/');
//* Selector Reporte Escuela Grado matriculados
$routes->get('/SelectorReporteEscuelaGradMatriculados/(:any)', 'ControllerSelector::selectorReporteEscuelaGradMatriculados/$1/');
//* Selector Reporte Escuela Grado graduados
$routes->get('/SelectorReporteEscuelaGradGraduados/(:any)', 'ControllerSelector::selectorReporteEscuelaGradGraduados/$1/');
//*Selector Reporte Carrera Grado
$routes->get('/SelectorReporteCarreraGrad/(:any)', 'ControllerSelector::selectorReporteCarreraGrad/$1/');
//*Selector Reporte Carrera Grado Matriculados
$routes->get('/SelectorReporteCarreraGradMatriculados/(:any)', 'ControllerSelector::selectorReporteCarreraGradMatriculados/$1/');
//*Selector Reporte Carrera Grado Graduados
$routes->get('/SelectorReporteCarreraGradGraduados/(:any)', 'ControllerSelector::selectorReporteCarreraGradGraduados/$1/');
//*Selector Reporte Periodo General
$routes->get('/SelectorReportePeriodoGeneral/(:any)', 'ControllerSelector::selectorReportePeriodoGeneral/$1/');
//*Selector Reporte Periodo Matriculados
$routes->get('/SelectorReportePeriodoMatriculados/(:any)', 'ControllerSelector::selectorReportePeriodoMatriculados/$1/');
//*Selector Reporte Periodo Graduados
$routes->get('/SelectorReportePeriodoGraduados/(:any)', 'ControllerSelector::selectorReportePeriodoGraduados/$1/');

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
//Todo Reporte Posgrado Escuela General Vigente
$routes->get('/ReportePosgradoEscuelaGeneralVigente/(:any)', 'ControladorFEEscuela::reportePosgradoEscuelaGeneralVigente/$1/');
//Todo Reporte Posgrado Escuela General Historico
$routes->get('/ReportePosgradoEscuelaGeneralHistorico/(:any)', 'ControladorFEEscuela::reportePosgradoEscuelaGeneralHistorico/$1/');
//Todo Reporte Posgrado Escuela Matriculados Vigente
$routes->get('/ReportePosgradoEscuelaMatriculadosVigente/(:any)', 'ControladorFEEscuela::reportePosgradoEscuelaMatriculadosVigente/$1/');
//Todo Reporte Posgrado Escuela Matriculados Historico
$routes->get('/ReportePosgradoEscuelaMatriculadosHistorico/(:any)', 'ControladorFEEscuela::reportePosgradoEscuelaMatriculadosHistorico/$1/');
//Todo Reporte Posgrado Escuela Graduados Vigente
$routes->get('/ReportePosgradoEscuelaGraduadosVigente/(:any)', 'ControladorFEEscuela::reportePosgradoEscuelaGraduadosVigente/$1/');
//Todo Reporte Posgrado Escuela Graduados Historico
$routes->get('/ReportePosgradoEscuelaGraduadosHistorico/(:any)', 'ControladorFEEscuela::reportePosgradoEscuelaGraduadosHistorico/$1/');
//*Selector Escuela Posgrado General
$routes->get('/SelectorReporteEscuelaPosgrado/(:any)', 'ControllerSelector::selectorReporteEscuelaPosgrado/$1/');
//* Selector Escuela Posgrado Matriculados
$routes->get('/SelectorReporteEscuelaPosgradoMatriculados/(:any)', 'ControllerSelector::selectorReporteEscuelaPosgradoMatriculados/$1/');
//* Selector Escuela Posgrado Graduados
$routes->get('/SelectorReporteEscuelaPosgradoGraduados/(:any)', 'ControllerSelector::selectorReporteEscuelaPosgradoGraduados/$1/');
//*Selector Reporte Carrera Posgrado
$routes->get('/SelectorReporteCarreraPosgrado/(:any)', 'ControllerSelector::selectorReporteCarreraPosgrado/$1/');
//*Selector Reporte Carrera Posgrado Matriculados
$routes->get('/SelectorReporteCarreraPosgradoMatriculados/(:any)', 'ControllerSelector::selectorReporteCarreraPosgradoMatriculados/$1/');
//*Selector Reporte Carrera Posgrado Graduados
$routes->get('/SelectorReporteCarreraPosgradoGraduados/(:any)', 'ControllerSelector::selectorReporteCarreraPosgradoGraduados/$1/');
//*Selector Reporte Periodo Posgrado General
$routes->get('/SelectorReportePeriodoPosgradoGeneral/(:any)', 'ControllerSelector::selectorReportePeriodoPosgradoGeneral/$1/');
//*Selector Reporte Periodo Posgrado Matriculados
$routes->get('/SelectorReportePeriodoPosgradoMatriculados/(:any)', 'ControllerSelector::selectorReportePeriodoPosgradoMatriculados/$1/');
//*Selector Reporte Periodo Posgrado Graduados
$routes->get('/SelectorReportePeriodoPosgradoGraduados/(:any)', 'ControllerSelector::selectorReportePeriodoPosgradoGraduados/$1/');

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
//*Selector Reporte Carrera Tecnologia
$routes->get('/SelectorReporteCarreraTecnologia/(:any)', 'ControllerSelector::selectorReporteCarreraTecnologia/$1/');
//*Selector Reporte Carrera Tecnologia Matriculados
$routes->get('/SelectorReporteCarreraTecnologiaMatriculados/(:any)', 'ControllerSelector::selectorReporteCarreraTecnologiaMatriculados/$1/');
//*Selector Reporte Carrera Tecnologia Graduados
$routes->get('/SelectorReporteCarreraTecnologiaGraduados/(:any)', 'ControllerSelector::selectorReporteCarreraTecnologiaGraduados/$1/');
//*Selector Reporte Periodo Tecnologia General
$routes->get('/SelectorReportePeriodoTecnologiaGeneral/(:any)', 'ControllerSelector::selectorReportePeriodoTecnologiaGeneral/$1/');
//*Selector Reporte Periodo Tecnologia Matriculados
$routes->get('/SelectorReportePeriodoTecnologiaMatriculados/(:any)', 'ControllerSelector::selectorReportePeriodoTecnologiaMatriculados/$1/');
//*Selector Reporte Periodo Tecnologia Graduados
$routes->get('/SelectorReportePeriodoTecnologiaGraduados/(:any)', 'ControllerSelector::selectorReportePeriodoTecnologiaGraduados/$1/');

//? Datos Estadisticos Historico Puce-I
$routes->get('/deHistorico', 'ControladorHistorico::dehistorico');
$routes->get('/busquedaHistorico', 'ControladorHistorico::busquedaHistorico');
$routes->get('/busquedaHistoricoEspecifico', 'ControladorHistorico::busquedaHistoricoEspecifico');


//? Reportes
$routes->get('/reporteTitulacion', 'ControladorReportes::reportes');

//?Calendario Academico
$routes->get('/calendarioAcademico', 'ControladorCalendario::calendarioAcademico');
//calendario academico ver
$routes->get('/calendarios/ver/(:any)', 'ControladorCalendario::ver/$1');
//ver carpeta periodo
$routes->get('/calendarioAcademico/verPeriodo/(:any)', 'ControladorCalendario::verPeriodo/$1');
//descargar archivo
$routes->get('/calendarioAcademico/descargar/(:any)/(:any)/(:any)', 'ControladorCalendario::descargar/$1/$2/$3');
//ver pdf
$routes->get('/calendarioAcademico/verPdf/(:any)/(:any)/(:any)', 'ControladorCalendario::verPdf/$1/$2/$3');
//editar calendario academico
$routes->get('/calendarioAcademico/editar/(:any)/(:any)', 'ControladorCalendario::editar/$1/$2');
//insertar calendario academico
$routes->post('/calendarioAcademico/insertar/(:any)', 'ControladorCalendario::insertar/$1');
//eliminar calendario academico
$routes->get('/calendarioAcademico/eliminar/(:any)/(:any)/(:any)', 'ControladorCalendario::eliminar/$1/$2/$3');
//editar calendario academico
$routes->post('/calendarioAcademico/editar/(:any)/(:any)/(:any)', 'ControladorCalendario::editar/$1/$2/$3');
//crear carpeta
$routes->post('/calendarioAcademico/crearCarpeta/(:any)', 'ControladorCalendario::crearCarpeta/$1');
//eliminar carpeta
$routes->get('/calendarioAcademico/eliminarCarpeta/(:any)/(:any)', 'ControladorCalendario::eliminarCarpeta/$1/$2');
//descargar zip carpeta
$routes->get('/calendarioAcademico/descargarZipCarpeta/(:any)/(:any)', 'ControladorCalendario::descargarZipCarpeta/$1/$2');

//?Normativas
//reglamento general estudiantes
$routes->get('/normativas/reglamentoGeneralEstudiantes', 'ControladorNormativas::reglamentoGeneralEstudiantes');
//crear directorio
$routes->post('/normativas/crearDirectorio', 'ControladorNormativas::crearDirectorio');
//eliminar directorio
$routes->get('/normativas/eliminarDirectorio/(:any)', 'ControladorNormativas::eliminarDirectorio/$1');
//descargar pdf
$routes->get('/normativas/descargarPdf/(:any)', 'ControladorNormativas::descargarPdf/$1');
//descargar carpeta comprimida
$routes->get('/normativas/descargarCarpetaComprimida/(:any)', 'ControladorNormativas::descargarCarpetaComprimida/$1');
//editar carpeta
$routes->post('/normativas/editarCarpeta/(:any)', 'ControladorNormativas::editarCarpeta/$1');
//verCarpetaEspecifica
$routes->get('/normativas/verCarpetaEspecifica/(:any)', 'ControladorNormativas::verCarpetaEspecifica/$1');
//ve archivo especifico
$routes->get('/normativas/verArchivoEspecifico/(:any)/(:any)', 'ControladorNormativas::verArchivoEspecifico/$1/$2');
//subir archivo especifico
$routes->post('/normativas/subirArchivoEspecifico', 'ControladorNormativas::subirArchivoEspecifico');
//descargar archivo especifico
$routes->get('/normativas/descargarArchivoEspecifico/(:any)/(:any)', 'ControladorNormativas::descargarArchivoEspecifico/$1/$2');
//eliminar archivo especifico
$routes->get('/normativas/eliminarArchivoEspecifico/(:any)/(:any)', 'ControladorNormativas::eliminarArchivoEspecifico/$1/$2');
//editar archivo especifico
$routes->post('/normativas/editarArchivoEspecifico/(:any)/(:any)', 'ControladorNormativas::editarArchivoEspecifico/$1/$2');


//? Subida de Datos
//menu
$routes->get('/subidaDatos', 'ControladorSubidaDatos::subidaDatos');
//subir manual
$routes->get('/subidaDatos/manualmente', 'ControladorSubidaDatos::subirManualmente');
//  
$routes->post('/subidaDatos/enviarManualmente', 'ControladorSubidaDatos::enviarManualmente');
//crear periodo
$routes->post('/subidaDatos/crearPeriodo', 'ControladorFEPeriodo::crearPeriodo');
//crear carrera
$routes->post('/subidaDatos/crearCarrera', 'ControladorFECarrera::crearCarrera');
//ir crear perdiodo menu
$routes->get('/subidaDatos/irCrearPeriodo', 'ControladorFEPeriodo::irCrearPeriodo');
//crear periodo desde menu
$routes->post('/subidaDatos/crearPeriodoDesdeMenu', 'ControladorFEPeriodo::crearPeriodoDesdeMenu');
//ir crear carrera menu
$routes->get('/subidaDatos/irCrearCarrera', 'ControladorFECarrera::irCrearCarrera');
//crear carrera desde menu
$routes->post('/subidaDatos/crearCarreraDesdeMenu', 'ControladorFECarrera::crearCarreraDesdeMenu');
//ir crear escuela menu
$routes->get('/subidaDatos/irCrearEscuela', 'ControladorFECarrera::irCrearEscuela');
//crear escuela desde menu
$routes->post('/subidaDatos/crearEscuelaDesdeMenu', 'ControladorFECarrera::crearEscuelaDesdeMenu');

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
