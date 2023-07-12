<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFEpadre extends Model
{
    protected $table =  'tbl_escuela';
    protected $primaryKey = 'esc_id';

    protected $allowedFields = ['esc_padre', 'esc_nombre', 'esc_campus', 'esc_vigente', 'esc_estado'];

    /* //////////////////////GRADOS///////////////////////////// */
    /* Contar total carreras modalidad grado*/
    public function todasEscuelas()
    {
        $escuelas = $this->findAll();
        return $escuelas;
    }
}
