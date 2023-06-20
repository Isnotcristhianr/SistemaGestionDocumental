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

        $datos = ["id" => $id, "filtro" => $filtro];
        return view('header') . view('/DatosEstadisticos/vista_opcion_filtro', $datos) . view('footer');
    }
}
