<?php

namespace App\Controllers;

use App\Models\ModelFEcarreras;

class ControladorFECarrera extends BaseController
{

    //Datos Estadisticos Grado
    public function filtroEstadisticoGradoCarrera($tipo)
    {
        try {
            //modelo
            $objCarreras = new ModelFEcarreras();
            //car_nombre donde ctip = 2, car_carrera = 1
            $data['tbl_carrera'] = $objCarreras
            ->where('CTIP_ID', 2)
            ->where('CAR_CARRERA', 1)
            ->findAll();

            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_carrera_matr', $data)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_carrera_grad', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
