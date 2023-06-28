<?php

namespace App\Controllers;

use App\Models\ModelFEPeriodo;

class ControladorFEEscuela extends BaseController
{

    //Datos Estadisticos Grado
    public function filtroEstadisticoGradoEscuela($tipo)
    {
        try {
            if($tipo == "Matriculados"){
                return view('header')
                . view('/DatosEstadisticos/Grados/busqueda/vista_b_escuela_matr')
                . view('footer');
            }else if($tipo == "Graduados"){
                return view('header')
                . view('/DatosEstadisticos/Grados/busqueda/vista_b_escuela_grad')
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
            //periodos ordenados en orden descendente en base al año 1997
            $data['tbl_periodo'] = $obgPeriodo->where('PER_ANO >=', 1997)->orderBy('PER_ANO', 'DESC')->findAll();
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
