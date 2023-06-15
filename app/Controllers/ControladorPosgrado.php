<?php

namespace App\Controllers;

class ControladorPosgrado extends BaseController
{

    //Datos Estadisticos Grado
    public function deposgrad()
    {
        return view('header') . view('vista_deposgrad') . view('footer');
    }
    public function deposgradMatr()
    {
        return view('header') . view('vista_deposgrad_matr') . view('footer');
    }
    public function deposgradGrad()
    {
        return view('header') . view('vista_deposgrad_grad') . view('footer');
    }
}

?>