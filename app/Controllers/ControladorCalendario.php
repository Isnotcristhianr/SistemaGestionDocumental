<?php

namespace App\Controllers;

use Kint\Parser\ToStringPlugin;

//use App\Models\ModelFEPeriodo;


class ControladorCalendario extends BaseController
{

    //calendario academico
    public function calendarioAcademico()
    {
        try {

            // Directorio donde se encuentran los calendarios académicos
            $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS';

            // Obtener la lista de archivos en el directorio
            $archivos = scandir($directorio);

            // Filtrar los archivos y directorios "." y ".."
            $archivos = array_diff($archivos, array('.', '..'));

            echo view('header');
            echo view('calendarioAcademico/calendarioAcademico', ['archivos' => $archivos]);
            echo view('footer');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
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
            echo view(
                'calendarioAcademico/ver',
                [
                    'archivos' => $archivos,
                    'nombre' => $nombre,
                    'directorio' => $directorio
                ]
            );
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

            //ver archivo pdf en nueva pestaña target blank
            return redirect()->to(base_url('public/files/CALENDARIOS ACADÉMICOS/' . $nombre . '/' . $periodo . '/' . $archivo));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //crear carpeta periodo
    public function crearCarpeta($nombre)
    {
        try {

            if ($nombre == 'POSGRADO') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\POSGRADO';
            } elseif ($nombre == 'PREGRADO') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PREGRADO';
            } elseif ($nombre == 'PUCETEC') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PUCETEC';
            }

            // Obtener datos del formulario
            $periodo = $this->request->getPostGet('nombreDirectorio');

            // Ruta del directorio
            $ruta = $directorio . '\\' . $periodo;

            // Verificar si existe la carpeta
            if (!file_exists($ruta)) {
                // Crear la carpeta
                mkdir($ruta, 0777, true);
            } else {
                // Alerta de que ya existe la carpeta
                echo "<script>alert('Ya existe la carpeta');</script>";
            }

            // Redirigir después de la operación exitosa
            return redirect()->to(base_url("index.php/calendarios/ver/{$nombre}"));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //eliminar carpeta periodo
    public function eliminarCarpeta($nombre, $periodo)
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
            $directorioPeriodo = $directorio . '\\' . $periodo;

            //eliminar carpeta
            rmdir($directorioPeriodo);

            return redirect()->to(base_url("index.php/calendarios/ver/" . $nombre));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //descargar zip carpeta periodo 
    public function descargarZipCarpeta($nombre, $periodo)
    {
        try {
            if ($nombre == 'POSGRADO') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\POSGRADO';
            } elseif ($nombre == 'PREGRADO') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PREGRADO';
            } elseif ($nombre == 'PUCETEC') {
                $directorio = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PUCETEC';
            }

            // Verificar si el directorio del período existe
            $directorioPeriodo = $directorio . DIRECTORY_SEPARATOR . $periodo;

            if (!is_dir($directorioPeriodo)) {
                // El directorio no existe
                echo 'El directorio no existe';
                return;
            }

            // Control de archivos en la carpeta
            $control = 0;
            if (glob($directorioPeriodo . '/*') !== false) {
                $control = 1;
            }

            if ($control === 0) {
                echo '<script> 
                        alert("La carpeta está vacía");
                        window.location.href = "' . base_url("index.phpcalendarios/ver//{$nombre}") . '";
                    </script>';
                return;
            }

            //tomar todos los archivos de la carpeta
            $archivos = glob($directorioPeriodo . '/*');

            //crear zip
            $zip = new \ZipArchive();

            //nombre del zip
            $nombreZip = $periodo . '.zip';

            //crear zip y abrir
            if ($zip->open($nombreZip, \ZipArchive::CREATE) === TRUE) {
                //agregar archivos al zip
                foreach ($archivos as $archivo) {
                    $zip->addFile($archivo, basename($archivo));
                }
                //cerrar zip
                $zip->close();

                //descargar zip
                header('Content-Type: application/zip');
                header('Content-disposition: attachment; filename=' . $nombreZip);
                header('Content-Length: ' . filesize($nombreZip));
                readfile($nombreZip);

                //eliminar zip
                unlink($nombreZip);
            }

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }


    //! CRUD

