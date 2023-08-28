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
        //modelo 
        $objRepTit = new modelRepTitulacion();
        //periodos
        $data['tbl_periodo'] = $objRepTit->findAll();

        return view('header') . view('/vistaReportes/vista_respTitulacion', $data) . view('footer');
    }

    //! Datos Estadisticos Grado
    //Reporte General Matriculados
    public function reporteGeneralMatriculados()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header') . view('/graficasEstadisticas/grado/vistaGradGenMatr', $datos + $datos2) . view('footer');
    }

    //Reporte General Graduados
    public function reporteGeneralGraduados()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header') . view('/graficasEstadisticas/grado/vistaGradGenGrad', $datos + $datos2) . view('footer');
    }

    //Reporte General
    public function reporteGeneral()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header') . view('/graficasEstadisticas/grado/vistaGradGen', $datos + $datos2) . view('footer');
    }

    //Reporte Fecha General
    public function reporteFechaGeneral()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

        return view('header') . view('/graficasEstadisticas/grado/fechas/vistaGradFecha', $datos) . view('footer');
    }

    //Reporte Fecha General Busqueda
    public function ReporteFechaGeneralBusqueda()
    {
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
    }

    //Reporte Fecha Matriculados
    public function reporteFechaMatriculados()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

        return view('header') . view('/graficasEstadisticas/grado/fechas/vistaGradFechaMatr', $datos) . view('footer');
    }

    //Reporte Fecha Matriculados Busqueda
    public function ReporteFechaMatriculadosBusqueda()
    {
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
    }

    //Reporte Fecha Graduados
    public function reporteFechaGraduados()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

        return view('header') . view('/graficasEstadisticas/grado/fechas/vistaGradFechaGrad', $datos) . view('footer');
    }

    //Reporte Fecha Graduados Busqueda
    public function ReporteFechaGraduadosBusqueda()
    {
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
    }

    //! Datos Estadisticos Posgrado
    //Reporte General	
    public function reporteGeneralPosgrado()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header') . view('/graficasEstadisticas/posgrado/vistaPosGen', $datos + $datos2) . view('footer');
    }

    //Reporte General Matriculados
    public function reporteGeneralMatriculadosPosgrado()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header') . view('/graficasEstadisticas/posgrado/vistaPosGenMatr', $datos + $datos2) . view('footer');
    }

    //Reporte General Graduados
    public function reporteGeneralGraduadosPosgrado()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header') . view('/graficasEstadisticas/posgrado/vistaPosGenGrad', $datos + $datos2) . view('footer');
    }

    //Reporte Fecha General
    public function reporteFechaGeneralPosgrado()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

        return view('header') . view('/graficasEstadisticas/posgrado/fechas/vistaPosFecha', $datos) . view('footer');
    }

    //Reporte Fecha General Busqueda
    public function ReporteFechaGeneralPosgradoBusqueda()
    {
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
    }

    //Reporte Fecha Matriculados
    public function reporteFechaMatriculadosPosgrado()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

        return view('header') . view('/graficasEstadisticas/posgrado/fechas/vistaPosFechaMatr', $datos) . view('footer');
    }

    //Reporte Fecha Matriculados Busqueda
    public function ReporteFechaMatriculadosPosgradoBusqueda()
    {
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
    }

    //Reporte Fecha Graduados
    public function reporteFechaGraduadosPosgrado()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

        return view('header') . view('/graficasEstadisticas/posgrado/fechas/vistaPosFechaGrad', $datos) . view('footer');
    }

    //Reporte Fecha Graduados Busqueda
    public function ReporteFechaGraduadosPosgradoBusqueda()
    {
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
    }

    //! Datos Estadisticos Tecnologia
    //Reporte General
    public function reporteGeneralTecnologia()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header') . view('/graficasEstadisticas/tecnologia/vistaTecGen', $datos + $datos2) . view('footer');
    }

    //Reporte General Matriculados
    public function reporteGeneralMatriculadosTecnologia()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header') . view('/graficasEstadisticas/tecnologia/vistaTecGenMatr', $datos + $datos2) . view('footer');
    }

    //Reporte General Graduados
    public function reporteGeneralGraduadosTecnologia()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header') . view('/graficasEstadisticas/tecnologia/vistaTecGenGrad', $datos + $datos2) . view('footer');
    }

    //Reporte Fecha General
    public function reporteFechaGeneralTecnologia()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

        return view('header') . view('/graficasEstadisticas/tecnologia/fechas/vistaTecFecha', $datos) . view('footer');
    }

    //Reporte Fecha General Busqueda
    public function reporteFechaGeneralTecnologiaBusqueda()
    {
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
    }

    //Reporte Fecha Matriculados
    public function reporteFechaMatriculadosTecnologia()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();

        return view('header') . view('/graficasEstadisticas/tecnologia/fechas/vistaTecFechaMatr', $datos) . view('footer');
    }

    //Reporte Fecha Matriculados Busqueda
    public function reporteFechaMatriculadosTecnologiaBusqueda()
    {
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
    }

    //Reporte Fecha Graduados
    public function reporteFechaGraduadosTecnologia()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        return view('header') . view('/graficasEstadisticas/tecnologia/fechas/vistaTecFechaGrad', $datos) . view('footer');
    }

    //Reporte Fecha Graduados Busqueda
    public function reporteFechaGraduadosTecnologiaBusqueda()
    {
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
    }
}
