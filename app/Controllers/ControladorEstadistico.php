<?php

namespace App\Controllers;

//use App\Models\ModelFEPeriodo;


class ControladorEstadistico extends BaseController
{
    public function filtroEstadistico($id)
    {
        try {

            $obtenido = ["id" => $id];
            return view('header') . view('/DatosEstadisticos/vista_filtro_estadistico', $obtenido) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function BuscarFiltroEstadistico($id, $filtro)
    {
        try {

            $datos = ["id" => $id, "filtro" => $filtro];
            return view('header') . view('/DatosEstadisticos/vista_opcion_filtro', $datos) . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //grado
    public function filtroEstadisticoGrad()
    {
        try {
            return view('header') . view('/DatosEstadisticos/Grados/vista_fe_grad') . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function filtroEstadisticoGradoBusqueda($tipo, $filtro)
    {

        try {

            $datos = ["tipo" => $tipo, "filtro" => $filtro];

            if ($tipo == "Grado") {
                if ($filtro == "Escuela") {
                    return view('header')
                        . view('/DatosEstadisticos/Grados/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/Grados/vista_fe_grad_escuela')
                        . view('footer');
                } else if ($filtro == "Carrera") {
                    return view('header')
                        . view('/DatosEstadisticos/Grados/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/Grados/vista_fe_grad_carrera')
                        . view('footer');
                } else if ($filtro == "Periodo") {
                    return view('header')
                        . view('/DatosEstadisticos/Grados/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/Grados/vista_fe_grad_periodo')
                        . view('footer');
                } else if ($filtro == "Fecha") {
                    return view('header')
                        . view('/DatosEstadisticos/Grados/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/Grados/vista_fe_grad_fecha')
                        . view('footer');
                } else if ($filtro == "General") {
                    return view('header')
                        . view('/DatosEstadisticos/Grados/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/Grados/vista_fe_grad_general')
                        . view('footer');
                } else {
                    echo "error";
                }
            } else {
                return view('header')
                    . view('/DatosEstadisticos/Grados/vista_fe_grad')
                    . view('footer');
            }
        } catch (\Throwable $th) {
            return view('header')
                . view('/DatosEstadisticos/Grados/vista_fe_grad')
                . view('footer');
        }
    }

    //popsgrado
    public function filtroEstadisticoPosgrado()
    {
        try {
            return view('header') . view('/DatosEstadisticos/PosGrados/vista_fe_posgrad') . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function filtroEstadisticoPosgradoBusqueda($tipo, $filtro)
    {
        try {

            $datos = ["tipo" => $tipo, "filtro" => $filtro];

            if ($tipo == "Posgrado") {
                if ($filtro == "Escuela") {
                    return view('header')
                        . view('/DatosEstadisticos/PosGrados/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/PosGrados/vista_fe_posgrad_escuela')
                        . view('footer');
                } else if ($filtro == "Carrera") {
                    return view('header')
                        . view('/DatosEstadisticos/PosGrados/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/PosGrados/vista_fe_posgrad_carrera')
                        . view('footer');
                } else if ($filtro == "Periodo") {
                    return view('header')
                        . view('/DatosEstadisticos/PosGrados/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/PosGrados/vista_fe_posgrad_periodo')
                        . view('footer');
                } else if ($filtro == "Fecha") {
                    return view('header')
                        . view('/DatosEstadisticos/PosGrados/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/PosGrados/vista_fe_posgrad_fecha')
                        . view('footer');
                } else if ($filtro == "General") {
                    return view('header')
                        . view('/DatosEstadisticos/PosGrados/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/PosGrados/vista_fe_posgrad_general')
                        . view('footer');
                } else {
                    echo "error";
                }
            } else {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/vista_fe_posgrad')
                    . view('footer');
            }
        } catch (\Throwable $th) {
            return view('header')
                . view('/DatosEstadisticos/PosGrados/vista_fe_posgrad')
                . view('footer');
        }
    }

    //tecnologia
    public function filtroEstadisticoTecnologia()
    {
        try {
            return view('header') . view('/DatosEstadisticos/Tecnologias/vista_fe_tec') . view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function filtroEstadisticoTecnologiaBusqueda($tipo, $filtro)
    {
        try {

            $datos = ["tipo" => $tipo, "filtro" => $filtro];

            if ($tipo == "Técnicas y Tecnológicas") {
                if ($filtro == "CarrerasTécnicasyTecnológias") {
                    $filtro = "Carreras Técnicas y Tecnológicas";
                    $datos = ["tipo" => $tipo, "filtro" => $filtro];

                    return view('header')
                        . view('/DatosEstadisticos/Tecnologias/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/Tecnologias/vista_fe_tec_carreras')
                        . view('footer');
                } else if ($filtro == "Periodo") {
                    return view('header')
                        . view('/DatosEstadisticos/Tecnologias/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/Tecnologias/vista_fe_tec_periodos')
                        . view('footer');
                } else if ($filtro == "Fecha") {
                    return view('header')
                        . view('/DatosEstadisticos/Tecnologias/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/Tecnologias/vista_fe_tec_fecha')
                        . view('footer');
                } else if ($filtro == "General") {
                    return view('header')
                        . view('/DatosEstadisticos/Tecnologias/vista_fe_option', $datos)
                        . view('/DatosEstadisticos/Tecnologias/vista_fe_tec_general')
                        . view('footer');
                } else {
                    echo "error";
                }
            } else {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/vista_fe_tec')
                    . view('footer');
            }
        } catch (\Throwable $th) {

            return view('header')
                . view('/DatosEstadisticos/Tecnologias/vista_fe_tec')
                . view('footer');
        }
    }
}
