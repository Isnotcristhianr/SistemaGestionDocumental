<?php

namespace App\Controllers;

class ControladorMain extends BaseController
{
    public function inicio()
    {
        try {
            return view('header') . view('inicio') . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Datos Estadisticos Grado
    public function degrad()
    {
        try {

            return view('header') . view('vista_degrad') . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function degradMatr()
    {
        try {

            return view('header') . view('vista_degrad_matr') . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
