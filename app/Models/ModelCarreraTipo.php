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

    //obtener id acorde al nombre
    public function obtenerId($nombre)
    {
        $carreraTipo = $this->where('CTIP_NOMBRE', $nombre)->first();
        return $carreraTipo;
    }
}
