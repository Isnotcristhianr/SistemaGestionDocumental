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
            } else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_escuela_general', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Escuela Grado General Vigente
    public function reporteEscuelaGeneralVigente($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //escuela
            $objEsc = new ModelFEescuelas();
            
            //$id de la escuela es CAR_PADRE, almacenar en una variable para buscar en CAR_PADREESC
            $idEscuela = $id;
            //obtener datos de la escuela y las carreras que contiene
            $escuela['tbl_carrera'] = $objEsc->where('CAR_PADREESC', $idEscuela)->findAll();

            //datos estadisticos
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            //obtener id
            $data['id'] = $id;

            //vistas
            return view('header')
            . view('/graficasEstadisticas/grado/escuelas/vistaEscuelaGeneral', $data + $escuela)
            . view('footer');

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Escuela Grado General Historico
    public function reporteEscuelaGeneralHistorico($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //escuela
            $objEsc = new ModelFEescuelas();
            
            //$id de la escuela es CAR_PADRE, almacenar en una variable para buscar en CAR_PADREESC
            $idEscuela = $id;
            //obtener datos de la escuela y las carreras que contiene
            $escuela['tbl_carrera'] = $objEsc->where('CAR_PADREESC', $idEscuela)->findAll();

            //datos estadisticos
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            //obtener id
            $data['id'] = $id;

            //vistas
            return view('header')
            . view('/graficasEstadisticas/grado/escuelas/vistaEscuelaGeneralHistorico', $data + $escuela)
            . view('footer');

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Escuela Grado General Tulcan
    public function reporteEscuelaGeneralTulcan($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //escuela
            $objEsc = new ModelFEescuelas();
            
            //$id de la escuela es CAR_PADRE, almacenar en una variable para buscar en CAR_PADREESC
            $idEscuela = $id;
            //obtener datos de la escuela y las carreras que contiene
            $escuela['tbl_carrera'] = $objEsc->where('CAR_PADREESC', $idEscuela)->findAll();

            //datos estadisticos
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            //obtener id
            $data['id'] = $id;

            //vistas
            return view('header')
            . view('/graficasEstadisticas/grado/escuelas/vistaEscuelaGeneralTulcan', $data + $escuela)
            . view('footer');

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Escuela Matriculados Vigente
    public function reporteEscuelaMatriculadosVigente($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //escuela
            $objEsc = new ModelFEescuelas();
            
            //$id de la escuela es CAR_PADRE, almacenar en una variable para buscar en CAR_PADREESC
            $idEscuela = $id;
            //obtener datos de la escuela y las carreras que contiene
            $escuela['tbl_carrera'] = $objEsc->where('CAR_PADREESC', $idEscuela)->findAll();

            //datos estadisticos
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            //obtener id
            $data['id'] = $id;

            //vistas
            return view('header')
            . view('/graficasEstadisticas/grado/escuelas/vistaEscuelaMatriculadosVigente', $data + $escuela)
            . view('footer');

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Escuela Matriculados Historico
    public function reporteEscuelaMatriculadosHistorico($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //escuela
            $objEsc = new ModelFEescuelas();
            
            //$id de la escuela es CAR_PADRE, almacenar en una variable para buscar en CAR_PADREESC
            $idEscuela = $id;
            //obtener datos de la escuela y las carreras que contiene
            $escuela['tbl_carrera'] = $objEsc->where('CAR_PADREESC', $idEscuela)->findAll();

            //datos estadisticos
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            //obtener id
            $data['id'] = $id;

            //vistas
            return view('header')
            . view('/graficasEstadisticas/grado/escuelas/vistaEscuelaMatriculadosHistorico', $data + $escuela)
            . view('footer');

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Escuela Matriculados Tulcan
    public function reporteEscuelaMatriculadosTulcan($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //escuela
            $objEsc = new ModelFEescuelas();
            
            //$id de la escuela es CAR_PADRE, almacenar en una variable para buscar en CAR_PADREESC
            $idEscuela = $id;
            //obtener datos de la escuela y las carreras que contiene
            $escuela['tbl_carrera'] = $objEsc->where('CAR_PADREESC', $idEscuela)->findAll();

            //datos estadisticos
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            //obtener id
            $data['id'] = $id;

            //vistas
            return view('header')
            . view('/graficasEstadisticas/grado/escuelas/vistaEscuelaMatriculadosTulcan', $data + $escuela)
            . view('footer');

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


    //?Datos Estadisticos PosGrado
    public function filtroEstadisticoPosgradoEscuela($tipo)
    {
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
