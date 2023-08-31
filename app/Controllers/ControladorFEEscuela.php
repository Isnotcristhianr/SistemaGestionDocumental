<?php

namespace App\Controllers;

use App\Models\ModelFEescuelas;
use App\Models\ModelFEcarreras;
use App\Models\ModelFEpadre;
use App\Models\modelRepTitulacion;
use App\Models\ModelMatrizGraduados;
use App\Models\ModelFEPeriodo;

class ControladorFEEscuela extends BaseController
{

    //?Datos Estadisticos Grado
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
            }else if($tipo == "General"){
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_escuela_general', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Escuela Grado General
    public function reporteEscuelaGeneral($id)
    {
        try {
           //modelo
           $objEstadMatr = new ModelMatrizGraduados();
           //escuela
           $objEsc = new ModelFEescuelas();
           //obtener datos de la escuela
           $escuela['tbl_carrera'] = $objEsc->findAll();

           //buscar escuela acorde a la carrera en tbl_estadistica matriz
           //1. $id = id de la escuela, se compara con CAR_ID y se asigna variable $esc
           //2. $esc se compara con CAR_PADREESC y se obtienen todas las que pertenecen
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
