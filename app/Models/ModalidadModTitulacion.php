<?php

namespace App\Models;

use CodeIgniter\Model;
//modelo periodos
use App\Models\ModelFEPeriodo;

class ModalidadModTitulacion extends Model
{

    protected $table = 'tbl_modalida_titulacion';
    protected $primaryKey = 'MODT_ID ';

    protected $allowedFields = [
        'MODT_NOMBRE', 'MODT_ESTADO',
    ];

    //ver todos los datos
    public function verModelo()
    {
        $modalidad = $this->findAll();
        return $modalidad;
    }

}