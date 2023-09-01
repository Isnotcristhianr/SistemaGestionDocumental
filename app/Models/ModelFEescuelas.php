<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFEescuelas extends Model
{
    protected $table =  'tbl_carrera';
    protected $primaryKey = 'CAR_ID';

    protected $allowedFields = ['CTIP_ID', 'CAR_NOMBRE', 'CAR_CARRERA', 'CAR_ESCUELA', 'CAR_PADREESC', 'CAR_ACTIVA', 'CAR_CAMPUS', 'CAR_ESTADO'];

    /* //////////////////////GRADOS///////////////////////////// */
    /* Contar total escuelas modalidad grado*/
    public function contarEscuelasGrado()
    {
        /* contar CAR_ESCUELA = 1 (grado) CTIP_ID = 2 (GRADO)*/
        $escuelas = $this->where('CTIP_ID', 2)->where('CAR_ESCUELA', 1)->findAll();
        return count($escuelas);
    }
    /* Contar total escuelas modalidad grado vigentes*/
    public function contarEscuelasGradoVigentes()
    {
        /* contar CAR_ESCUELA = 1 (grado) CTIP_ID = 2 (GRADO) ACTIVA = Sí (vigente)*/
        $escuelas = $this->where('CTIP_ID', 2)->where('CAR_ESCUELA', 1)->where('CAR_ACTIVA', 'Sí')->findAll();
        return count($escuelas);
    }
    /* Contar total escuelas modalidad grado no vigentes*/
    public function contarEscuelasGradoNoVigentes()
    {
        /* contar CAR_ESCUELA = 1 (grado) CTIP_ID = 2 (GRADO) ACTIVA = No (no vigente)*/
        $escuelas = $this->where('CTIP_ID', 2)->where('CAR_ESCUELA', 1)->where('CAR_ACTIVA', 'No')->findAll();
        return count($escuelas);
    }
    //////////////////////Posgrados///////////////////////////////////////
    /* Contar total escuelas modalidad posgrado*/
    public function contarEscuelasPosgrado()
    {
       /* contar CAR_ESCUELA = 1 (grado) CTIP_ID = 2 (GRADO)*/
       $escuelas = $this->where('CTIP_ID', 2)->where('CAR_ESCUELA', 1)->findAll();
        return count($escuelas);
    }
    /* Contar total escuelas modalidad posgrado vigentes*/
    public function contarEscuelasPosgradoVigentes()
    {
        /* contar CAR_ESCUELA = 1 (grado) CTIP_ID = 2 (GRADO) ACTIVA = Sí (vigente)*/
        $escuelas = $this->where('CTIP_ID', 2)->where('CAR_ESCUELA', 1)->where('CAR_ACTIVA', 'Sí')->findAll();
        return count($escuelas);
    }
    /* Contar total escuelas modalidad posgrado no vigentes*/
    public function contarEscuelasPosgradoNoVigentes()
    {
         /* contar CAR_ESCUELA = 1 (grado) CTIP_ID = 2 (GRADO) ACTIVA = No (no vigente)*/
         $escuelas = $this->where('CTIP_ID', 2)->where('CAR_ESCUELA', 1)->where('CAR_ACTIVA', 'No')->findAll();
        return count($escuelas);
    }
}
