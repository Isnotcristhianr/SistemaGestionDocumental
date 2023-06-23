<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelFEPeriodo extends Model{
    protected $table =  'tbl_periodo';
    protected $primaryKey = 'PER_ID';

    protected $allowedFields = ['PER_ANIO','PER_PERIODO'];

    /* Contar total perdidos filas */
    public function contarPeriodos(){
        $periodos = $this->findAll();
        return count($periodos);
    }
}