    //todo insertar calendario academico
    public function insertar($tipo)
    {
        try {
            // Obtener datos 
            $periodo = $this->request->getPost('periodo');
            $nombre = $this->request->getPost('name');

            // Ruta
            if ($tipo == 'POSGRADO') {
                $ruta = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\POSGRADO' . '/' . $periodo;
            } elseif ($tipo == 'PREGRADO') {
                $ruta = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PREGRADO' . '/' . $periodo;
            } elseif ($tipo == 'PUCETEC') {
                $ruta = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PUCETEC' . '/' . $periodo;
            }

            // Verificar si existe la carpeta
            if (!file_exists($ruta)) {
                // Alerta de que no existe la carpeta
                echo "<script>alert('No existe la carpeta');</script>";
            } else {
                $archivo = $this->request->getFile('archivo');
                // Obtener datos del archivo
                $nombreArchivo = $archivo->getName();
                $tipoArchivo = $archivo->getClientMimeType();
                $tamañoArchivo = $archivo->getSize();
                $rutaArchivo = $archivo->getTempName();
                $extensionArchivo = $archivo->getExtension();
                $errorArchivo = $archivo->getError();

                // Controlar error archivo pdf
                if ($errorArchivo === 0) {
                    // Mover el archivo al directorio destino
                    $archivo->move($ruta, $nombre . '.' . $extensionArchivo);

                    // Redirigir después de la operación exitosa
                    return redirect()->to(base_url("index.php/calendarioAcademico/verPeriodo/{$tipo}/{$periodo}"));
                } else {
                    echo "<script>alert('Error al subir el archivo; error: {$errorArchivo}');</script>";
                    return redirect()->to(base_url("index.php/calendarioAcademico/verPeriodo/{$tipo}/{$periodo}"));
                }
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //todo eliminar calendario academico
    public function eliminar($nombre, $periodo, $archivo)
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

            //eliminar archivo
            unlink($directorioPeriodo);

            return redirect()->to(base_url('index.php/calendarioAcademico/verPeriodo/' . $nombre . '/' . $periodo));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //todo editar calendario academico
    public function editar($nombre, $periodo, $archivo)
    {
        try {
            // Directorio base según el nombre
            $directorioBase = '';
            if ($nombre == 'POSGRADO') {
                $directorioBase = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\POSGRADO';
            } elseif ($nombre == 'PREGRADO') {
                $directorioBase = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PREGRADO';
            } elseif ($nombre == 'PUCETEC') {
                $directorioBase = 'C:\XAMPP\htdocs\SistemaGestionDocumental\public\files\CALENDARIOS ACADÉMICOS\PUCETEC';
            }

            // Rutas del archivo actual y del nuevo archivo (si se cambió)
            $directorioActual = $directorioBase . '\\' . $periodo . '\\' . $archivo;
            $rutaNuevoArchivo = '';


            $nuevoNombreArchivo = $this->request->getPost('nuevo_nombre');
            $nuevoArchivo = $this->request->getFile('nuevo_archivo');

            // Verificar si se proporcionó un nuevo archivo y se cambió el nombre
            if ($nuevoArchivo->isValid() && !empty($nuevoNombreArchivo)) {

                // Obtener datos del archivo
                $nombreArchivo = $nuevoArchivo->getName();
                $tipoArchivo = $nuevoArchivo->getClientMimeType();
                $tamañoArchivo = $nuevoArchivo->getSize();
                $rutaArchivo = $nuevoArchivo->getTempName();
                $extensionArchivo = $nuevoArchivo->getExtension();
                $errorArchivo = $nuevoArchivo->getError();

                // Controlar error archivo pdf
                if ($errorArchivo === 0) {
                    // Eliminar el archivo actual si se proporciona un nuevo archivo PDF válido
                    if (file_exists($directorioActual)) {
                        unlink($directorioActual);
                    }
                    // Mover el archivo al directorio destino
                    $nuevoArchivo->move($directorioBase . '\\' . $periodo, $nuevoNombreArchivo . '.' . $extensionArchivo);
                } else {
                    echo "<script>alert('Error al subir el archivo; error: {$errorArchivo}');</script>";
                    return redirect()->to(base_url("index.php/calendarioAcademico/verPeriodo/{$nombre}/{$periodo}"));
                }


                //? Verificar si se cambió el nombre del archivo
            } else if (!empty($nuevoNombreArchivo)) {
                $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                $rutaNuevoArchivo = $directorioBase . '\\' . $periodo . '\\' . $nuevoNombreArchivo . '.' . $extension;
                // Renombrar el archivo si se proporcionó un nuevo nombre
                rename($directorioActual, $rutaNuevoArchivo);

                //? Verificar si se cargó un nuevo archivo
            } else if ($nuevoArchivo->isValid() && $nuevoArchivo->getClientMimeType() == 'application/pdf') {
                // Eliminar el archivo actual si se proporciona un nuevo archivo PDF válido
                if (file_exists($directorioActual)) {
                    unlink($directorioActual);
                }
                //mantener el mismo nombre del archivo
                $nuevoArchivo->move($directorioBase . '\\' . $periodo, $archivo);
            }

            // Redireccionar después de la operación exitosa
            return redirect()->to(base_url("index.php/calendarioAcademico/verPeriodo/{$nombre}/{$periodo}"));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
