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
            $directorio = base_url() . '/public/files/Reglamento General de Estudiantes';

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

    //editar directorio reglamento general de estudiantes
    public function editarCarpeta($carpeta)
    {
        try {
            // Directorio base para el reglamento general de estudiantes
            $directorioBase = base_url() . '/public/files/Reglamento General de Estudiantes';

            //directorio donde esta la carpeta actual a modificar
            $directorio = $directorioBase . DIRECTORY_SEPARATOR . $carpeta;

            //datos del formulario
            $nombre = $this->request->getPost('nombreDirectorio');

            //? Se cambio el nombre
            if ($nombre != '') {

                // Construir la ruta completa al directorio de destino
                $rutaDirectorioDestino = $directorioBase . DIRECTORY_SEPARATOR . $nombre;

                // Renombrar el directorio
                rename($directorio, $rutaDirectorioDestino);

                // Redireccionar al listado de archivos y carpetas
                return redirect()->to(base_url('index.php/normativas/reglamentoGeneralEstudiantes'));
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //eliminar carpeta reglamento general de estudiantes
    public function eliminarDirectorio($carpeta)
    {

        try {
            //directorio
            $directorio = base_url() . '/public/files/Reglamento General de Estudiantes';

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
            $directorio = base_url() . '/public/files/Reglamento General de Estudiantes';

            // Construir la ruta completa del archivo
            $rutaArchivo = $directorio . DIRECTORY_SEPARATOR . $archivo;

            // Verificar si el archivo existe
            if (is_file($rutaArchivo)) {
                // Obtener información del archivo
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                /*  $tipo_mime = finfo_file($finfo, $rutaArchivo);
                finfo_close($finfo); */

                // Obtener información del archivo
                $tamanio = filesize($rutaArchivo);

                // Enviar headers
                //   header('Content-Type: ' . $tipo_mime);
                header('Content-Type: application/pdf');
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
            $directorio = base_url() . '/public/files/Reglamento General de Estudiantes';

            // Construir la ruta completa del directorio
            $rutaDirectorio = $directorio . DIRECTORY_SEPARATOR . $carpeta;

            // Verificar si el directorio existe
            if (is_dir($rutaDirectorio)) {

                //control 0 archivos en carpeta
                $control = 0;
                if (glob($rutaDirectorio . '/*') != false) {
                    $control = 1;
                }

                if ($control == 0) {
                    echo '<script> 
                            alert("La carpeta esta vacia");
                            window.location.href="' . base_url('index.php/normativas/reglamentoGeneralEstudiantes') . '";

                    </script>';
                }

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
            $directorio = base_url() . '/public/files/Reglamento General de Estudiantes';

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
            // Obtener datos
            $nombre = $this->request->getPost('nombreDirectorio');
            $archivo = $this->request->getPost('archivo');
            $carpeta = $this->request->getPost('carpeta');

            // Ruta
            $ruta = base_url() . '/public/files/Reglamento General de Estudiantes' . DIRECTORY_SEPARATOR . $carpeta;

            /*  echo "nombre: " . $nombre . "<br>"
                . "archivo: " . $archivo . "<br>"
                . "carpeta: " . $carpeta . "<br>"
                . "ruta: " . $ruta . "<br>"; */

            // Verificar si el archivo existe
            if (is_file($ruta . DIRECTORY_SEPARATOR . $archivo)) {
                echo 'El archivo ya existe';
            } else {

                // Obtener el nombre temporal del archivo
                $nombreTemp = $_FILES['archivo']['tmp_name'];

                // Construir la ruta completa al archivo de destino
                $rutaArchivoDestino = $ruta . DIRECTORY_SEPARATOR . $archivo;

                // Mover el archivo a la carpeta de destino
                $archivoinput = $this->request->getFile('archivo');
                $archivoinput->move($ruta, $nombre . '.' . $archivoinput->getExtension());

                // Redireccionar al listado de archivos y carpetas
                return redirect()->to(base_url('index.php/normativas/verCarpetaEspecifica/' . $carpeta));
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //descargar archivo especifico reglamento general de estudiantes
    public function descargarArchivoEspecifico($carpeta, $archivo)
    {
        try {
            //directorio
            $directorio = base_url() . '/public/files/Reglamento General de Estudiantes';

            // Construir la ruta completa del archivo
            $rutaArchivo = $directorio . DIRECTORY_SEPARATOR . $carpeta . DIRECTORY_SEPARATOR . $archivo;

            // Verificar si el archivo existe
            if (is_file($rutaArchivo)) {
                // Obtener información del archivo
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                /*  $tipo_mime = finfo_file($finfo, $rutaArchivo);
                finfo_close($finfo);
 */
                // Obtener información del archivo
                $tamanio = filesize($rutaArchivo);

                // Enviar headers
                //  header('Content-Type: ' . $tipo_mime);
                header('Content-Type: application/pdf');
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

    //eliminar archivo especifico reglamento general de estudiantes
    public function eliminarArchivoEspecifico($carpeta, $archivo)
    {
        try {
            //directorio
            $directorio = base_url() . '/public/files/Reglamento General de Estudiantes';

            // Construir la ruta completa del archivo
            $rutaArchivo = $directorio . DIRECTORY_SEPARATOR . $carpeta . DIRECTORY_SEPARATOR . $archivo;

            // Verificar si el archivo existe
            if (is_file($rutaArchivo)) {
                // Eliminar el archivo
                unlink($rutaArchivo);

                // Redireccionar al listado de archivos y carpetas
                return redirect()->to(base_url('index.php/normativas/verCarpetaEspecifica/' . $carpeta));
            } else {
                // El archivo no existe
                echo 'El archivo no existe';
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    //editar archivo especifico reglamento general de estudiantes
    public function editarArchivoEspecifico($carpeta, $archivo)
    {
        try {
            // Directorio base para el reglamento general de estudiantes
            $directorioBase = base_url() . '/public/files/Reglamento General de Estudiantes';

            //directorio donde esta el archivo actual a modificar
            $directorio = $directorioBase . DIRECTORY_SEPARATOR . $carpeta;

            // Construir la ruta completa del archivo
            $rutaArchivo = $directorio . DIRECTORY_SEPARATOR . $archivo;

            //datos del formulario
            $nombre = $this->request->getPost('nuevo_nombre');
            $archivoNuevo = $this->request->getFile('nuevo_archivo');

            //? Se cambio el nombre y archivo
            if ($nombre != '' && $archivoNuevo->getName() != '') {

                // Construir la ruta completa al archivo de destino
                $rutaArchivoDestino = $directorio . DIRECTORY_SEPARATOR . $nombre . '.' . $archivoNuevo->getExtension();

                // Eliminar el archivo anterior
                unlink($rutaArchivo);

                // Mover el archivo a la carpeta de destino
                $archivoNuevo->move($directorio, $nombre . '.' . $archivoNuevo->getExtension());


                // Redireccionar al listado de archivos y carpetas
                return redirect()->to(base_url('index.php/normativas/verCarpetaEspecifica/' . $carpeta));
            }
            //? solo se cambio el nombre, el archivo se mantiene
            else if (!empty($nombre)) {

                // Construir la ruta completa al archivo de destino
                $rutaArchivoDestino = $directorio . DIRECTORY_SEPARATOR . $nombre . '.' . pathinfo($rutaArchivo, PATHINFO_EXTENSION);

                // Renombrar el archivo
                rename($rutaArchivo, $rutaArchivoDestino);

                // Redireccionar al listado de archivos y carpetas
                return redirect()->to(base_url('index.php/normativas/verCarpetaEspecifica/' . $carpeta));
            }
            //? solo se cambio el archivo
            else if ($archivoNuevo->isValid()) {

                //actualizar archivo
                $archivoNuevo->move($directorio, $archivoNuevo->getName());

                //eliminar archivo anterior
                unlink($rutaArchivo);

                // Redireccionar al listado de archivos y carpetas
                return redirect()->to(base_url('index.php/normativas/verCarpetaEspecifica/' . $carpeta));
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
