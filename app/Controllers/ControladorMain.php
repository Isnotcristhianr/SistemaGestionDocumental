<?php

namespace App\Controllers;

class ControladorMain extends BaseController
{
    public function inicio()
    {
        return view('header') . view('inicio') . view('footer');
    }

    //Datos Estadisticos Grado
    public function degrad()
    {
        return view('header') . view('vista_degrad') . view('footer');
    }
    public function degradMatr()
    {
        return view('header') . view('vista_degrad_matr') . view('footer');
    }
}

?>