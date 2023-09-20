<!-- Footer -->
<!-- Footer -->
<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <h2>Sobre Gestion Documental</h2>
        <p>Gestión Documental es un sistema de información que permite la administración de los documentos de la PUCE-I, facilitando el acceso a la información de manera rápida y eficiente.</p>
      </div>

      <div class="col-xs-6 col-md-3">
        <h2>Categorías</h2>
        <nav aria-label="Categorías">
          <ul class="footer-links">
            <li><a href="#" aria-label="Actas Consejo Directivo">Actas Consejo Directivo</a></li>
            <li><a href="#" aria-label="Actas Consejo Grado">Actas Consejo Grado</a></li>
            <li><a href="#" aria-label="Matriz Graduados">Matriz Graduados</a></li>
            <!-- Agregar atributos "aria-label" a los demás enlaces -->
          </ul>
        </nav>
      </div>

      <div class="col-xs-6 col-md-3">
        <h2>Utilidades</h2>
        <nav aria-label="Utilidades">
          <ul class="footer-links">
            <li><a href="#" aria-label="Inicio">Inicio</a></li>
            <li><a href="https://www.pucesi.edu.ec/webs2/" aria-label="Puce-I">Puce-I</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by <a href="https://isnotcristhianr.me/" target="_blank" aria-label="IsnotCristhianr">IsnotCristhianr</a>.</p>
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