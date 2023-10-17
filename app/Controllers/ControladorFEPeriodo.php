<?php

namespace App\Controllers;

use App\Models\ModelFEPeriodo;
use App\Models\modelRepTitulacion;
use App\Models\ModelMatrizGraduados;

class ControladorFEPeriodo extends BaseController
{

    //*crear periodo
    public function crearPeriodo()
    {
        try {
            //modelo 
            $obgPeriodo = new ModelFEPeriodo();

            //capturar datos post
            $PER_ID = null;
            $PER_ANO = $this->request->getPost('anoperiodo');
            $PER_PERIODO = $this->request->getPost('nombreperiodo');
            $PER_ULTIMO = $this->request->getPost('activoper');
            $PER_ESTADO = 0;

            /* Comprobacion */
            echo $PER_ANO;
            echo "<br>";
            echo $PER_PERIODO;
            echo "<br>";
            echo $PER_ULTIMO;
            echo "<br>";
            echo $PER_ESTADO;

            //?control estado ultimo periodo
            //ultimo activo
            $ultimoact = $this->obtenerUltimoActivo();
            if ($PER_ULTIMO == 1) {
                //cambiar estado ultimo activo
                $this->cambiarEstadoUltimoActivo($ultimoact);
            } else if ($PER_ULTIMO == 0) {
                //nada
            }

             //enviar datos al modelo
             $datosSubir = [
                'PER_ID' => $PER_ID,
                'PER_ANO' => $PER_ANO,
                'PER_PERIODO' => $PER_PERIODO,
                'PER_ULTIMO' => $PER_ULTIMO,
                'PER_ESTADO' => $PER_ESTADO
            ];

            //comprobaciones
            echo "<br>";
            echo "datos subidos";
            echo "<br>";
            echo "ultimo activo";
            echo "<br>";
            echo $ultimoact;

            //insertar datos
            $obgPeriodo->insertar($datosSubir);

            //redireccionar a vista
            return redirect()->to(base_url() . 'index.php/subidaDatos/manualmente');

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //*obtener ultimo activo
    public function obtenerUltimoActivo()
    {
        try {
            //modelo 
            $obgPeriodo = new ModelFEPeriodo();
            //obtener ultimo activo
            $periodo = $obgPeriodo->where('PER_ULTIMO', 1)->first();
            //ver data
            $datos['tbl_periodo'] = $periodo;

            //enviar periodo ultimo id
            $perid = $periodo['PER_ID'];
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            //retornar id periodo
            return $perid;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //*cambiar estado ultimo activo
    public function cambiarEstadoUltimoActivo($perid)
    {
        try {
            //modelo 
            $obgPeriodo = new ModelFEPeriodo();
            
            //cambiar estado ultimo activo
            $periodo = $obgPeriodo->where('PER_ID', $perid)->set(['PER_ULTIMO' => 0])->update();

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //? Datos Estadisticos Grado
    public function filtroEstadisticoGradoPeriodo($tipo)
    {
        try {
            //modelo 
            $obgPeriodo = new ModelFEPeriodo();
            //periodos
            //$data['tbl_periodo'] = $obgPeriodo->findAll();

            //periodos ordenados en orden descendente en base al año
            $data['tbl_periodo'] = $obgPeriodo->orderBy('PER_ANO', 'DESC')->findAll();
            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_periodo_matr', $data)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_periodo_grad', $data)
                    . view('footer');
            } else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_periodo_general', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Periodo General
    public function reporteGradoPeriodoGeneral($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos


            return view('header')
                . view('/graficasEstadisticas/grado/periodos/vistaPeriodoGeneral', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Periodo Matriculados
    public function reporteGradoPeriodoMatriculados($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/grado/periodos/vistaPeriodoMatriculados', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Periodo Graduados
    public function reporteGradoPeriodoGraduados($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/grado/periodos/vistaPeriodoGraduados', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //? Datos Estadisticos PosGrado
    public function filtroEstadisticoPosGradoPeriodo($tipo)
    {
        try {
            //modelo 
            $obgPeriodo = new ModelFEPeriodo();
            //periodos ordenados en orden descendente en base al año 1997
            $data['tbl_periodo'] = $obgPeriodo->where('PER_ANO >=', 1997)->orderBy('PER_ANO', 'DESC')->findAll();
            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_periodo_matr', $data)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_periodo_grad', $data)
                    . view('footer');
            } else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_periodo_general', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Periodo General
    public function reportePosgradoPeriodoGeneral($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/posgrado/periodos/vistaPeriodoGeneral', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Periodo Matriculados
    public function reportePosgradoPeriodoMatriculados($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/posgrado/periodos/vistaPeriodoMatriculados', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Periodo Graduados
    public function reportePosgradoPeriodoGraduados($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/posgrado/periodos/vistaPeriodoGraduados', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //? Datos Estadisticos Tecnologia
    public function filtroEstadisticoTecnologiaPeriodo($tipo)
    {
        try {
            //modelo 
            $obgPeriodo = new ModelFEPeriodo();
            //periodos
            //$data['tbl_periodo'] = $obgPeriodo->findAll();

            //periodos ordenados en orden descendente en base al año desde el 2021
            $data['tbl_periodo'] = $obgPeriodo->where('PER_ANO >=', 2021)->orderBy('PER_ANO', 'DESC')->findAll();
            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/busqueda/vista_b_periodo_matr', $data)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/busqueda/vista_b_periodo_grad', $data)
                    . view('footer');
            } else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/busqueda/vista_b_periodo_general', $data)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Tecnologia Periodo General
    public function reporteTecnologiaPeriodoGeneral($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/tecnologia/periodos/vistaPeriodoGeneral', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Tecnologia Periodo Matriculados
    public function reporteTecnologiaPeriodoMatriculados($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/tecnologia/periodos/vistaPeriodoMatriculados', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Tecnologia Periodo Graduados
    public function reporteTecnologiaPeriodoGraduados($perid)
    {
        try {
            //modelo matriz
            $modelo = new ModelMatrizGraduados();
            //modelo periodos
            $modeloPeriodo = new ModelFEPeriodo();

            //ver data
            $datos['tbl_estadistica_matriz'] = $modelo->verModelo();
            $datos2['tbl_periodo'] = $modeloPeriodo->verModelo();
            //capturar id $perid
            $datos['perid'] = $perid; // Pasar el ID como parte del array $datos

            return view('header')
                . view('/graficasEstadisticas/tecnologia/periodos/vistaPeriodoGraduados', $datos + $datos2)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
