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
    //* Selector de Escuelas
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
}
