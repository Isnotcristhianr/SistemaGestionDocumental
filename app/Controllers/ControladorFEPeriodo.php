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

    //Datos Estadisticos Tecnologia
    public function filtroEstadisticoTecnologiaPeriodo($tipo)
    {
        try {
            //modelo 
            $obgPeriodo = new ModelFEPeriodo();
            //periodos
            //$data['tbl_periodo'] = $obgPeriodo->findAll();

            //periodos ordenados en orden descendente en base al año desde el 2021
            $data['tbl_periodo'] = $obgPeriodo->where('PER_ANO >=', 2021)->orderBy('PER_ANO', 'DESC')->findAll();
            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/busqueda/vista_b_periodo_matr', $data)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/busqueda/vista_b_periodo_grad', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
