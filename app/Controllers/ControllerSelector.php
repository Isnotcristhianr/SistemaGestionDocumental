<?php

namespace App\Controllers;

use App\Models\ModelFEescuelas;
use App\Models\ModelFEcarreras;
use App\Models\ModelFEpadre;
use App\Models\modelRepTitulacion;
use App\Models\ModelMatrizGraduados;
use App\Models\ModelFEPeriodo;

class ControllerSelector extends BaseController
{
    //? Grado
    //* Selector de Escuelas General
    public function selectorReporteEscuelaGrad($ids)
    {
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);

            // Modelo
            $objEscuela = new ModelFEescuelas();
            $objEstadMatr = new ModelMatrizGraduados();

            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objEscuela->whereIn('CAR_PADREESC', $id_array)->findAll();

            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;

            return view('header')
                . view('/graficasEstadisticas/grado/selector/vistaSelectorEscuela', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //* Selector de Escuelas Matriculados
    public function selectorReporteEscuelaGradMatriculados($ids)
    {
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);

            // Modelo
            $objEscuela = new ModelFEescuelas();
            $objEstadMatr = new ModelMatrizGraduados();

            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objEscuela->whereIn('CAR_PADREESC', $id_array)->findAll();

            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;

            return view('header')
                . view('/graficasEstadisticas/grado/selector/vistaSelectorEscuelaMatriculados', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //* Selector de Escuelas Graduados
    public function selectorReporteEscuelaGradGraduados($ids)
    {
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);

            // Modelo
            $objEscuela = new ModelFEescuelas();
            $objEstadMatr = new ModelMatrizGraduados();

            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objEscuela->whereIn('CAR_PADREESC', $id_array)->findAll();

            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;

            return view('header')
                . view('/graficasEstadisticas/grado/selector/vistaSelectorEscuelaGraduados', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //*Selector de Carreras General
    public function selectorReporteCarreraGrad($ids)
    {
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);

            // Modelo
            $objCarrera = new ModelFEcarreras();
            $objEstadMatr = new ModelMatrizGraduados();

            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objCarrera->whereIn('CAR_ID', $id_array)->findAll();

            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;

            return view('header')
                . view('/graficasEstadisticas/grado/selector/vistaSelectorCarrera', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //*Selector de Carreras Matriculados
    public function selectorReporteCarreraGradMatriculados($ids)
    {
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);

            // Modelo
            $objCarrera = new ModelFEcarreras();
            $objEstadMatr = new ModelMatrizGraduados();

            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objCarrera->whereIn('CAR_ID', $id_array)->findAll();

            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;
            return view('header')
                . view('/graficasEstadisticas/grado/selector/vistaSelectorCarreraMatriculados', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //*Selector de Carreras Graduados
    public function selectorReporteCarreraGradGraduados($ids)
    {
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);
            // Modelo
            $objCarrera = new ModelFEcarreras();
            $objEstadMatr = new ModelMatrizGraduados();
            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objCarrera->whereIn('CAR_ID', $id_array)->findAll();
            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();
            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;
            return view('header')
                . view('/graficasEstadisticas/grado/selector/vistaSelectorCarreraGraduados', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //?Posgrado
    //* Selector de Escuelas General
    public function selectorReporteEscuelaPosgrado($ids)
    {
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);

            // Modelo
            $objEscuela = new ModelFEescuelas();
            $objEstadMatr = new ModelMatrizGraduados();

            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objEscuela->whereIn('CAR_PADREESC', $id_array)->findAll();

            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;

            return view('header')
                . view('/graficasEstadisticas/posgrado/selector/vistaSelectorEscuela', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //* Selector de Escuelas Matriculados
    public function selectorReporteEscuelaPosgradoMatriculados($ids)
    {
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);

            // Modelo
            $objEscuela = new ModelFEescuelas();
            $objEstadMatr = new ModelMatrizGraduados();

            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objEscuela->whereIn('CAR_PADREESC', $id_array)->findAll();

            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;

            return view('header')
                . view('/graficasEstadisticas/posgrado/selector/vistaSelectorEscuelaMatriculados', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //* Selector de Escuelas Graduados
    public function selectorReporteEscuelaPosgradoGraduados($ids){
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);

            // Modelo
            $objEscuela = new ModelFEescuelas();
            $objEstadMatr = new ModelMatrizGraduados();

            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objEscuela->whereIn('CAR_PADREESC', $id_array)->findAll();

            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();

            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;

            return view('header')
                . view('/graficasEstadisticas/posgrado/selector/vistaSelectorEscuelaGraduados', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //*Selector de Carreras General
    public function selectorReporteCarreraPosgrado($ids){
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);

            // Modelo
            $objCarrera = new ModelFEcarreras();
            $objEstadMatr = new ModelMatrizGraduados();

            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objCarrera->whereIn('CAR_ID', $id_array)->findAll();

            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();
            
            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;
            
            return view('header')
                . view('/graficasEstadisticas/posgrado/selector/vistaSelectorCarrera', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //*Selector de Carreras Matriculados
    public function selectorReporteCarreraPosgradoMatriculados($ids){
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);
            
            // Modelo
            $objCarrera = new ModelFEcarreras();
            $objEstadMatr = new ModelMatrizGraduados();
            
            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objCarrera->whereIn('CAR_ID', $id_array)->findAll();
            
            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();
            
            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;
            
            return view('header')
                . view('/graficasEstadisticas/posgrado/selector/vistaSelectorCarreraMatriculados', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //*Selector de Carreras Graduados
    public function selectorReporteCarreraPosgradoGraduados($ids){
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);
            
            // Modelo
            $objCarrera = new ModelFEcarreras();
            $objEstadMatr = new ModelMatrizGraduados();
            
            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objCarrera->whereIn('CAR_ID', $id_array)->findAll();
            
            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();
            
            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;
            
            return view('header')
                . view('/graficasEstadisticas/posgrado/selector/vistaSelectorCarreraGraduados', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //?Tecnologia
    //* Selector de Carreras General
    public function selectorReporteCarreraTecnologia($ids){
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);
            
            // Modelo
            $objCarrera = new ModelFEcarreras();
            $objEstadMatr = new ModelMatrizGraduados();
            
            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objCarrera->whereIn('CAR_ID', $id_array)->findAll();
            
            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();
            
            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;
            
            return view('header')
                . view('/graficasEstadisticas/tecnologia/selector/vistaSelectorCarrera', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //* Selector de Carreras Matriculados
    public function selectorReporteCarreraTecnologiaMatriculados($ids){
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);
            
            // Modelo
            $objCarrera = new ModelFEcarreras();
            $objEstadMatr = new ModelMatrizGraduados();
            
            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objCarrera->whereIn('CAR_ID', $id_array)->findAll();
            
            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();
            
            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;
            
            return view('header')
                . view('/graficasEstadisticas/tecnologia/selector/vistaSelectorCarreraMatriculados', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //* Selector de Carreras Graduados
    public function selectorReporteCarreraTecnologiaGraduados($ids){
        try {
            // Convertir la cadena de IDs en un array
            $id_array = explode(',', $ids);
            
            // Modelo
            $objCarrera = new ModelFEcarreras();
            $objEstadMatr = new ModelMatrizGraduados();
            
            // Obtener carreras basadas en los IDs seleccionados
            $data['tbl_carrera'] = $objCarrera->whereIn('CAR_ID', $id_array)->findAll();
            
            //datos estad
            $data['tbl_estadistica_matriz'] = $objEstadMatr->findAll();
            
            // Almacenar IDs para usarlos en la vista si es necesario
            $data['ids'] = $id_array;
            
            return view('header')
                . view('/graficasEstadisticas/tecnologia/selector/vistaSelectorCarreraGraduados', $data)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

}
