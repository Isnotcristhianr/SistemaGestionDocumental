<?php

namespace App\Controllers;

use Kint\Parser\ToStringPlugin;

//use App\Models\ModelFEPeriodo;


class ControladorNormativas extends BaseController
{

    //reglamento general de estudiantes
    public function reglamentoGeneralEstudiantes()
    {

        try {
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
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //crear directorio/fichero reglamento general de estudiantes
    public function crearDirectorio()
    {
        try {

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
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //eliminar carpeta reglamento general de estudiantes
    public function eliminarDirectorio($carpeta)
    {

        try {
            //directorio
            $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\Reglamento General de Estudiantes';

            // Construir la ruta completa del directorio
            $rutaDirectorio = $directorio . DIRECTORY_SEPARATOR . $carpeta;

            // Verificar si el directorio existe
            if (is_dir($rutaDirectorio)) {
                // Eliminar el directorio
                rmdir($rutaDirectorio);

                // Redireccionar al listado de archivos y carpetas
                return redirect()->to(base_url('index.php/normativas/reglamentoGeneralEstudiantes'));
            } else {
                // El directorio no existe
                echo 'El directorio no existe';
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //descargar pdf reglamento general de estudiantes
    public function descargarPDF($archivo)
    {

        try {

            //directorio
            $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\Reglamento General de Estudiantes';

            // Construir la ruta completa del archivo
            $rutaArchivo = $directorio . DIRECTORY_SEPARATOR . $archivo;

            // Verificar si el archivo existe
            if (is_file($rutaArchivo)) {
                // Obtener información del archivo
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $tipo_mime = finfo_file($finfo, $rutaArchivo);
                finfo_close($finfo);

                // Obtener información del archivo
                $tamanio = filesize($rutaArchivo);

                // Enviar headers
                header('Content-Type: ' . $tipo_mime);
                header('Content-Length: ' . $tamanio);
                header('Content-Disposition: attachment; filename="' . $archivo . '"');

                // Enviar el archivo al navegador
                readfile($rutaArchivo);
            } else {
                // El archivo no existe
                echo 'El archivo no existe';
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //descargar carpeta comprimida reglamento general de estudiantes
    public function descargarCarpetaComprimida($carpeta)
    {
        try {
            // Directorio
            $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\Reglamento General de Estudiantes';

            // Construir la ruta completa del directorio
            $rutaDirectorio = $directorio . DIRECTORY_SEPARATOR . $carpeta;

            // Verificar si el directorio existe
            if (is_dir($rutaDirectorio)) {

                //tomar todos los archivos de la carpeta
                $archivos = glob($rutaDirectorio . '/*');

                // Crear el archivo ZIP
                $zip = new \ZipArchive();

                // Nombre del archivo ZIP
                $nombreZip = $carpeta . '.zip';

                // Crear y abrir el archivo ZIP
                if ($zip->open($nombreZip, \ZipArchive::CREATE) === true) {
                    // Agregar cada archivo al ZIP
                    foreach ($archivos as $archivo) {
                        $zip->addFile($archivo, basename($archivo));
                    }

                    // Cerrar el ZIP
                    $zip->close();

                    // Enviar el archivo al navegador
                    header('Content-Type: application/zip');
                    header('Content-Length: ' . filesize($nombreZip));
                    header('Content-Disposition: attachment; filename="' . $nombreZip . '"');
                    readfile($nombreZip);

                    // Eliminar el archivo ZIP
                    unlink($nombreZip);
                } else {
                    // No se pudo crear el archivo ZIP
                    echo 'No se pudo crear el archivo ZIP';
                }
            } else {
                // El directorio no existe
                echo 'El directorio no existe';
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //ver carpeta especifica reglamento general de estudiantes
    public function verCarpetaEspecifica($carpeta)
    {
        try {
            //directorio
            $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\Reglamento General de Estudiantes';

            // Obtener lista de archivos y carpetas del directorio
            $archivos_y_carpetas = scandir($directorio . DIRECTORY_SEPARATOR . $carpeta, 1);

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
                $ruta_item = $directorio . DIRECTORY_SEPARATOR . $carpeta . DIRECTORY_SEPARATOR . $item;

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
                'normativas/verCarpetaReglamentoGenEst',
                [
                    'archivos' => $archivos,
                    'carpeta' => $carpeta,
                    'carpetas' => $carpetas,
                    'directorio' => $directorio,
                    'archivos_y_carpetas' => $archivos_y_carpetas
                ]
            );
            echo view('footer');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //subir archivo especifico reglamento general de estudiantes
    public function subirArchivoEspecifico()
    {
        try {
            //obtener datos
            $nombre = $this->request->getGet('nombreDirectorio');
            $archivo = $this->request->getGet('archivo');
            $carpeta = $this->request->getGet('carpeta');

            //ruta
            $ruta = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\Reglamento General de Estudiantes\\' . $carpeta;

            echo "nombre: " . $nombre . "<br>" .
                "archivo: " . $archivo . "<br>" .
                "carpeta: " . $carpeta . "<br>" .
                "ruta: " . $ruta;
                
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
