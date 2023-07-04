<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFEcarreras extends Model
{
    protected $table =  'tbl_carrera';
    protected $primaryKey = 'CAR_ID';

    protected $allowedFields = ['CTIP_ID', 'CAR_NOMBRE', 'CAR_CARRERA', 'CAR_ESCUELA', 'CAR_PADREESC', 'CAR_ACTIVA', 'CAR_ESTADO'];

    /* //////////////////////GRADOS///////////////////////////// */
    /* Contar total carreras modalidad grado*/
    public function contarCarrerasGrado()
    {
        /* contar CAR_CARRERA = 1 (grado) CTIP_ID = 2 (GRADO) */
        $carreras = $this->where('CTIP_ID', 2)->where('CAR_CARRERA', 1)->findAll();
        return count($carreras);
    }
    /* Contar total carreras modalidad grado vigentes*/
    public function contarCarrerasGradoVigentes()
    {
        /* contar CAR_CARRERA = 1 (grado) CTIP_ID = 2 (GRADO) ACTIVA = Si (vigente) */
        $carreras = $this->where('CTIP_ID', 2)->where('CAR_CARRERA', 1)->where('CAR_ACTIVA', 'Si')->findAll();
        return count($carreras);
    }
    /* Contar total escuelas modalidad grado no vigentes*/
    public function contarCarrerasGradoNoVigentes()
    {
        /* contar CAR_CARRERA = 1 (grado) CTIP_ID = 2 (GRADO) ACTIVA = No (no vigente) */
        $carreras = $this->where('CTIP_ID', 2)->where('CAR_CARRERA', 1)->where('CAR_ACTIVA', 'No')->findAll();
        return count($carreras);
    }
    //////////////////////Posgrados///////////////////////////////////////
    /* Contar total carreras modalidad posgrado*/
    public function contarCarrerasPosgrado()
    {
        /* contar CAR_CARRERA = 1 (grado) CTIP_ID = 2 (GRADO) */
        $carreras = $this->where('CTIP_ID', 1)->where('CAR_CARRERA', 1)->findAll();
        return count($carreras);
    }
    /* Contar total carreras modalidad posgrado vigentes*/
    public function contarCarrerasPosgradoVigentes()
    {
        /* contar CAR_CARRERA = 1 (grado) CTIP_ID = 2 (GRADO) ACTIVA = Si (vigente) */
        $carreras = $this->where('CTIP_ID', 1)->where('CAR_CARRERA', 1)->where('CAR_ACTIVA', 'SÍ')->findAll();
        return count($carreras);
    }
    /* Contar total escuelas modalidad posgrado no vigentes*/
    public function contarCarrerasPosgradoNoVigentes()
    {
        /* contar CAR_CARRERA = 1 (grado) CTIP_ID = 2 (GRADO) ACTIVA = No (no vigente) */
        $carreras = $this->where('CTIP_ID', 1)->where('CAR_CARRERA', 1)->where('CAR_ACTIVA', 'No')->findAll();
        return count($carreras);
    }
}
