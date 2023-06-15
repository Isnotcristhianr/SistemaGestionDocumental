<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=ç, initial-scale=1.0">
  <title>Sistema Gestion Documental</title>
  <!-- Icono -->
  <link rel="icon" type="image/png" href="<?php echo base_url('/public/imgs/secretary.png') ?>" />
  <!-- Boostrao Local -->
  <link rel="stylesheet" href="<?php echo base_url('/public/css/bootstrap.min.css') ?>">
  <!-- Boostrap -->
  <!--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 -->
 <!-- Font Awesome -->


 <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url('/public/css/estilos/estiloIndex.css') ?>">
</head>

<body>
  <!-- Nav Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background: #164284;">
    <div class="container-fluid">
      <a class="navbar-brand fs-3" href="#">
        <img src="<?php echo base_url('/public/imgs/logoPucesi.png') ?>" alt="" height="70" class="d-inline-block align-text-center">
        Gestion Documental PUCE-I
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
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
              <li><a class="dropdown-item" href="#">Titulacion</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Datos Estadisticos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Graduado</a></li>
              <li><a class="dropdown-item" href="#">Posgrado</a></li>
              <li><a class="dropdown-item" href="#">Tecnologia</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Historico Puce-I</a></li>

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
            <li><a class="dropdown-item bg-danger text-light" href="#">Cerrar Sesion</a></li>
          </ul>
        </div>
      </div>
      <!-- Sesion Cerrar-->

     

    </div>
  </nav>



  <!-- Footer -->
    <!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Sobre Gestion Documental</h6>
            <p class="text-justify"><i>Gestion Documental </i> 
              es un sistema de informacion que permite la administracion de los documentos de la PUCE-I, 
              facilitando el acceso a la informacion de manera rapida y eficiente.
          </p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categorias</h6>
            <ul class="footer-links">
              <li><a href="">Actas Consejo Directivo</a></li>
              <li><a href="">Actas Consejo Grado</a></li>
              <li><a href="">Matriz Graduados</a></li>
              <li><a href="">Titulacion</a></li>
              <li><a href="">Datos Estadisticos Grado</a></li>
              <li><a href="">Datos Estadisticos Posgrado</a></li>
              <li><a href="">Datos Estadisticos Tecnologia</a></li>
              <li><a href="">Historico Puce-I</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Utilidades</h6>
            <ul class="footer-links">
              <li><a href="">Inicio</a></li>
              <li><a href="https://www.pucesi.edu.ec/webs2/">Puce-I</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by 
         <a href="https://isnotcristhianr.me/">IsnotCristhianr</a>.
            </p>
          </div>

         
        </div>
      </div>
</footer>

</body>



<!-- Boostrap Js Local-->
<script src="<?php echo base_url('/public/js/bootstrap.min.js') ?>"></script>
<!-- Boostrap Js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 -->
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/516b0707c7.js" crossorigin="anonymous"></script>
</html>