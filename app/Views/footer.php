<!-- Footer -->
<!-- Site footer -->
<footer class="site-footer ">
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
        <ul class="footer-links text-decoration-none">
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


<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- JS local -->
<script src="<?php echo base_url('/public/js/funciones/funciones.js') ?>"></script>
<!-- Boostrap Js Local-->
<script src="<?php echo base_url('/public/js/bootstrap.min.js') ?>"></script>
<!-- Boostrap Js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 --><!-- Exportar a Imgs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/516b0707c7.js" crossorigin="anonymous"></script>
<!-- Animacion de carga -->
<!-- CDN de spin.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/spin.js/2.3.2/spin.min.js"></script>

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