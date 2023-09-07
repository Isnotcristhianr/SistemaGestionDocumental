<?php

namespace App\Controllers;

//use App\Models\ModelFEPeriodo;


class ControladorCalendario extends BaseController
{

    //calendario academico
    public function calendarioAcademico()
    {
        echo view('header');
        echo view('calendarioAcademico/calendarioAcademico');
        echo view('footer');
    }
}
