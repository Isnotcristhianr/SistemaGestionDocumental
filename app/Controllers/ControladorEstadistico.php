<?php

namespace App\Controllers;

class ControladorEstadistico extends BaseController
{
    public function filtroEstadistico($id)
    {
        $obtenido = ["id" => $id];
        return view('header') . view('/DatosEstadisticos/vista_filtro_estadistico', $obtenido) . view('footer');
    }

    public function BuscarFiltroEstadistico($id)
    {

        if ($id == 1 || $id == 2 || $id == 3) {
            $obtenido = ["id" => $id];
            return view('header') . view('/DatosEstadisticovista_opcion_filtro', $obtenido) . view('footer');
        } else {
            /* Alert */
            echo "<script type='text/javascript'>
            alert('No se ha seleccionado una opción');
            window.location.href='" . base_url('/DatosEstadisticos/vista_filtro_estadistico', $id) . "';
            </script>";
        } 
    }
}
