<?php

namespace App\Controllers;

use Exception;
use Kint\Parser\ToStringPlugin;

use App\Models\ModelMatrizGraduados;

//carrera tipo
use App\Models\ModelCarreraTipo;
//condicion
use App\Models\ModelCondicion;
//modalidad
use App\Models\ModalidadModTitulacion;
//periodo
use App\Models\ModelFEPeriodo;
//carrera
use App\Models\ModelFEcarreras;


class ControladorSubidaDatos extends BaseController
{

    //*subida datos menu
    public function subidaDatos()
    {
        try {

            echo view('header');
            echo view('subida/menuDatos');
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //*subida datos manual
    public function subirManualmente()
    {
        try {

            //matriz
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera tipo
            $objCarreraTipo = new ModelCarreraTipo();
            //condicion
            $objCondicion = new ModelCondicion();
            //modalidad
            $objModalidad = new ModalidadModTitulacion();
            //periodo
            $objPeriodo = new ModelFEPeriodo();
            //carrera
            $objCarrera = new ModelFEcarreras();

            $data['tbl_estadistica_matriz'] = $objEstadMatr->verModelo();
            $data['tbl_carrera_tipo'] = $objCarreraTipo->verModelo();
            $data['tbl_estudiante'] = $objCondicion->verModelo();
            $data['tbl_modalida_titulacion'] = $objModalidad->verModelo();
            $data['tbl_periodo'] = $objPeriodo->verModelo();
            $data['tbl_carrera'] = $objCarrera->verModelo();


            echo view('header');
            echo view('subida/manualmente', $data);
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //*enviar datos manualmente post
    public function enviarManualmente()
    {
        try {

            //matriz
            $objEstadMatr = new ModelMatrizGraduados();
            //carrera tipo
            $objCarreraTipo = new ModelCarreraTipo();
            //condicion
            $objCondicion = new ModelCondicion();
            //modalidad
            $objModalidad = new ModalidadModTitulacion();
            //periodo
            $objPeriodo = new ModelFEPeriodo();
            //carrera
            $objCarrera = new ModelFEcarreras();

            //obtener datos
            $id_carrera_tipo = $this->request->getPost('id_carrera_tipo');
            $id_condicion = $this->request->getPost('id_condicion');
            $id_tipo_grado = $this->request->getPost('id_tipo_grado');
            $id_periodo = $this->request->getPost('id_periodo');
            $id_carrera = $this->request->getPost('id_carrera');

            $cantmasgen = $this->request->getPost('cantmasgen');
            $cantfemgen = $this->request->getPost('cantfemgen');
            $totalgen = $this->request->getPost('totalgen');

            //CLASIFICAR obtener los ids
            $id_carrera_tipop = $objCarreraTipo->obtenerId($id_carrera_tipo);
            $id_condicionp = $objCondicion->obtenerId($id_condicion);
            $id_tipo_gradop = $objModalidad->obtenerId($id_tipo_grado);
            $id_periodop = $objPeriodo->obtenerId($id_periodo);
            $id_carrerap = $objCarrera->obtenerId($id_carrera);


            //muestra
            echo "carrera tipo: " . $id_carrera_tipo;
            echo "<br>";
            echo "carrera tipo id: " . $id_carrera_tipop['CTIP_ID'];
            echo "<br>";
            echo "condicion: " . $id_condicion;
            echo "<br>";
            echo "condicion id: " . $id_condicionp['EST_ID'];
            echo "<br>";
            echo "tipo grado: " . $id_tipo_grado;
            echo "<br>";
            echo "tipo grado id: " . $id_tipo_gradop['MODT_ID'];
            echo "<br>";
            echo "periodo: " . $id_periodo;
            echo "<br>";
            echo "periodo id: " . $id_periodop['PER_ID'];
            echo "<br>";
            echo "carrera: " . $id_carrera;
            echo "<br>";
            echo "carrera id: " . $id_carrerap['CAR_ID'];
            echo "<br>";
            echo "cantmasgen: " . $cantmasgen;
            echo "<br>";
            echo "cantfemgen: " . $cantfemgen;
            echo "<br>";
            echo "totalgen: " . $totalgen;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
