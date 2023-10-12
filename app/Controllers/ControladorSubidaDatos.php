<?php

namespace App\Controllers;

use Exception;
use Kint\Parser\ToStringPlugin;

use App\Models\ModelMatrizGraduados;

//carrera tipo
use App\Models\ModelCarreraTipo;
//condicion
use App\Models\ModelCondicion;
//modalidad
use App\Models\ModalidadModTitulacion;
//periodo
use App\Models\ModelFEPeriodo;
//carrera
use App\Models\ModelFEcarreras;


class ControladorSubidaDatos extends BaseController
{

    //*subida datos menu
    public function subidaDatos()
    {
        try {

            echo view('header');
            echo view('subida/menuDatos');
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //*subida datos manual
    public function subirManualmente()
    {
        try {

            //matriz
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera tipo
            $objCarreraTipo = new ModelCarreraTipo();
            //condicion
            $objCondicion = new ModelCondicion();
            //modalidad
            $objModalidad = new ModalidadModTitulacion();
            //periodo
            $objPeriodo = new ModelFEPeriodo();
            //carrera
            $objCarrera = new ModelFEcarreras();

            $data['tbl_estadistica_matriz'] = $objEstadMatr->verModelo();
            $data['tbl_carrera_tipo'] = $objCarreraTipo->verModelo();
            $data['tbl_estudiante'] = $objCondicion->verModelo();
            $data['tbl_modalida_titulacion'] = $objModalidad->verModelo();
            $data['tbl_periodo'] = $objPeriodo->verModelo();
            $data['tbl_carrera'] = $objCarrera->verModelo();


            echo view('header');
            echo view('subida/manualmente', $data);
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
