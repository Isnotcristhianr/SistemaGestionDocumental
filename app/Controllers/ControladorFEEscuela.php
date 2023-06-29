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
}
