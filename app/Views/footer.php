<!-- Footer -->
<!-- Footer -->
<footer id="footer" class="bg-dark text-light pt-5">
  <div class="main-footer widgets-dark typo-light">
    <div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-7 col-md-4">
          <div class="container">
            <h4 class="text-primary"><a href="<?php echo base_url('index.php/inicio') ?>" style="text-decoration: none;">Sistema de Gestión Documental</a></h4>
            <hr class="border border-primary border-1 opacity-50">
            <p class="fs-6" style="text-align: justify; text-justify: inter-word;">
              Sistema de gestion documental es,
              un sistema de información que permite la administración de los documentos de la
              <a href="https://www.pucesi.edu.ec/webs2/" style="text-decoration: none;">PUCE-I</a>
              como normativas, syllabus, otras; además,
              facilitando el acceso a la información de manera rápida y eficiente de reportes estadísticos
            </p>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="mt-4">
            <h5 class="text-primary">Datos</h5>
            <hr class="border border-primary border-1 opacity-50">

            <ul class="list" style="list-style: none; margin-left: -25px;">
              <li>
                <a href="<?php echo base_url('index.php/FiltroEstadisticoGrado') ?>" class="text-light" style="text-decoration: none;">
                  <i class="fa-solid fa-arrow-up-right-from-square text-primary p-1 "></i>Grado</a>
              </li>
              <li>
                <a href="<?php echo base_url('index.php/FiltroEstadisticoPosgrado') ?>" class="text-light" style="text-decoration: none;">
                  <i class="fa-solid fa-arrow-up-right-from-square text-primary p-1"></i>Posgrado</a>
              </li>
              <li>
                <a href="<?php echo base_url('index.php/FiltroEstadisticoTecnologia') ?>" class="text-light" style="text-decoration: none;">
                  <i class="fa-solid fa-arrow-up-right-from-square text-primary p-1"></i>Técnicas y Tecnológicas</a>
              </li>
              <li>
                <a href="<?php echo base_url('index.php/deHistorico') ?>" class="text-light" style="text-decoration: none;">
                  <i class="fa-solid fa-arrow-up-right-from-square text-primary p-1"></i>Histórico PUCE-I</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="mt-4">
            <h5 class="text-primary">Repositorios</h5>
            <hr class="border border-primary border-1 opacity-50">

            <ul class="list" style="list-style: none; margin-left: -25px;">
              <li>
                <a href="<?php echo base_url('index.php/calendarioAcademico') ?>" class="text-light" style="text-decoration: none;">
                  <i class="fa-solid fa-arrow-up-right-from-square text-primary p-1"></i>Calendario Académico</a>
              </li>
              <li>
                <a href="#." class="text-light" style="text-decoration: none;">
                  <i class="fa-solid fa-arrow-up-right-from-square text-primary p-1"></i>Normativa General</a>
              </li>
              <li>
                <a href="<?php echo base_url('index.php/normativas/reglamentoGeneralEstudiantes') ?>" class="text-light" style="text-decoration: none;">
                  <i class="fa-solid fa-arrow-up-right-from-square text-primary p-1"></i>Reglamento General Estudiantes</a>
              </li>
              <li>
                <a href="#." class="text-light" style="text-decoration: none;">
                  <i class="fa-solid fa-arrow-up-right-from-square text-primary p-1"></i>Syllabus</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-xs-10 col-sm-5 col-md-2">

          <div class="widget no-box">
            <img src="<?php echo base_url('/public/imgs/logofooter.png') ?>" alt="pucesi" width="200">
            <ul class="d-flex" style="list-style-type: none;">
              <li class=""><a title="youtube" target="_blank" href="https://www.youtube.com/pucesi">
                  <i class="fa-brands fa-youtube fa-xl p-1"></i>
                </a></li>
              <li class=""><a href="http://facebook.com/puce.sede.ibarra" target="_blank" title="Facebook">
                  <i class="fa-brands fa-facebook fa-xl p-1"></i>
                </a></li>
              <li class=""><a href="https://twitter.com/pucesedeibarra" target="_blank" title="Twitter">
                  <i class="fa-brands fa-x-twitter fa-xl p-1"></i> </a></ol>
              <li class=""><a title="instagram" target="_blank" href="https://www.instagram.com/pucesedeibarra/">
                  <i class="fa-brands fa-instagram fa-xl p-1"></i>
                </a></li>
              <li class=""><a title="mail" target="_blank" href="https://apps.pucesi.edu.ec/mail">
                  <i class="fa-regular fa-envelope fa-xl p-1"></i>
                </a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
  <hr class="border border-primary border-1 opacity-50">

  <div class="footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center p-1">
          <h5 class="text-primary">Pontifica Universidad Católica del Ecuador - Secretaría General</h5>
          <div class="text-secondary">
          <a href="https://isnotcristhianr.me/" class="text-secondary" style="text-decoration: none;">Isnotcristhianr</a> 
          © 2023. All rights reserved.
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</body>


<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- JS local -->
<script src="<?php echo base_url('/public/js/funciones/funciones.js') ?>"></script>
<!-- Boostrap Js Local-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script><!-- Boostrap Js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 --><!-- Exportar a Imgs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js" async></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js" async></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/516b0707c7.js" crossorigin="anonymous"></script>
<!-- Animacion de carga -->
<!-- CDN de TOASTR JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" async></script>
<!-- Data Table -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
<!-- Script DataTable -->
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
  /*  import DataTable from 'datatables.net-dt';
  import 'datatables.net-responsive-dt'; */

  $(document).ready(function() {
    $('#tbl').DataTable({
      //idioma de la tabla
      language: {
        "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
      },
      //guardar el estado de la tabla
      stateSave: true,
      //responsive
      responsive: true,
    });
    $('#tbl2').DataTable({
      //idioma de la tabla
      language: {
        "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
      },
      //guardar el estado de la tabla
      stateSave: true,
      //responsive
      responsive: true,

    });
    $('#tbl3').DataTable({
      //idioma de la tabla
      language: {
        "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
      },
      //guardar el estado de la tabla
      stateSave: true,
      //responsive
      responsive: true,


    });
  });
</script>

</html>