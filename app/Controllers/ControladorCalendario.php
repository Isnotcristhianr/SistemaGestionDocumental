<?php

namespace App\Controllers;

//use App\Models\ModelFEPeriodo;


class ControladorCalendario extends BaseController
{

    //calendario academico
    public function calendarioAcademico()
    {

        // Directorio donde se encuentran los calendarios académicos
        $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS';

        // Obtener la lista de archivos en el directorio
        $archivos = scandir($directorio);

        // Filtrar los archivos y directorios "." y ".."
        $archivos = array_diff($archivos, array('.', '..'));

        echo view('header');
        echo view('calendarioAcademico/calendarioAcademico', ['archivos' => $archivos]);
        echo view('footer');
    }

    //ver calendario academico
    public function ver($nombre)
    {
        try {

            if ($nombre = 'POSGRADO') {
                $ruta = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\POSGRADO';
                $archivo = $ruta . '\\' . $nombre;
                $ext = pathinfo($archivo, PATHINFO_EXTENSION);
                $data = file_get_contents($archivo);
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename="' . $nombre . '"');
                header('Content-Length: ' . filesize($archivo));
                header('Accept-Ranges: bytes');
                echo $data;
            } 

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
