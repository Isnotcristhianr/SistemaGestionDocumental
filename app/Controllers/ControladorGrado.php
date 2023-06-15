<?php

namespace App\Controllers;

class ControladorGrado extends BaseController
{

    //Datos Estadisticos Grado
    public function degrad()
    {
        return view('header') . view('vista_degrad') . view('footer');
    }
    public function degradMatr()
    {
        return view('header') . view('vista_degrad_matr') . view('footer');
    }
    public function degradGrad()
    {
        return view('header') . view('vista_degrad_grad') . view('footer');
    }
}

?>