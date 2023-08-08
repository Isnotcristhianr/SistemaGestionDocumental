<?php

namespace App\Controllers;

use App\Models\ModelMatrizGraduados;
//


class ControladorHistorico extends BaseController
{


    //Datos Estadisticos Grado
    public function dehistorico()
    {
        //modelo
        $modelo = new ModelMatrizGraduados();
        //ver data
        $data['tbl_estadistica_matriz'] = $modelo->verModelo();

        return view('header') . view('/vistaDEHistorico/vista_deHistorico', $data) . view('footer');
    }

    //busqueda
    public function busquedaHistorico(){
        return view('header'). view('/graficasEstadisticas/historico/vistaEstHistorico') . view('footer');
    }

}

?>