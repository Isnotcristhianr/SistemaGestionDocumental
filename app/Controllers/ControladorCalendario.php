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
        // Directorio donde se encuentran los calendarios académicos
        $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS';

        // Obtener la lista de archivos en el directorio
        $archivos = scandir($directorio);

        // Filtrar los archivos y directorios "." y ".."
        $archivos = array_diff($archivos, array('.', '..'));

        // Verificar que el archivo exista
        if (in_array($nombre, $archivos)) {

            // Ruta completa del archivo
            $ruta = $directorio . DIRECTORY_SEPARATOR . $nombre;

            // Obtener información del archivo
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $tipo = finfo_file($finfo, $ruta);

            // Cabeceras HTTP
            header('Content-Type: ' . $tipo);
            header('Content-Length: ' . filesize($ruta));

            // Enviar archivo al navegador
            readfile($ruta);
             
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('El archivo no existe: ' . $nombre);
        }
    }
}
