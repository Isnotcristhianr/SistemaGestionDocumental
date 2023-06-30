<?php

namespace App\Controllers;

use App\Models\ModelFEescuelas;

class ControladorFEEscuela extends BaseController
{

    //Datos Estadisticos Grado
    public function filtroEstadisticoGradoEscuela($tipo)
    {
        try {
            //modelo
            $objEscuela = new ModelFEescuelas();
            //escuelas
            $data['tbl_carrera'] = $objEscuela->where('CTIP_ID', 2)->where('CAR_ESCUELA', 1)->findAll();
            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_escuela_matr', $data)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_escuela_grad', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Datos Estadisticos PosGrado
    public function filtroEstadisticoPosgradoEscuela($tipo){
        try {
            //modelo
            $objEscuela = new ModelFEescuelas();
            //escuelas
            $data['tbl_carrera'] = $objEscuela->where('CTIP_ID', 2)->where('CAR_ESCUELA', 1)->findAll();
            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_escuela_matr', $data)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_escuela_grad', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


}
