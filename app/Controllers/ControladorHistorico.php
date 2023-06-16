<?php

namespace App\Controllers;

class ControladorHistorico extends BaseController
{

    //Datos Estadisticos Grado
    public function dehistorico()
    {
        return view('header') . view('/vistaDEHistorico/vista_deHistorico') . view('footer');
    }

}

?>