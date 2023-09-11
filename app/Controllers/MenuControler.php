<?php

namespace App\Controllers;

class MenuControler extends BaseController
{

    //Datos Estadisticos Grado
    public function menu()
    {
        try{

            return view('header') . view('/vistaDEtec/vista_detec') . view('footer');
        }catch(\Exception $e) {
            die($e->getMessage());
        }
    }
    
}
