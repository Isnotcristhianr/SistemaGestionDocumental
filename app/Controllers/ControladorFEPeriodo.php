<?php

namespace App\Controllers;

use App\Models\ModelFEPeriodo;

class ControladorFEPeriodo extends BaseController
{

    //Datos Estadisticos Grado
    public function filtroEstadisticoGradoPeriodo($tipo)
    {

        try {
            //modelo 
            $obgPeriodo = new ModelFEPeriodo();
            //periodos
            //$data['tbl_periodo'] = $obgPeriodo->findAll();

            //periodos ordenados en orden descendente en base al año
            $data['tbl_periodo'] = $obgPeriodo->orderBy('PER_ANO', 'DESC')->findAll();
            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_periodo_matr', $data)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_periodo_grad', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Datos Estadisticos PosGrado
    public function filtroEstadisticoPosGradoPeriodo($tipo)
    {

        try {
            //modelo 
            $obgPeriodo = new ModelFEPeriodo();
            //periodos
            //$data['tbl_periodo'] = $obgPeriodo->findAll();

            //periodos ordenados en orden descendente en base al año
            $data['tbl_periodo'] = $obgPeriodo->orderBy('PER_ANO', 'DESC')->findAll();
            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_periodo_matr', $data)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_periodo_grad', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
