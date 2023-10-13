<?php

namespace App\Models;

use CodeIgniter\Model;
//modelo periodos
use App\Models\ModelFEPeriodo;

class ModelCondicion extends Model
{

    protected $table =  'tbl_estudiante';
    protected $primaryKey = 'EST_ID ';

    protected $allowedFields = [
        'EST_NOMBRE', 'EST_ESTADO',
    ];

    //ver todos los datos
    public function verModelo()
    {
        $condicion = $this->findAll();
        return $condicion;
    }

    //obtener id acorde al nombre
    public function obtenerId($nombre)
    {
        $condicion = $this->where('EST_NOMBRE', $nombre)->first();
        return $condicion;
    }

    //obtener nombre acorde al id
    public function obtenerNombre($id)
    {
        $condicion = $this->where('EST_ID', $id)->first();
        return $condicion;
    }

}