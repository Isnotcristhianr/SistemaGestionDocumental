<?php

namespace App\Controllers;

use App\Models\ModelFEcarreras;
use App\Models\ModelFEpadre;
use App\Models\modelRepTitulacion;
use App\Models\ModelMatrizGraduados;
use App\Models\ModelFEPeriodo;

class ControladorFECarrera extends BaseController
{

    //*crear carrera
    public function crearCarrera()
    {
        try {
            //modelo
            $objCarrera = new ModelFEcarreras();

            //padre
            $data['tbl_escuela'] = $objCarrera->findAll();

            //capturar datos
            $CAR_ID = null;
            $cartipo = $this->request->getPost('cartipo');
            //$CTIP_ID = 0;
            if ($cartipo ==  "Grado") {
                $CTIP_ID = 2;
            } else if ($cartipo == "Posgrado") {
                $CTIP_ID = 1;
            } else if ($cartipo == "Tecnología") {
                $CTIP_ID = 3;
            }
            $CAR_NOMBRE = $this->request->getPost('carnombre');
            $CAR_CARRERA = 1;
            $CAR_ESCUELA = 0;
            $escuela = $this->request->getPost('escuela');
            $CAR_PADREESC = $this->obtenerPadreEscuela($escuela);
            $CAR_ACTIVA = $this->request->getPost('activecar');
            $CAR_CAMPUS = $this->request->getPost('sede');
            $CAR_ESTADO = 0;


            //mostrar
            echo "tipo: " . $CTIP_ID;
            echo "<br> nombre: " . $CAR_NOMBRE;
            echo "<br> carrera: " . $CAR_CARRERA;
            echo "<br> escuela: " . $CAR_ESCUELA;
            echo "<br> padreesc: " . $CAR_PADREESC;
            echo "<br> activa: " . $CAR_ACTIVA;
            echo "<br> campus: " . $CAR_CAMPUS;
            echo "<br> estado: " . $CAR_ESTADO;

            //datos
            $datos = [
                'CTIP_ID' => $CTIP_ID,
                'CAR_NOMBRE' => $CAR_NOMBRE,
                'CAR_CARRERA' => $CAR_CARRERA,
                'CAR_ESCUELA' => $CAR_ESCUELA,
                'CAR_PADREESC' => $CAR_PADREESC,
                'CAR_ACTIVA' => $CAR_ACTIVA,
                'CAR_CAMPUS' => $CAR_CAMPUS,
                'CAR_ESTADO' => $CAR_ESTADO
            ];

            //insertar
            $objCarrera->insert($datos);

            //redireccionar
            return redirect()->to(base_url() . 'index.php/subidaDatos/manualmente');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //* obtener car_padre esc acorde al nombre
    //obtener CAR_PADREESC acorde CAR_NOMBRE
    public function obtenerPadreEscuela($nombre)
    {
        try {
            //modelo
            $objCarrera = new ModelFEcarreras();

            //obtener CAR_PADREESC acorde CAR_NOMBRE
            $data['tbl_carrera'] = $objCarrera
                ->where('CAR_NOMBRE', $nombre)
                ->findAll();

            //enviar CAR_PADREESC
            return $data['tbl_carrera'][0]['CAR_PADREESC'];
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Datos Estadisticos Grado
    public function filtroEstadisticoGradoCarrera($tipo)
    {
        try {
            //modelo
            $objEstadMatr = new ModelFEcarreras();
            $objPadre = new ModelFEpadre();

            //car_nombre donde ctip = 2, car_carrera = 1
            $data['tbl_carrera'] = $objEstadMatr
                ->where('CTIP_ID', 2)
                ->where('CAR_CARRERA', 1)
                ->findAll();

            $padre['tbl_escuela'] = $objPadre->findAll();

            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_carrera_matr', $data + $padre)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_carrera_grad', $data + $padre)
                    . view('footer');
            } else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/Grados/busqueda/vista_b_carrera_general', $data + $padre)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Carrera General
    public function reporteGradoCarreraGeneral($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/grado/carreras/vistaCarreraGeneral', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Carrera Matriculados
    public function reporteGradoCarreraMatriculados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/grado/carreras/vistaCarreraMatriculados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Grado Carrera Graduados
    public function reporteGradoCarreraGraduados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/grado/carreras/vistaCarreraGraduados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //? Datos Estadisticos Posgrado
    public function filtroEstadisticoPosgradoCarrera($tipo)
    {
        try {
            //modelo
            $objEstadMatr = new ModelFEcarreras();
            $objPadre = new ModelFEpadre();

            //car_nombre donde ctip = 1, car_carrera = 1
            $data['tbl_carrera'] = $objEstadMatr
                ->where('CTIP_ID', 1)
                ->where('CAR_CARRERA', 1)
                ->findAll();

            $padre['tbl_escuela'] = $objPadre->findAll();

            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_carrera_matr', $data + $padre)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_carrera_grad', $data + $padre)
                    . view('footer');
            } else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/PosGrados/busqueda/vista_b_carrera_general', $data + $padre)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Carrera General
    public function reportePosgradoCarreraGeneral($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/posgrado/carreras/vistaCarreraGeneral', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Carrera Matriculados
    public function reportePosgradoCarreraMatriculados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/posgrado/carreras/vistaCarreraMatriculados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Posgrado Carrera Graduados
    public function reportePosgradoCarreraGraduados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/posgrado/carreras/vistaCarreraGraduados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //? Datos Estadisticos Tecnologias
    public function filtroEstadisticoTecnologiaCarrera($tipo)
    {
        try {
            //modelo
            $objEstadMatr = new ModelFEcarreras();
            $objPadre = new ModelFEpadre();

            //car_nombre donde ctip = 3, car_carrera = 1
            $data['tbl_carrera'] = $objEstadMatr
                ->where('CTIP_ID', 3)
                ->where('CAR_CARRERA', 1)
                ->findAll();

            $padre['tbl_escuela'] = $objPadre->findAll();

            if ($tipo == "Matriculados") {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/busqueda/vista_b_carrera_matr', $data + $padre)
                    . view('footer');
            } else if ($tipo == "Graduados") {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/busqueda/vista_b_carrera_grad', $data + $padre)
                    . view('footer');
            } else if ($tipo == "General") {
                return view('header')
                    . view('/DatosEstadisticos/Tecnologias/busqueda/vista_b_carrera_general', $data + $padre)
                    . view('footer');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Tecnologia Carrera General
    public function reporteTecnologiaCarreraGeneral($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/tecnologia/carreras/vistaCarreraGeneral', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Tecnologia Carrera Matriculados
    public function reporteTecnologiaCarreraMatriculados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/tecnologia/carreras/vistaCarreraMatriculados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //Reporte Tecnologia Carrera Graduados
    public function reporteTecnologiaCarreraGraduados($id)
    {
        try {
            //modelo
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera
            $objCarrera = new ModelFEcarreras();
            //tbl_estadistica_matriz tiene ESTM_CARRERA comparar con $id
            $data['tbl_estadistica_matriz'] = $objEstadMatr->where('ESTM_CARRERA', $id)->findAll();
            $carreras['tbl_carrera'] = $objCarrera->findAll();

            //capturar id como car_id
            $data['car_id'] = $id;
            return view('header')
                . view('/graficasEstadisticas/tecnologia/carreras/vistaCarreraGraduados', $data + $carreras)
                . view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
