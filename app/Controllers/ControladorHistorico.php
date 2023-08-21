<?php

namespace App\Controllers;

use App\Models\ModelMatrizGraduados;
use App\Models\ModelFEPeriodo;


class ControladorHistorico extends BaseController
{


    //Datos Estadisticos Grado
    public function dehistorico()
    {
        return view('header') . view('/vistaDEHistorico/vista_deHistorico') . view('footer');
    }

    //busqueda
    public function busquedaHistorico()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header') . view('/graficasEstadisticas/historico/vistaEstHistorico', $datos + $datos2) . view('footer');
    }

    //busqueda especifica
    public function busquedaHistoricoEspecifico()
    {

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
    }
}
