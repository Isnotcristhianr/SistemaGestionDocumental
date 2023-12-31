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
use App\Models\ModelFEescuelas;

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
            $sede = $this->request->getPost('sede');

            $cantmasgen = $this->request->getPost('cantmasgen');
            $cantfemgen = $this->request->getPost('cantfemgen');
            $totalgen = $this->request->getPost('totalgen');


            //procesar datos dinamicamente
            //*etnia
            $indexetnia = $this->request->getPost('indexetnia');
            for ($i = 0; $i < $indexetnia; $i++) {
                $etnia[$i] = $this->request->getPost('etnia_' . $i);
                $cantmasetnia[$i] = $this->request->getPost('cantmasgenetnia_' . $i);
                $cantfemetnia[$i] = $this->request->getPost('cantfemgenetnia_' . $i);
            }

            //*nacionalidad
            $indexnacionalidad = $this->request->getPost('indexnacionalidad');
            for ($i = 0; $i < $indexnacionalidad; $i++) {
                $nacionalidad[$i] = $this->request->getPost('nacionalidad_' . $i);
                $cantmasnacionalidad[$i] = $this->request->getPost('cantmasgennacionalidad_' . $i);
                $cantfemnacionalidad[$i] = $this->request->getPost('cantfemgennacionalidad_' . $i);
            }

            //*genero
            $discgenmas = $this->request->getPost('discgenmas');
            $discgenfem = $this->request->getPost('discgenfem');

            //CLASIFICAR obtener los ids
            $id_carrera_tipop = $objCarreraTipo->obtenerId($id_carrera_tipo);
            $id_condicionp = $objCondicion->obtenerId($id_condicion);
            $id_tipo_gradop = $objModalidad->obtenerId($id_tipo_grado);
            $id_periodop = $objPeriodo->obtenerId($id_periodo);
            $id_carrerap = $objCarrera->obtenerId($id_carrera);

            //preprocesamiento de datos para enviar a la base de datos
            $ESTM_TIPO = $id_carrera_tipop['CTIP_ID'];
            $ESTM_CONDICION = $id_condicionp['EST_ID'];
            $ESTM_TIPO_GRADO = $id_tipo_gradop['MODT_ID'];
            $ESTM_PERIODO = $id_periodop['PER_ID'];
            $ESTM_CARRERA = $id_carrerap['CAR_ID'];
            $ESTM_GENERO_H = $cantmasgen;
            $ESTM_GENERO_M = $cantfemgen;

            //encerado de variables
            $ESTM_ETNIA_MESTIZO_H = 0;
            $ESTM_ETNIA_MESTIZO_M = 0;
            $ESTM_ETNIA_INDIGENA_H = 0;
            $ESTM_ETNIA_INDIGENA_M = 0;
            $ESTM_ETNIA_AFRO_H = 0;
            $ESTM_ETNIA_AFRO_M = 0;
            $ESTM_ETNIA_MONTUBIO_H = 0;
            $ESTM_ETNIA_MONTUBIO_M = 0;
            $ESTM_ETNIA_MULATO_H = 0;
            $ESTM_ETNIA_MULATO_M = 0;
            $ESTM_ETNIA_NEGRO_H = 0;
            $ESTM_ETNIA_NEGRO_M = 0;
            $ESTM_ETNIA_BLANCO_H = 0;
            $ESTM_ETNIA_BLANCO_M = 0;
            $ESTM_NACIONALIDAD_EC_H = 0;
            $ESTM_NACIONALIDAD_EC_M = 0;
            $ESTM_NACIONALIDAD_COL_H = 0;
            $ESTM_NACIONALIDAD_COL_M = 0;
            $ESTM_NACIONALIDAD_ESP_H = 0;
            $ESTM_NACIONALIDAD_ESP_M = 0;
            $ESTM_NACIONALIDAD_FRA_H = 0;
            $ESTM_NACIONALIDAD_FRA_H = 0;
            $ESTM_NACIONALIDAD_FRA_M = 0;
            $ESTM_NACIONALIDAD_USA_H = 0;
            $ESTM_NACIONALIDAD_USA_M = 0;
            $ESTM_NACIONALIDAD_PER_H = 0;
            $ESTM_NACIONALIDAD_PER_M = 0;
            $ESTM_NACIONALIDAD_RUM_H = 0;
            $ESTM_NACIONALIDAD_RUM_M = 0;
            $ESTM_NACIONALIDAD_CUB_H = 0;
            $ESTM_NACIONALIDAD_CUB_M = 0;
            $ESTM_NACIONALIDAD_URC_H = 0;
            $ESTM_NACIONALIDAD_URC_M = 0;
            $ESTM_NACIONALIDAD_VEN_H = 0;
            $ESTM_NACIONALIDAD_VEN_M = 0;
            $ESTM_DISCAPACIDAD_H = 0;
            $ESTM_DISCAPACIDAD_M = 0;

            if ($indexetnia != 0) {
                for ($i = 0; $i < $indexetnia; $i++) {
                    if ($etnia[$i] == "MESTIZO") {
                        $ESTM_ETNIA_MESTIZO_H = $cantmasetnia[$i];
                        $ESTM_ETNIA_MESTIZO_M = $cantfemetnia[$i];
                    } else if ($etnia[$i] == "INDIGENA") {
                        $ESTM_ETNIA_INDIGENA_H = $cantmasetnia[$i];
                        $ESTM_ETNIA_INDIGENA_M = $cantfemetnia[$i];
                    } else if ($etnia[$i] == "Afroecuatoriano") {
                        $ESTM_ETNIA_AFRO_H = $cantmasetnia[$i];
                        $ESTM_ETNIA_AFRO_M = $cantfemetnia[$i];
                    } else if ($etnia[$i] == "Montubio") {
                        $ESTM_ETNIA_MONTUBIO_H = $cantmasetnia[$i];
                        $ESTM_ETNIA_MONTUBIO_M = $cantfemetnia[$i];
                    } else if ($etnia[$i] == "Mulato") {
                        $ESTM_ETNIA_MULATO_H = $cantmasetnia[$i];
                        $ESTM_ETNIA_MULATO_M = $cantfemetnia[$i];
                    } else if ($etnia[$i] == "Negro") {
                        $ESTM_ETNIA_NEGRO_H = $cantmasetnia[$i];
                        $ESTM_ETNIA_NEGRO_M = $cantfemetnia[$i];
                    } else if ($etnia[$i] == "Blanco") {
                        $ESTM_ETNIA_BLANCO_H = $cantmasetnia[$i];
                        $ESTM_ETNIA_BLANCO_M = $cantfemetnia[$i];
                    }
                }
            }

            if ($indexnacionalidad != 0) {
                for ($i = 0; $i < $indexnacionalidad; $i++) {
                    if ($nacionalidad[$i] == "Ecuatoriana") {
                        $ESTM_NACIONALIDAD_EC_H = $cantmasnacionalidad[$i];
                        $ESTM_NACIONALIDAD_EC_M = $cantfemnacionalidad[$i];
                    } else if ($nacionalidad[$i] == "Colombiana") {
                        $ESTM_NACIONALIDAD_COL_H = $cantmasnacionalidad[$i];
                        $ESTM_NACIONALIDAD_COL_M = $cantfemnacionalidad[$i];
                    } else if ($nacionalidad[$i] == "Española") {
                        $ESTM_NACIONALIDAD_ESP_H = $cantmasnacionalidad[$i];
                        $ESTM_NACIONALIDAD_ESP_M = $cantfemnacionalidad[$i];
                    } else if ($nacionalidad[$i] == "Francesa") {
                        $ESTM_NACIONALIDAD_FRA_H = $cantmasnacionalidad[$i];
                        $ESTM_NACIONALIDAD_FRA_M = $cantfemnacionalidad[$i];
                    } else if ($nacionalidad[$i] == "Estadounidense") {
                        $ESTM_NACIONALIDAD_USA_H = $cantmasnacionalidad[$i];
                        $ESTM_NACIONALIDAD_USA_M = $cantfemnacionalidad[$i];
                    } else if ($nacionalidad[$i] == "Peruana") {
                        $ESTM_NACIONALIDAD_PER_H = $cantmasnacionalidad[$i];
                        $ESTM_NACIONALIDAD_PER_M = $cantfemnacionalidad[$i];
                    } else if ($nacionalidad[$i] == "Rumana") {
                        $ESTM_NACIONALIDAD_RUM_H = $cantmasnacionalidad[$i];
                        $ESTM_NACIONALIDAD_RUM_M = $cantfemnacionalidad[$i];
                    } else if ($nacionalidad[$i] == "Cubana") {
                        $ESTM_NACIONALIDAD_CUB_H = $cantmasnacionalidad[$i];
                        $ESTM_NACIONALIDAD_CUB_M = $cantfemnacionalidad[$i];
                    } else if ($nacionalidad[$i] == "Ucraniana") {
                        $ESTM_NACIONALIDAD_URC_H = $cantmasnacionalidad[$i];
                        $ESTM_NACIONALIDAD_URC_M = $cantfemnacionalidad[$i];
                    } else if ($nacionalidad[$i] == "Venezolana") {
                        $ESTM_NACIONALIDAD_VEN_H = $cantmasnacionalidad[$i];
                        $ESTM_NACIONALIDAD_VEN_M = $cantfemnacionalidad[$i];
                    }
                }
            }

            $ESTM_DISCAPACIDAD_H = $discgenmas;
            $ESTM_DISCAPACIDAD_M = $discgenfem;

            $ESTM_TOTAL = $totalgen;
            $ESTM_SEDE = $sede;
            $ESTM_ESTADO  = 0;

            //ENVIO A LA BD
            $datosInsertar = [
                'ESTM_ID' => null,
                'ESTM_TIPO' => $ESTM_TIPO,
                'ESTM_CONDICION' => $ESTM_CONDICION,
                'ESTM_TIPO_GRADO' => $ESTM_TIPO_GRADO,
                'ESTM_PERIODO' => $ESTM_PERIODO,
                'ESTM_CARRERA' => $ESTM_CARRERA,
                'ESTM_GENERO_H' => $ESTM_GENERO_H,
                'ESTM_GENERO_M' => $ESTM_GENERO_M,
                'ESTM_ETNIA_MESTIZO_H' => $ESTM_ETNIA_MESTIZO_H,
                'ESTM_ETNIA_MESTIZO_M' => $ESTM_ETNIA_MESTIZO_M,
                'ESTM_ETNIA_INDIGENA_H' => $ESTM_ETNIA_INDIGENA_H,
                'ESTM_ETNIA_INDIGENA_M' => $ESTM_ETNIA_INDIGENA_M,
                'ESTM_ETNIA_AFRO_H' => $ESTM_ETNIA_AFRO_H,
                'ESTM_ETNIA_AFRO_M' => $ESTM_ETNIA_AFRO_M,
                'ESTM_ETNIA_MONTUBIO_H' => $ESTM_ETNIA_MONTUBIO_H,
                'ESTM_ETNIA_MONTUBIO_M' => $ESTM_ETNIA_MONTUBIO_M,
                'ESTM_ETNIA_MULATO_H' => $ESTM_ETNIA_MULATO_H,
                'ESTM_ETNIA_MULATO_M' => $ESTM_ETNIA_MULATO_M,
                'ESTM_ETNIA_NEGRO_H' => $ESTM_ETNIA_NEGRO_H,
                'ESTM_ETNIA_NEGRO_M' => $ESTM_ETNIA_NEGRO_M,
                'ESTM_ETNIA_BLANCO_H' => $ESTM_ETNIA_BLANCO_H,
                'ESTM_ETNIA_BLANCO_M' => $ESTM_ETNIA_BLANCO_M,
                'ESTM_NACIONALIDAD_EC_H' => $ESTM_NACIONALIDAD_EC_H,
                'ESTM_NACIONALIDAD_EC_M' => $ESTM_NACIONALIDAD_EC_M,
                'ESTM_NACIONALIDAD_COL_H' => $ESTM_NACIONALIDAD_COL_H,
                'ESTM_NACIONALIDAD_COL_M' => $ESTM_NACIONALIDAD_COL_M,
                'ESTM_NACIONALIDAD_ESP_H' => $ESTM_NACIONALIDAD_ESP_H,
                'ESTM_NACIONALIDAD_ESP_M' => $ESTM_NACIONALIDAD_ESP_M,
                'ESTM_NACIONALIDAD_FRA_H' => $ESTM_NACIONALIDAD_FRA_H,
                'ESTM_NACIONALIDAD_FRA_M' => $ESTM_NACIONALIDAD_FRA_M,
                'ESTM_NACIONALIDAD_USA_H' => $ESTM_NACIONALIDAD_USA_H,
                'ESTM_NACIONALIDAD_USA_M' => $ESTM_NACIONALIDAD_USA_M,
                'ESTM_NACIONALIDAD_PER_H' => $ESTM_NACIONALIDAD_PER_H,
                'ESTM_NACIONALIDAD_PER_M' => $ESTM_NACIONALIDAD_PER_M,
                'ESTM_NACIONALIDAD_PER_M' => $ESTM_NACIONALIDAD_PER_M,
                'ESTM_NACIONALIDAD_RUM_H' => $ESTM_NACIONALIDAD_RUM_H,
                'ESTM_NACIONALIDAD_RUM_M' => $ESTM_NACIONALIDAD_RUM_M,
                'ESTM_NACIONALIDAD_CUB_H' => $ESTM_NACIONALIDAD_CUB_H,
                'ESTM_NACIONALIDAD_CUB_M' => $ESTM_NACIONALIDAD_CUB_M,
                'ESTM_NACIONALIDAD_URC_H' => $ESTM_NACIONALIDAD_URC_H,
                'ESTM_NACIONALIDAD_URC_M' => $ESTM_NACIONALIDAD_URC_M,
                'ESTM_NACIONALIDAD_VEN_H' => $ESTM_NACIONALIDAD_VEN_H,
                'ESTM_NACIONALIDAD_VEN_M' => $ESTM_NACIONALIDAD_VEN_M,
                'ESTM_DISCAPACIDAD_H' => $ESTM_DISCAPACIDAD_H,
                'ESTM_DISCAPACIDAD_M' => $ESTM_DISCAPACIDAD_M,
                'ESTM_TOTAL' => $ESTM_TOTAL,
                'ESTM_SEDE' => $ESTM_SEDE,
                'ESTM_ESTADO' => $ESTM_ESTADO
            ];

            $objEstadMatr->insertar($datosInsertar);

            echo "datos insertados correctamente";

            //redireccionar
            return redirect()->to(base_url() . 'index.php/subidaDatos/manualmente');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //*vista datos conjunto
    public function subirConjuntoDatos()
    {
        try {

            echo view('header');
            echo view('subida/vistaDatosConjunto');
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }


    //!Subida por csv, leer archivo csv
    public function subirConjuntoDatosCsv()
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

            //procesammiento del csv
            $archivo = $this->request->getFile('archivo');

            $file = fopen($archivo, 'r', 'UTF-8');
            if ($file) {
                // Inicializar el array para almacenar los datos
                $csvData = [];

                // Leer el archivo línea por línea y procesar los datos
                while (($line = fgetcsv($file, 0, ';')) !== false) {

                    //forzar codificacion utf8
                    $line = array_map('utf8_encode', $line);


                    // Reemplazar los valores entre ;; con 0 en la primera columna
                    $line[0] = str_replace(';;', ';0;', $line[0]);

                    // Celdas vacías colocar 0 en todas las columnas
                    foreach ($line as &$value) {
                        if ($value === "") {
                            $value = 0;
                        }
                    }

                    // Agregar la fila procesada al array de datos
                    $csvData[] = $line;
                }

                // Cerrar el archivo
                fclose($file);

                // Obtener filas y columnas después de procesar el archivo
                $filas = count($csvData);
                $columnas = count($csvData[0]);

                echo "Filas: " . $filas . " Columnas: " . $columnas . "<br>";

                $datos = [];
                for ($i = 0; $i < $filas; $i++) {
                    for ($j = 0; $j < $columnas; $j++) {
                        $datos[$i][$j] = $csvData[$i][$j];
                        //    echo $datos[$i][$j] . " ";
                    }
                    //  echo "<br>";
                }

                //encerado de variables
                {
                    $ESTM_ID = null;
                    $ESTM_TIPO = 0;
                    $ESTM_CONDICION = 0;
                    $ESTM_TIPO_GRADO = 0;
                    $ESTM_PERIODO = 0;
                    $ESTM_CARRERA = 0;
                    $ESTM_GENERO_H = 0;
                    $ESTM_GENERO_M = 0;
                    $ESTM_ETNIA_MESTIZO_H = 0;
                    $ESTM_ETNIA_MESTIZO_M = 0;
                    $ESTM_ETNIA_INDIGENA_H = 0;
                    $ESTM_ETNIA_INDIGENA_M = 0;
                    $ESTM_ETNIA_AFRO_H = 0;
                    $ESTM_ETNIA_AFRO_M = 0;
                    $ESTM_ETNIA_MONTUBIO_H = 0;
                    $ESTM_ETNIA_MONTUBIO_M = 0;
                    $ESTM_ETNIA_MULATO_H = 0;
                    $ESTM_ETNIA_MULATO_M = 0;
                    $ESTM_ETNIA_NEGRO_H = 0;
                    $ESTM_ETNIA_NEGRO_M = 0;
                    $ESTM_ETNIA_BLANCO_H = 0;
                    $ESTM_ETNIA_BLANCO_M = 0;
                    $ESTM_NACIONALIDAD_EC_H = 0;
                    $ESTM_NACIONALIDAD_EC_M = 0;
                    $ESTM_NACIONALIDAD_COL_H = 0;
                    $ESTM_NACIONALIDAD_COL_M = 0;
                    $ESTM_NACIONALIDAD_ESP_H = 0;
                    $ESTM_NACIONALIDAD_ESP_M = 0;
                    $ESTM_NACIONALIDAD_FRA_H = 0;
                    $ESTM_NACIONALIDAD_FRA_H = 0;
                    $ESTM_NACIONALIDAD_FRA_M = 0;
                    $ESTM_NACIONALIDAD_USA_H = 0;
                    $ESTM_NACIONALIDAD_USA_M = 0;
                    $ESTM_NACIONALIDAD_PER_H = 0;
                    $ESTM_NACIONALIDAD_PER_M = 0;
                    $ESTM_NACIONALIDAD_RUM_H = 0;
                    $ESTM_NACIONALIDAD_RUM_M = 0;
                    $ESTM_NACIONALIDAD_CUB_H = 0;
                    $ESTM_NACIONALIDAD_CUB_M = 0;
                    $ESTM_NACIONALIDAD_URC_H = 0;
                    $ESTM_NACIONALIDAD_URC_M = 0;
                    $ESTM_NACIONALIDAD_VEN_H = 0;
                    $ESTM_NACIONALIDAD_VEN_M = 0;
                    $ESTM_DISCAPACIDAD_H = 0;
                    $ESTM_DISCAPACIDAD_M = 0;
                    $ESTM_TOTAL = 0;
                    $ESTM_SEDE = 0;
                    $ESTM_ESTADO  = 0;
                }

                //procesamiendo de datos por filas
                $datosprocesados = [];

                for ($i = 0; $i < $filas; $i++) {

                    $datosprocesados[$i] = [];

                    //col 0 tipo
                    $tipoEstudio = $csvData[$i][0];
                    switch ($tipoEstudio) {
                        case 'Posgrado':
                            $ESTM_TIPO = 1;
                            break;
                        case 'Grado':
                            $ESTM_TIPO = 2;
                            break;
                        case 'Tecnología':
                            $ESTM_TIPO = 3;
                            break;
                        default:
                            $ESTM_TIPO = 2; // Valor predeterminado si no coincide con ninguna condición
                            break;
                    }

                    //col 1 condicion
                    $condicion = $csvData[$i][1];
                    switch ($condicion) {
                        case 'Matriculado':
                            $ESTM_CONDICION = 1;
                            break;
                        case 'Egresado':
                            $ESTM_CONDICION = 2;
                            break;
                        case 'Graduado':
                            $ESTM_CONDICION = 3;
                            break;
                        default:
                            $ESTM_CONDICION = 1;
                            break;
                    }

                    //col 2 tipo de grado
                    $tipoGrado = $csvData[$i][2];
                    switch ($tipoGrado) {
                        case 'Trabajo de titulación':
                            $ESTM_TIPO_GRADO = 1;
                            break;
                        case 'Examen complexivo':
                            $ESTM_TIPO_GRADO = 2;
                            break;
                        case 'Trabajo de la unidad de integración curricular':
                            $ESTM_TIPO_GRADO = 3;
                            break;
                        case 'N/E':
                            $ESTM_TIPO_GRADO = 1;
                            break;
                        default:
                            $ESTM_TIPO_GRADO = 1;
                            break;
                    }

                    //COL 3 periodo
                    $periodo = $csvData[$i][3];
                    //buscar el id del periodo de cada fila en tbl
                    $id_periodop = $objPeriodo->obtenerId($periodo);
                    $ESTM_PERIODO = $id_periodop['PER_ID'];

                    //col 4 carrera
                    $carrera = $csvData[$i][4];
                    //buscar el id de la carrera de cada fila en tbl
                    $id_carrerap = $objCarrera->obtenerId($carrera);
                    $ESTM_CARRERA = $id_carrerap['CAR_ID'];

                    $datosprocesados[$i] = [
                        'ESTM_ID' => $ESTM_ID,
                        'ESTM_TIPO' => $ESTM_TIPO,
                        'ESTM_CONDICION' => $ESTM_CONDICION,
                        'ESTM_TIPO_GRADO' => $ESTM_TIPO_GRADO,
                        'ESTM_PERIODO' => $ESTM_PERIODO,
                        'ESTM_CARRERA' => $ESTM_CARRERA,
                        'ESTM_GENERO_H' => $csvData[$i][5],
                        'ESTM_GENERO_M' => $csvData[$i][6],
                        'ESTM_ETNIA_MESTIZO_H' => $csvData[$i][7],
                        'ESTM_ETNIA_MESTIZO_M' => $csvData[$i][8],
                        'ESTM_ETNIA_INDIGENA_H' => $csvData[$i][9],
                        'ESTM_ETNIA_INDIGENA_M' => $csvData[$i][10],
                        'ESTM_ETNIA_AFRO_H' => $csvData[$i][11],
                        'ESTM_ETNIA_AFRO_M' => $csvData[$i][12],
                        'ESTM_ETNIA_MONTUBIO_H' => $csvData[$i][13],
                        'ESTM_ETNIA_MONTUBIO_M' => $csvData[$i][14],
                        'ESTM_ETNIA_MULATO_H' => $csvData[$i][15],
                        'ESTM_ETNIA_MULATO_M' => $csvData[$i][16],
                        'ESTM_ETNIA_NEGRO_H' => $csvData[$i][17],
                        'ESTM_ETNIA_NEGRO_M' => $csvData[$i][18],
                        'ESTM_ETNIA_BLANCO_H' => $csvData[$i][19],
                        'ESTM_ETNIA_BLANCO_M' => $csvData[$i][20],
                        'ESTM_NACIONALIDAD_EC_H' => $csvData[$i][21],
                        'ESTM_NACIONALIDAD_EC_M' => $csvData[$i][22],
                        'ESTM_NACIONALIDAD_COL_H' => $csvData[$i][23],
                        'ESTM_NACIONALIDAD_COL_M' => $csvData[$i][24],
                        'ESTM_NACIONALIDAD_ESP_H' => $csvData[$i][25],
                        'ESTM_NACIONALIDAD_ESP_M' => $csvData[$i][26],
                        'ESTM_NACIONALIDAD_FRA_H' => $csvData[$i][27],
                        'ESTM_NACIONALIDAD_FRA_M' => $csvData[$i][28],
                        'ESTM_NACIONALIDAD_USA_H' => $csvData[$i][29],
                        'ESTM_NACIONALIDAD_USA_M' => $csvData[$i][30],
                        'ESTM_NACIONALIDAD_PER_H' => $csvData[$i][31],
                        'ESTM_NACIONALIDAD_PER_M' => $csvData[$i][32],
                        'ESTM_NACIONALIDAD_RUM_H' => $csvData[$i][33],
                        'ESTM_NACIONALIDAD_RUM_M' => $csvData[$i][34],
                        'ESTM_NACIONALIDAD_CUB_H' => $csvData[$i][35],
                        'ESTM_NACIONALIDAD_CUB_M' => $csvData[$i][36],
                        'ESTM_NACIONALIDAD_URC_H' => $csvData[$i][37],
                        'ESTM_NACIONALIDAD_URC_M' => $csvData[$i][38],
                        'ESTM_NACIONALIDAD_VEN_H' => $csvData[$i][39],
                        'ESTM_NACIONALIDAD_VEN_M' => $csvData[$i][40],
                        'ESTM_DISCAPACIDAD_H' => $csvData[$i][41],
                        'ESTM_DISCAPACIDAD_M' => $csvData[$i][42],
                        'ESTM_TOTAL' => $csvData[$i][43],
                        'ESTM_SEDE' => $csvData[$i][44],
                        'ESTM_ESTADO' => $ESTM_ESTADO
                    ];

                    echo "<br>";
                    //subir a la bd
                    $objEstadMatr->insertar($datosprocesados[$i]);
                }

                //redireccionar
                return redirect()->to(base_url() . 'index.php/subidaDatos/subirConjuntoDatos');
            } else {
                echo "No se pudo abrir el archivo CSV.";
            }
        } catch (\Exception $e) {
            //mostrar error en que linea del csv esta el error
            die($e->getMessage());
        }
    }

    //ver periodos
    public function verPeriodos()
    {
        try {
            $objPeriodo = new ModelFEPeriodo();
            $data['tbl_periodo'] = $objPeriodo->verModelo();

            echo view('header');
            echo view('subida/verPeriodos', $data);
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //ver carreras
    public function verCarreras()
    {
        try {
            $objCarrera = new ModelFEcarreras();
            $data['tbl_carrera'] = $objCarrera->verCarreras();

            echo view('header');
            echo view('subida/verCarreras', $data);
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //ver escuelas
    public function verEscuelas()
    {
        try {
            $objEscuela = new ModelFEcarreras();
            $data['tbl_carrera'] = $objEscuela->verEscuelas();

            echo view('header');
            echo view('subida/verEscuelas', $data);
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
