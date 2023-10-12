<?php

namespace App\Controllers;

use Exception;
use Kint\Parser\ToStringPlugin;

//use App\Models\ModelFEPeriodo;


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
}
