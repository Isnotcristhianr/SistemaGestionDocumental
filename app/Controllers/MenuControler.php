<?php

namespace App\Controllers;

class MenuControler extends BaseController
{

    //Datos Estadisticos Grado
    public function menu()
    {
        return view('header') . view('/vistaDEtec/vista_detec') . view('footer');
    }
    
}

?>