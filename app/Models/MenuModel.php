<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table =  'tbl_carrera_tipo';

    protected $primaryKey = 'CTIP_ID ';
    protected $allowedFields = ['CTIP_NOMBRE', 'CTIP_ESTADO'];

    public function obtenerItemsMenu()
    {
        return $this->findAll();
    }
}
