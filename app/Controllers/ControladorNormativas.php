<?php

namespace App\Controllers;

use Kint\Parser\ToStringPlugin;

//use App\Models\ModelFEPeriodo;


class ControladorNormativas extends BaseController
{

    //reglamento general de estudiantes
    public function reglamentoGeneralEstudiantes()
    {

        //directorio donde se encuentran los archivos
        $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\Reglamento General de Estudiantes';

        // Obtener lista de archivos y carpetas del directorio
        $archivos_y_carpetas = scandir($directorio, 1);

        // Filtrar los archivos y directorios "." y ".."
        $archivos_y_carpetas = array_filter(
            $archivos_y_carpetas,
            function ($archivo_o_carpeta) {
                return !in_array($archivo_o_carpeta, ['.', '..']);
            }
        );

        // Inicializar arrays para almacenar archivos y carpetas
        $archivos = [];
        $carpetas = [];

        // Recorrer la lista
        foreach ($archivos_y_carpetas as $item) {
            // Construir la ruta completa del elemento
            $ruta_item = $directorio . DIRECTORY_SEPARATOR . $item;

            // Verificar si es un directorio
            if (is_dir($ruta_item)) {
                // Es una carpeta, agregamos al array de carpetas
                $carpetas[] = $item;
            } else {
                // Es un archivo, agregamos al array de archivos
                $archivos[] = $item;
            }
        }

        echo view('header');
        echo view(
            'normativas/reglamentoGeneralEstudiantes',
            [
                'archivos' => $archivos,
                'carpetas' => $carpetas,
                'directorio' => $directorio,
                'archivos_y_carpetas' => $archivos_y_carpetas
            ]
        );
        echo view('footer');
    }

    //crear directorio/fichero reglamento general de estudiantes
    public function crearDirectorio()
    {
        // Obtener el nombre del directorio ingresado por el usuario 
        $nombreDirectorio = $this->request->getPostGet('nombreDirectorio');
        // Obtener el directorio actual
        $directorio = $this->request->getPostGet('directorio');

        // Construir la ruta completa del directorio
        $rutaDirectorio = $directorio . DIRECTORY_SEPARATOR . $nombreDirectorio;

        // Verificar si el directorio existe
        if (is_dir($rutaDirectorio)) {
            // El directorio ya existe
            echo 'El directorio ya existe';
        } else {
            // Crear el directorio
            mkdir($rutaDirectorio);

            // Redireccionar al listado de archivos y carpetas
            return redirect()->to(base_url('index.php/normativas/reglamentoGeneralEstudiantes'));
        }
    }

    //eliminar directorio/fichero reglamento general de estudiantes
    public function eliminarDirectorio()
    {
        // Obtener el nombre del directorio ingresado por el usuario 
        $nombreDirectorio = $this->request->getGet('nombreDirectorio');
        // Obtener el directorio actual
        $directorio = $this->request->getGet('directorio');

        // Construir la ruta completa del directorio
        $rutaDirectorio = $directorio . DIRECTORY_SEPARATOR . $nombreDirectorio;

        // Verificar si el directorio existe
        if (is_dir($rutaDirectorio)) {
            // El directorio existe, eliminarlo
            rmdir($rutaDirectorio);

            // Redireccionar al listado de archivos y carpetas
            return redirect()->to(base_url('index.php/normativas/reglamentoGeneralEstudiantes'));
        } else {
            // El directorio no existe
            echo 'El directorio no existe';
        }
    }
}
