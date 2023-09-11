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

    // Ver calendario académico
    public function ver($nombre)
    {
        try {
            $directorio = '';

            if ($nombre == 'POSGRADO') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\POSGRADO';
            } elseif ($nombre == 'PREGRADO') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PREGRADO';
            } elseif ($nombre == 'PUCETEC') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PUCETEC';
            }

            // Obtener la lista de archivos y directorios en el directorio
            $archivos = scandir($directorio);

            // Filtrar los archivos y directorios "." y ".."
            $archivos = array_diff($archivos, array('.', '..'));

            echo view('header');
            echo view('calendarioAcademico/ver', ['archivos' => $archivos, 'nombre' => $nombre]);
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //ver periodo
    public function verPeriodo($nombre, $archivo)
    {
        try {

            if ($nombre == 'POSGRADO') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\POSGRADO';
            } elseif ($nombre == 'PREGRADO') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PREGRADO';
            } elseif ($nombre == 'PUCETEC') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PUCETEC';
            }

            //ver carpeta periodo
            $directorioPeriodo = $directorio . '\\' . $archivo;

            // Obtener la lista de archivos y directorios en el directorio
            $archivos = scandir($directorioPeriodo);

            // Filtrar los archivos y directorios "." y ".."
            $archivos = array_diff($archivos, array('.', '..'));

            //obtener fecha de modificacion
            $fechaModificacion = filemtime($directorioPeriodo);
            //convertir fecha de modificacion
            $fechaModificacion = date("d-m-Y", $fechaModificacion);

            //obtener tamaño del archivo
            $tamañoArchivo = filesize($directorioPeriodo);
            //convertir tamaño del archivo
            $tamañoArchivo = round($tamañoArchivo / 1024, 2);

            echo view('header');
            echo view(
                'calendarioAcademico/verPeriodo',
                [
                    'archivos' => $archivos,
                    'nombre' => $nombre,
                    'archivo' => $archivo,
                    'fechaModificacion' => $fechaModificacion,
                    'tamañoArchivo' => $tamañoArchivo
                ]
            );
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //ver archivo
    public function verArchivo($nombre, $archivo)
    {
        try {
            // Construye la ruta completa al archivo
            $rutaArchivo = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\\' . $nombre . '\\' . $archivo;

            // Comprueba si el archivo existe y es accesible
            if (file_exists($rutaArchivo)) {
                // Configura las cabeceras para mostrar o descargar el archivo
                header('Content-Type: application/pdf'); // Cambia el tipo de archivo según sea necesario
                header('Content-Disposition: inline; filename="' . $archivo . '"');
                header('Content-Length: ' . filesize($rutaArchivo));

                // Lee y muestra el contenido del archivo
                readfile($rutaArchivo);
            } else {
                // Si el archivo no existe, puedes mostrar un mensaje de error o redirigir a una página de error.
                echo 'El archivo no existe o no es accesible.';
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
