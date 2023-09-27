<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Meta -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="author" content="Cristhian Recalde - Isnotcrishtianr">
  <meta name="description" content="Sistema de Gestión Documental">
  <meta name="keywords" content="Sistema de Gestión Documental, Pucesi, Secretariado Pucesi, PuceI, Pucei">
  <meta name="robots" content="index, follow">
  <meta name="theme-color" content="#009688">
  <meta name="msapplication-navbutton-color" content="#009688">
  <meta name="apple-mobile-web-app-status-bar-style" content="#009688">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">

  <title>Sistema Gestion Documental</title>
  <!-- Icono -->
  <link rel="icon" type="image/png" href="<?php echo base_url('/public/imgs/secretary.png') ?>" />
  <!-- Boostrap Local -->
  <link rel="stylesheet" href="<?php echo base_url('/public/css/bootstrap.min.css') ?>">
  <!-- Boostrap -->
  <!--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 -->
  <!-- tOASTR -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Data table -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url('/public/css/estilos/estiloIndex.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/css/estilos/styles.css') ?>">

</head>

<body>
  <!-- Nav Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background: #164284;">
    <div class="container-fluid">
      <a class="navbar-brand fs-4" href="<?php echo base_url('/index.php/inicio') ?>">
        <img src="<?php echo base_url('/public/imgs/logoPucesi.png') ?>" alt="" height="75" class="d-inline-block align-text-center">
        Gestión Documental PUCE-I
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-size: 15px;">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url('index.php/inicio') ?>">
              <i class="fa-solid fa-house"></i> Inicio
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Actas
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Consejo Directivo</a></li>
              <li><a class="dropdown-item" href="#">Consejo de Escuela</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Reportes
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Matriz Graduados</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('index.php/reporteTitulacion') ?>">Titulación</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Datos
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="<?php echo base_url('index.php/FiltroEstadisticoGrado') ?>">Grado</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('index.php/FiltroEstadisticoPosgrado') ?>">Posgrado</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('index.php/FiltroEstadisticoTecnologia') ?>">Técnicas y Tecnológicas</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('index.php/deHistorico') ?>">Historico Puce-I</a></li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li><a class="dropdown-item" href="<?php echo base_url('index.php/calendarioAcademico') ?>">Calendario Academico</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Normativas</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a href="" class="dropdown-item">Normativa General</a></li>
              <li><a href="<?php echo base_url('/index.php//normativas/reglamentoGeneralEstudiantes') ?>" class="dropdown-item">Reglamento General Estudiantes</a></li>

            </ul>
          </li>

        </ul>
      </div>

      <!-- Nombre Usuario y cerrar Sesion-->
      <div class="d-flex">
        <div class="dropdown me-2">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Nombre Usuario
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Perfil</a></li>
            <li><a class="dropdown-item bg-danger text-light" href="#">Cerrar Sesión</a></li>
          </ul>

        </div>
      </div>
      <!-- btn modo oscuro -->
      <div class="d-flex m-2">
        <div class="row">
          <div class=" text-end">
            <button class="btn btn-outline-dark" id="btnModoOscuro">
              <i class="fa-solid fa-moon"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </nav>