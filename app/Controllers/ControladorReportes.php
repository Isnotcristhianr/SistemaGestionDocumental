<?php

namespace App\Controllers;

use App\Models\modelRepTitulacion;
use App\Models\ModelMatrizGraduados;
use App\Models\ModelFEPeriodo;

class ControladorReportes extends BaseController
{

    //Datos Estadisticos Grado
    public function reportes()
    {
        try {

            //modelo 
            $objRepTit = new modelRepTitulacion();
            //periodos
            $data['tbl_periodo'] = $objRepTit->findAll();

            return view('header') . view('/vistaReportes/vista_respTitulacion', $data) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //! Datos Estadisticos Grado
    //Reporte General Matriculados
    public function reporteGeneralMatriculados()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') . view('/graficasEstadisticas/grado/vistaGradGenMatr', $datos + $datos2) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte General Graduados
    public function reporteGeneralGraduados()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') . view('/graficasEstadisticas/grado/vistaGradGenGrad', $datos + $datos2) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte General
    public function reporteGeneral()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') . view('/graficasEstadisticas/grado/vistaGradGen', $datos + $datos2) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha General
    public function reporteFechaGeneral()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

            return view('header') . view('/graficasEstadisticas/grado/fechas/vistaGradFecha', $datos) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha General Busqueda
    public function ReporteFechaGeneralBusqueda()
    {
        try {
            //capturamos las fechas
            $fechaInicio = $this->request->getGet('fechaInicio');
            $fechaFin = $this->request->getGet('fechaFin');

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModeloEspecifico($fechaInicio, $fechaFin);
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            //fechas
            $fechas = ["fechaInicio" => $fechaInicio, "fechaFin" => $fechaFin];

            return view('header') . view('/graficasEstadisticas/grado/fechas/vistaGradFechaBusqueda', $datos + $datos2 + $fechas) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Matriculados
    public function reporteFechaMatriculados()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

            return view('header') . view('/graficasEstadisticas/grado/fechas/vistaGradFechaMatr', $datos) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Matriculados Busqueda
    public function ReporteFechaMatriculadosBusqueda()
    {
        try {

            //capturamos las fechas
            $fechaInicio = $this->request->getGet('fechaInicio');
            $fechaFin = $this->request->getGet('fechaFin');

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModeloEspecifico($fechaInicio, $fechaFin);
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            //fechas
            $fechas = ["fechaInicio" => $fechaInicio, "fechaFin" => $fechaFin];

            return view('header') . view('/graficasEstadisticas/grado/fechas/vistaGradFechaMatrBusqueda', $datos + $datos2 + $fechas) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Graduados
    public function reporteFechaGraduados()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

            return view('header') . view('/graficasEstadisticas/grado/fechas/vistaGradFechaGrad', $datos) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Graduados Busqueda
    public function ReporteFechaGraduadosBusqueda()
    {
        try {

            //capturamos las fechas
            $fechaInicio = $this->request->getGet('fechaInicio');
            $fechaFin = $this->request->getGet('fechaFin');

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModeloEspecifico($fechaInicio, $fechaFin);
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            //fechas
            $fechas = ["fechaInicio" => $fechaInicio, "fechaFin" => $fechaFin];

            return view('header') . view('/graficasEstadisticas/grado/fechas/vistaGradFechaGradBusqueda', $datos + $datos2 + $fechas) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //! Datos Estadisticos Posgrado
    //Reporte General	
    public function reporteGeneralPosgrado()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') . view('/graficasEstadisticas/posgrado/vistaPosGen', $datos + $datos2) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte General Matriculados
    public function reporteGeneralMatriculadosPosgrado()
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') . view('/graficasEstadisticas/posgrado/vistaPosGenMatr', $datos + $datos2) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte General Graduados
    public function reporteGeneralGraduadosPosgrado()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') . view('/graficasEstadisticas/posgrado/vistaPosGenGrad', $datos + $datos2) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha General
    public function reporteFechaGeneralPosgrado()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

            return view('header') . view('/graficasEstadisticas/posgrado/fechas/vistaPosFecha', $datos) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha General Busqueda
    public function ReporteFechaGeneralPosgradoBusqueda()
    {
        try {

            //capturamos las fechas
            $fechaInicio = $this->request->getGet('fechaInicio');
            $fechaFin = $this->request->getGet('fechaFin');

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModeloEspecifico($fechaInicio, $fechaFin);
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            //fechas
            $fechas = ["fechaInicio" => $fechaInicio, "fechaFin" => $fechaFin];

            return view('header') . view('/graficasEstadisticas/posgrado/fechas/vistaPosFechaBusqueda', $datos + $datos2 + $fechas) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Matriculados
    public function reporteFechaMatriculadosPosgrado()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

            return view('header') . view('/graficasEstadisticas/posgrado/fechas/vistaPosFechaMatr', $datos) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Matriculados Busqueda
    public function ReporteFechaMatriculadosPosgradoBusqueda()
    {
        try {

            //capturamos las fechas
            $fechaInicio = $this->request->getGet('fechaInicio');
            $fechaFin = $this->request->getGet('fechaFin');

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModeloEspecifico($fechaInicio, $fechaFin);
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            //fechas
            $fechas = ["fechaInicio" => $fechaInicio, "fechaFin" => $fechaFin];

            return view('header') . view('/graficasEstadisticas/posgrado/fechas/vistaPosFechaMatrBusqueda', $datos + $datos2 + $fechas) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Graduados
    public function reporteFechaGraduadosPosgrado()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

            return view('header') . view('/graficasEstadisticas/posgrado/fechas/vistaPosFechaGrad', $datos) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Graduados Busqueda
    public function ReporteFechaGraduadosPosgradoBusqueda()
    {
        try {

            //capturamos las fechas
            $fechaInicio = $this->request->getGet('fechaInicio');
            $fechaFin = $this->request->getGet('fechaFin');

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModeloEspecifico($fechaInicio, $fechaFin);
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            //fechas
            $fechas = ["fechaInicio" => $fechaInicio, "fechaFin" => $fechaFin];

            return view('header') . view('/graficasEstadisticas/posgrado/fechas/vistaPosFechaGradBusqueda', $datos + $datos2 + $fechas) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //! Datos Estadisticos Tecnologia
    //Reporte General
    public function reporteGeneralTecnologia()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') . view('/graficasEstadisticas/tecnologia/vistaTecGen', $datos + $datos2) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte General Matriculados
    public function reporteGeneralMatriculadosTecnologia()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') . view('/graficasEstadisticas/tecnologia/vistaTecGenMatr', $datos + $datos2) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte General Graduados
    public function reporteGeneralGraduadosTecnologia()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') . view('/graficasEstadisticas/tecnologia/vistaTecGenGrad', $datos + $datos2) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha General
    public function reporteFechaGeneralTecnologia()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

            return view('header') . view('/graficasEstadisticas/tecnologia/fechas/vistaTecFecha', $datos) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha General Busqueda
    public function reporteFechaGeneralTecnologiaBusqueda()
    {
        try {

            //capturamos las fechas
            $fechaInicio = $this->request->getGet('fechaInicio');
            $fechaFin = $this->request->getGet('fechaFin');

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModeloEspecifico($fechaInicio, $fechaFin);
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            //fechas
            $fechas = ["fechaInicio" => $fechaInicio, "fechaFin" => $fechaFin];

            return view('header') . view('/graficasEstadisticas/tecnologia/fechas/vistaTecFechaBusqueda', $datos + $datos2 + $fechas) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Matriculados
    public function reporteFechaMatriculadosTecnologia()
    {
        try{

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
    
            return view('header') . view('/graficasEstadisticas/tecnologia/fechas/vistaTecFechaMatr', $datos) . view('footer');
        }catch(\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Matriculados Busqueda
    public function reporteFechaMatriculadosTecnologiaBusqueda()
    {
        try{

            //capturamos las fechas
            $fechaInicio = $this->request->getGet('fechaInicio');
            $fechaFin = $this->request->getGet('fechaFin');
    
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModeloEspecifico($fechaInicio, $fechaFin);
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
    
            //fechas
            $fechas = ["fechaInicio" => $fechaInicio, "fechaFin" => $fechaFin];
    
            return view('header') . view('/graficasEstadisticas/tecnologia/fechas/vistaTecFechaMatrBusqueda', $datos + $datos2 + $fechas) . view('footer');
        }catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Graduados
    public function reporteFechaGraduadosTecnologia()
    {
        try{

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            return view('header') . view('/graficasEstadisticas/tecnologia/fechas/vistaTecFechaGrad', $datos) . view('footer');
        }catch(\Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte Fecha Graduados Busqueda
    public function reporteFechaGraduadosTecnologiaBusqueda()
    {

        try{

            //capturamos las fechas
            $fechaInicio = $this->request->getGet('fechaInicio');
            $fechaFin = $this->request->getGet('fechaFin');
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModeloEspecifico($fechaInicio, $fechaFin);
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //fechas
            $fechas = ["fechaInicio" => $fechaInicio, "fechaFin" => $fechaFin];
            return view('header') . view('/graficasEstadisticas/tecnologia/fechas/vistaTecFechaGradBusqueda', $datos + $datos2 + $fechas) . view('footer');
        }catch(\Exception $e) {
            die($e->getMessage());
        }
        
    }
}
