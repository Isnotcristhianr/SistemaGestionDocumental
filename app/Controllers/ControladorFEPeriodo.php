<?php

namespace App\Controllers;

use App\Models\ModelFEPeriodo;
use App\Models\modelRepTitulacion;
use App\Models\ModelMatrizGraduados;

class ControladorFEPeriodo extends BaseController
{

    //? Datos Estadisticos Grado
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
            } else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_periodo_general', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Periodo General
    public function reporteGradoPeriodoGeneral($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos
            

            return view('header')
                . view('/graficasEstadisticas/grado/periodos/vistaPeriodoGeneral', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Periodo Matriculados
    public function reporteGradoPeriodoMatriculados($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/grado/periodos/vistaPeriodoMatriculados', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Periodo Graduados
    public function reporteGradoPeriodoGraduados($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/grado/periodos/vistaPeriodoGraduados', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //? Datos Estadisticos PosGrado
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
            }else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_periodo_general', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Periodo General
    public function reportePosgradoPeriodoGeneral($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/posgrado/periodos/vistaPeriodoGeneral', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Periodo Matriculados
    public function reportePosgradoPeriodoMatriculados($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/posgrado/periodos/vistaPeriodoMatriculados', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Periodo Graduados
    public function reportePosgradoPeriodoGraduados($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/posgrado/periodos/vistaPeriodoGraduados', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //? Datos Estadisticos Tecnologia
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
