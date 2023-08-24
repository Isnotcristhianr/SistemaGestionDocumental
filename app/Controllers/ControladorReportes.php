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

    //Reporte General Matriculados Especifico
    public function reporteGeneralMatriculadosEspecifico()
    {
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header') . view('/graficasEstadisticas/grado/vistaGradEspMatr', $datos + $datos2) . view('footer');
    }
}
