<?php

namespace App\Controllers;

class ControladorTec extends BaseController
{

    //Datos Estadisticos Grado
    public function detec()
    {
        return view('header') . view('vista_detec') . view('footer');
    }
    public function detecMatr()
    {
        return view('header') . view('vista_detec_matr') . view('footer');
    }
    public function detecGrad()
    {
        return view('header') . view('vista_detec_grad') . view('footer');
    }
}

?>