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
            return view('header') . view('/DatosEstadisticos/Grado/vista_opcion_filtro', $datos) . view('footer');


    }

    //grado
    public function filtroEstadisticoGrad()
    {
        return view('header') . view('/DatosEstadisticos/Grados/vista_fe_grad') . view('footer');
    }

    //popsgrado
    public function filtroEstadisticoPosgrado()
    {
        return view('header') . view('/DatosEstadisticos/PosGrados/vista_fe_posgrad') . view('footer');
    }

    //tecnologia
    public function filtroEstadisticoTecnologia()
    {
        return view('header') . view('/DatosEstadisticos/Tecnologias/vista_fe_tec') . view('footer');
    }
}
