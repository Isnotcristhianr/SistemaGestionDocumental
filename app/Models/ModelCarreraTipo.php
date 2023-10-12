<?php

namespace App\Models;

use CodeIgniter\Model;
//modelo periodos
use App\Models\ModelFEPeriodo;

class ModelCarreraTipo extends Model
{

    protected $table =  'tbl_carrera_tipo';
    protected $primaryKey = 'CTIP_ID ';

    protected $allowedFields = [
        'CTIP_NOMBRE', 'CTIP_ESTADO',
    ];

    //ver todos los datos
    public function verModelo()
    {
        $carreraTipo = $this->findAll();
        return $carreraTipo;
    }
}
