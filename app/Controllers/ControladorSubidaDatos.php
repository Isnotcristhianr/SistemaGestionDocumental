<?php

namespace App\Controllers;

use Exception;
use Kint\Parser\ToStringPlugin;

use App\Models\ModelMatrizGraduados;



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

            $data['tbl_estadistica_matriz'] = $objEstadMatr->verModelo();

            echo view('header');
            echo view('subida/manualmente', $data);
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
