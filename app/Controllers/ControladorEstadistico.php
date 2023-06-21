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

    //grado
    public function filtroEstadisticoGrad()
    {
        return view('header') . view('/DatosEstadisticos/Grados/vista_fe_grad') . view('footer');
    }
    public function filtroEstadisticoGradoBusqueda($tipo, $filtro)
    {

        try {

            $datos = ["tipo" => $tipo, "filtro" => $filtro];

            if ($tipo == "Grado") {
                if ($filtro == "Escuela") {
                    $datos = ["tipo" => $tipo, "filtro" => $filtro];
                    return view('header') . view('/DatosEstadisticos/Grados/vista_fe_option', $datos) . view('/DatosEstadisticos/Grados/vista_fe_grad_escuela') . view('footer');
                } else if ($filtro == "Carrera") {
                    $datos = ["tipo" => $tipo, "filtro" => $filtro];
                    return view('header') . view('/DatosEstadisticos/Grados/vista_fe_option', $datos) . view('/DatosEstadisticos/Grados/vista_fe_grad_carrera') . view('footer');
                } else if ($filtro == "Periodo") {
                    $datos = ["tipo" => $tipo, "filtro" => $filtro];
                    return view('header') . view('/DatosEstadisticos/Grados/vista_fe_option', $datos) . view('/DatosEstadisticos/Grados/vista_fe_grad_periodo') . view('footer');
                } else if ($filtro == "Fecha") {
                    $datos = ["tipo" => $tipo, "filtro" => $filtro];
                    return view('header') . view('/DatosEstadisticos/Grados/vista_fe_option', $datos) . view('/DatosEstadisticos/Grados/vista_fe_grad_fecha') . view('footer');
                } else if ($filtro == "General") {
                    $datos = ["tipo" => $tipo, "filtro" => $filtro];
                    return view('header') . view('/DatosEstadisticos/Grados/vista_fe_option', $datos) . view('/DatosEstadisticos/Grados/vista_fe_grad_general') . view('footer');
                }
            } else {
                return view('header') . view('/DatosEstadisticos/Grados/vista_fe_grad') . view('footer');
            }
        } catch (\Throwable $th) {
            return view('header') . view('/DatosEstadisticos/Grados/vista_fe_grad') . view('footer');
        }
    }
    //popsgrado
    public function filtroEstadisticoPosgrado()
    {
        try{

        }catch (\Throwable $th) {
            return view('header') . view('/DatosEstadisticos/PosGrados/vista_fe_posgrad') . view('footer');
        }
    }

    //tecnologia
    public function filtroEstadisticoTecnologia()
    {
        return view('header') . view('/DatosEstadisticos/Tecnologias/vista_fe_tec') . view('footer');
    }
}
