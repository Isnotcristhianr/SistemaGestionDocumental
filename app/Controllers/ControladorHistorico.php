<?php

namespace App\Controllers;

use App\Models\ModelMatrizGraduados;
use App\Models\ModelFEPeriodo;


class ControladorHistorico extends BaseController
{


    //Datos Estadisticos Grado
    public function dehistorico()
    {
        try {

            return view('header') . view('/vistaDEHistorico/vista_deHistorico') . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //busqueda
    public function busquedaHistorico()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') . view('/graficasEstadisticas/historico/vistaEstHistorico', $datos + $datos2) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //busqueda especifica
    public function busquedaHistoricoEspecifico()
    {
        try {

            //capturamos las fechas
            $fechaInicio = $this->request->getGet('fechaDesde');
            $fechaFin = $this->request->getGet('fechaHasta');

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModeloEspecifico($fechaInicio, $fechaFin);
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            //fechas
            $fechas = ["fechaInicio" => $fechaInicio, "fechaFin" => $fechaFin];
            return view('header') . view('/graficasEstadisticas/historico/vistaEstHistoricoEspecifico', $datos + $datos2 + $fechas) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //verMenuGeneral
    public function verMenuGeneral()
    {
        try {

            return view('header') . view('/vistaDEHistorico/vista_menuGeneral') . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //verMatriculados
    public function verMatriculados()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') .
                view('/graficasEstadisticas/historico/vista_matriculados', $datos + $datos2) .
                view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //verGraduados
    public function verGraduados()
    {
        try {

            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();
            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

            return view('header') .
                view('/graficasEstadisticas/historico/vista_graduados', $datos + $datos2) .
                view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
