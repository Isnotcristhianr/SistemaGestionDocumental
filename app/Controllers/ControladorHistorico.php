<?php

namespace App\Controllers;

use App\Models\ModelMatrizGraduados;
use App\Models\ModelFEPeriodo;


class ControladorHistorico extends BaseController
{


    //Datos Estadisticos Grado
    public function dehistorico()
    {
        return view('header') . view('/vistaDEHistorico/vista_deHistorico') . view('footer');
    }

    //busqueda
    public function busquedaHistorico(){
        //modelo matriz
        $modelo = new ModelMatrizGraduados();
        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
        $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();

        return view('header'). view('/graficasEstadisticas/historico/vistaEstHistorico', $datos + $datos2) . view('footer');
    }

}

?>