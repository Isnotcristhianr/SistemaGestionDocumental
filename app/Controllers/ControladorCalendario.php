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

            //periodo = archivo
            $periodo = $archivo;

            echo view('header');
            echo view(
                'calendarioAcademico/verPeriodo',
                [
                    'archivos' => $archivos,
                    'nombre' => $nombre,
                    'archivo' => $archivo,
                    'fechaModificacion' => $fechaModificacion,
                    'tamañoArchivo' => $tamañoArchivo,
                    'periodo' => $periodo
                ]
            );
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //descargar calendario academico
    public function descargar($nombre, $periodo, $archivo)
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
            $directorioPeriodo = $directorio . '\\' . $periodo . '\\' . $archivo;

            //descargar archivo pdf
            return $this->response->download($directorioPeriodo, null);

            return redirect()->to(base_url('index.php/calendarioAcademico/verPeriodo/' . $nombre . '/' . $archivo));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //ver calendario academico pdf
    public function verPdf($nombre, $periodo, $archivo)
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
            $directorioPeriodo = $directorio . '\\' . $periodo . '\\' . $archivo;
            //ver archivo pdf nueva pestaña sin descargar
            return redirect()->to(base_url('public/files/CALENDARIOS ACADÉMICOS/' . $nombre . '/' . $periodo . '/' . $archivo));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
