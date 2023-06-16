<?php

namespace App\Controllers;

use App\Models\modelRepTitulacion;

class ControladorReportes extends BaseController
{

    //Datos Estadisticos Grado
    public function reportes()
    {

        //modelo 
        $objRepTit = new modelRepTitulacion();
        //periodos
        $data['tbl_periodo'] = $objRepTit->findAll();

        return view('header') . view('/vistaReportes/vista_respTitulacion', $data) . view('footer');
    }
    
}
