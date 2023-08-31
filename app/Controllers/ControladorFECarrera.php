<?php

namespace App\Controllers;

use App\Models\ModelFEcarreras;
use App\Models\ModelFEpadre;
use App\Models\modelRepTitulacion;
use App\Models\ModelMatrizGraduados;
use App\Models\ModelFEPeriodo;

class ControladorFECarrera extends BaseController
{

    //Datos Estadisticos Grado
    public function filtroEstadisticoGradoCarrera($tipo)
    {
        try {
            //modelo
            $objEstadMatr = new ModelFEcarreras();
            $objPadre = new ModelFEpadre();

            //car_nombre donde ctip = 2, car_carrera = 1
            $data['tbl_carrera'] = $objEstadMatr
                ->where('CTIP_ID', 2)
                ->where('CAR_CARRERA', 1)
                ->findAll();

            $padre['tbl_escuela'] = $objPadre->findAll();

            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_carrera_matr', $data + $padre)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_carrera_grad', $data + $padre)
                    . view('footer');
            } else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_carrera_general', $data + $padre)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Carrera General
    public function reporteGradoCarreraGeneral($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/grado/carreras/vistaCarreraGeneral', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Carrera Matriculados
    public function reporteGradoCarreraMatriculados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/grado/carreras/vistaCarreraMatriculados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Carrera Graduados
    public function reporteGradoCarreraGraduados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/grado/carreras/vistaCarreraGraduados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    //? Datos Estadisticos Posgrado
    public function filtroEstadisticoPosgradoCarrera($tipo)
    {
        try {
            //modelo
            $objEstadMatr = new ModelFEcarreras();
            $objPadre = new ModelFEpadre();

            //car_nombre donde ctip = 1, car_carrera = 1
            $data['tbl_carrera'] = $objEstadMatr
                ->where('CTIP_ID', 1)
                ->where('CAR_CARRERA', 1)
                ->findAll();

            $padre['tbl_escuela'] = $objPadre->findAll();

            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_carrera_matr', $data + $padre)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_carrera_grad', $data + $padre)
                    . view('footer');
            }else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_carrera_general', $data + $padre)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Carrera General
    public function reportePosgradoCarreraGeneral($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/posgrado/carreras/vistaCarreraGeneral', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Carrera Matriculados
    public function reportePosgradoCarreraMatriculados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/posgrado/carreras/vistaCarreraMatriculados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Carrera Graduados
    public function reportePosgradoCarreraGraduados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/posgrado/carreras/vistaCarreraGraduados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //? Datos Estadisticos Tecnologias
    public function filtroEstadisticoTecnologiaCarrera($tipo)
    {
        try {
            //modelo
            $objEstadMatr = new ModelFEcarreras();
            $objPadre = new ModelFEpadre();

            //car_nombre donde ctip = 3, car_carrera = 1
            $data['tbl_carrera'] = $objEstadMatr
                ->where('CTIP_ID', 3)
                ->where('CAR_CARRERA', 1)
                ->findAll();

            $padre['tbl_escuela'] = $objPadre->findAll();

            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/busqueda/vista_b_carrera_matr', $data + $padre)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/busqueda/vista_b_carrera_grad', $data + $padre)
                    . view('footer');
            }else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/busqueda/vista_b_carrera_general', $data + $padre)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Tecnologia Carrera General
    public function reporteTecnologiaCarreraGeneral($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/tecnologia/carreras/vistaCarreraGeneral', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Tecnologia Carrera Matriculados
    public function reporteTecnologiaCarreraMatriculados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/tecnologia/carreras/vistaCarreraMatriculados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Tecnologia Carrera Graduados
    public function reporteTecnologiaCarreraGraduados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/tecnologia/carreras/vistaCarreraGraduados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
