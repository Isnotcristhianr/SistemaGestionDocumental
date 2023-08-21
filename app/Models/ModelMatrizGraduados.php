<?php

namespace App\Models;

use CodeIgniter\Model;
//modelo periodos
use App\Models\ModelFEPeriodo;

class ModelMatrizGraduados extends Model
{
    protected $table =  'tbl_estadistica_matriz';
    protected $primaryKey = 'ESTM_ID ';

    protected $allowedFields = [
        'ESTM_TIPO', 'ESTM_CONDICION', 'ESTM_TIPO_GRADO', 'ESTM_PERIODO', 'ESTM_CARRERA',
        'ESTM_GENERO_H', 'ESTM_GENERO_M', 'ESTM_ETNIA_MESTIZO_H', 'ESTM_ETNIA_MESTIZO_M',
        'ESTM_ETNIA_INDIGENA_H', 'ESTM_ETNIA_INDIGENA_M', 'ESTM_ETNIA_AFRO_H', 'ESTM_ETNIA_AFRO_M',
        'ESTM_ETNIA_MONTUBIO_H', 'ESTM_ETNIA_MONTUBIO_M', 'ESTM_ETNIA_MULATO_H', 'ESTM_ETNIA_MULATO_M',
        'ESTM_ETNIA_NEGRO_H', 'ESTM_ETNIA_NEGRO_M', 'ESTM_ETNIA_BLANCO_H', 'ESTM_ETNIA_BLANCO_M',
        'ESTM_NACIONALIDAD_EC_H', 'ESTM_NACIONALIDAD_EC_M', 'ESTM_NACIONALIDAD_COL_H', 'ESTM_NACIONALIDAD_COL_M',
        'ESTM_NACIONALIDAD_ESP_H', 'ESTM_NACIONALIDAD_ESP_M', 'ESTM_NACIONALIDAD_FRA_H', 'ESTM_NACIONALIDAD_FRA_M',
        'ESTM_NACIONALIDAD_USA_H', 'ESTM_NACIONALIDAD_USA_M', 'ESTM_NACIONALIDAD_PER_H', 'ESTM_NACIONALIDAD_PER_M',
        'ESTM_NACIONALIDAD_RUM_H', 'ESTM_NACIONALIDAD_RUM_M', 'ESTM_NACIONALIDAD_CUB_H', 'ESTM_NACIONALIDAD_CUB_M',
        'ESTM_NACIONALIDAD_URC_H', 'ESTM_NACIONALIDAD_URC_M', 'ESTM_NACIONALIDAD_VEN_H', 'ESTM_NACIONALIDAD_VEN_M',
        'ESTM_DISCAPACIDAD_H', 'ESTM_DISCAPACIDAD_M', 'ESTM_TOTAL', 'ESTM_SEDE', 'ESTM_ESTADO',
    ];

    /* Ver datos todos*/
    public function verModelo()
    {
        $matrizEstadist = $this->findAll();
        return $matrizEstadist;
    }

    /* Contar total periodos filas Grados*/
    public function contar()
    {
        $matrizEstadist = $this->findAll();
        return count($matrizEstadist);
    }

    /* Ver Modelo Especifico */
    public function verModeloEspecifico($fechaIncio, $fechaFin)
    {
        //obtener año de las fechasç
        $anioInicio = substr($fechaIncio, 0, 4);
        $anioFin = substr($fechaFin, 0, 4);
        //crear campo hidden para luego leer en el controlador
        $data = [
            'fechaInicio' => $fechaIncio,
            'fechaFin' => $fechaFin,
        ];
        
        //TODO periodo tiene PER_ID, PER_ANO, se compara con la fecha de inicio y fin y se extrae el PER_ID
        //TODO matrizEstadist busca donde coincide ese PER_ID con ESTM_PERIODO y se busca

        //modelo periodos
        $modeloPeriodo = new ModelFEPeriodo();
        //ver data
        $periodo = $modeloPeriodo->where('PER_ANO >=', $anioInicio)->where('PER_ANO <=', $anioFin)->findAll();
        $idPeriodoInicio = $periodo[0]['PER_ID'];
        $idPeriodoFin = $periodo[count($periodo) - 1]['PER_ID'];

        $matrizEstadist = $this->where('ESTM_PERIODO >=', $idPeriodoInicio)->where('ESTM_PERIODO <=', $idPeriodoFin)->findAll();

        return $matrizEstadist;
    }
}
