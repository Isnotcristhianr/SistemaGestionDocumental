<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFEcarreras extends Model
{
    protected $table =  'tbl_carrera';
    protected $primaryKey = 'CAR_ID';

    protected $allowedFields = ['CTIP_ID', 'CAR_NOMBRE', 'CAR_CARRERA', 'CAR_ESCUELA', 'CAR_PADREESC', 'CAR_ACTIVA', 'CAR_ESTADO'];


    //*insertar carrera
    public function insertar($datos)
    {
        $carrera = $this->insert($datos);
        return $carrera;
    }

    //ultimo id
    public function ultimoId()
    {
        $carrera = $this->select('CAR_ID')->orderBy('CAR_ID', 'DESC')->first();
        return $carrera;
    }
    //ver todos los datos
    public function verModelo()
    {
        $carreras = $this->findAll();
        return $carreras;
    }

    //ver carreras
    public function verCarreras()
    {
        $carreras = $this->where('CAR_CARRERA', 1)->findAll();
        return $carreras;
    }

    //ver escuelas
    public function verEscuelas()
    {
        $escuelas = $this->where('CAR_CARRERA', 0)->findAll();
        return $escuelas;
    }
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
    /* //////////////////////TECNOLOGIAS///////////////////////////// */
    /* Contar total carreras modalidad tecnologia*/
    public function contarCarrerasTecnologia()
    {
        /* contar CAR_CARRERA = 1 (tecnologia) CTIP_ID = 3 (tec) */
        $carreras = $this->where('CTIP_ID', 3)->where('CAR_CARRERA', 1)->findAll();
        return count($carreras);
    }
    /* Contar total carreras modalidad tecnologia vigentes*/
    public function contarCarrerasTecnologiaVigentes()
    {
        /* contar CAR_CARRERA = 1 (tecnologia) CTIP_ID = 3 (tec) ACTIVA = Si (vigente) */
        $carreras = $this->where('CTIP_ID', 3)->where('CAR_CARRERA', 1)->where('CAR_ACTIVA', 'SÍ')->findAll();
        return count($carreras);
    }
    /* Contar total escuelas modalidad tecnologia no vigentes*/
    public function contarCarrerasTecnologiaNoVigentes()
    {
        /* contar CAR_CARRERA = 1 (tecnologia) CTIP_ID = 3 (tec) ACTIVA = No (no vigente) */
        $carreras = $this->where('CTIP_ID', 3)->where('CAR_CARRERA', 1)->where('CAR_ACTIVA', 'No')->findAll();
        return count($carreras);
    }

    //obtener id acorde al nombre
    public function obtenerId($nombre)
    {
        $carrera = $this->where('CAR_NOMBRE', $nombre)->first();
        return $carrera;
    }
}
