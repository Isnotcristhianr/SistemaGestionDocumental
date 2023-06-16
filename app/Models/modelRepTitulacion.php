<?php
namespace App\Models;

use CodeIgniter\Model;

class modelRepTitulacion extends Model{
    protected $table =  'tbl_periodo';
    protected $primaryKey = 'PER_ID';

    protected $allowedFields = ['PER_ANIO','PER_PERIODO'];


}
