<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFEescuelas extends Model
{
    protected $table =  'tbl_carrera';
    protected $primaryKey = 'CAR_ID';

    protected $allowedFields = ['CTIP_ID', 'CAR_NOMBRE', 'CAR_CARRERA', 'CAR_ESCUELA', 'CAR_PADREESC', 'CAR_ACTIVA', 'CAR_ESTADO'];

    /* Contar total escuelas modalidad grado*/
    public function contarEscuelasGrado()
    {
        /* contar CAR_ESCUELA = 1 (grado) CTIP_ID = 2 (GRADO)*/
        $escuelas = $this->where('CTIP_ID', 2)->where('CAR_ESCUELA', 1)->findAll();
        return count($escuelas);

    }
}
