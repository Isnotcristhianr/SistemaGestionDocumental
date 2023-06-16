<?php

namespace App\Controllers;

class ControladorReportes extends BaseController
{

    //Datos Estadisticos Grado
    public function reportes()
    {
        return view('header') . view('/vistaReportes/vista_respTitulacion') . view('footer');
    }
    
}
