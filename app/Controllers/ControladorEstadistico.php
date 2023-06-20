<?php

namespace App\Controllers;

class ControladorEstadistico extends BaseController
{
    public function filtroEstadistico($id)
    {
        $obtenido = ["id" => $id];
        return view('header') . view('/DatosEstadisticos/vista_filtro_estadistico', $obtenido) . view('footer');
    }

    public function BuscarFiltroEstadistico($id, $filtro)
    {

        if($id==1){

            $datos = ["id" => $id, "filtro" => $filtro];
            return view('header') . view('/DatosEstadisticos/Grado/vista_opcion_filtro', $datos) . view('footer');
        }else{
            echo "No se encontro el filtro";
        }

    }
}
