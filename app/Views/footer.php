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
 -->
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/516b0707c7.js" crossorigin="anonymous"></script>
<!-- Data Table -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
<!-- Script DataTable -->
<script>
  $(document).ready(function() {
    $('#tbl').DataTable({
      //salto de linea cuando se desborda de la pantalla
      "responsive": true,
      //para que se vea el boton de exportar

      "dom": 'T<"clear">lfrtip',
      "tableTools": {
        "sRowSelect": "multi",
        "aButtons": [{
          "sExtends": "select_none",
          "sButtonText": "Borrar selección"
        }]
      },
      "pagingType": "simple_numbers",
      //Actualizo las etiquetas de mi tabla para mostrarlas en español
      "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página.",
        "zeroRecords": "No se encontró registro.",
        "info": "  _START_ de _END_ (_TOTAL_ registros totales).",
        "infoEmpty": "0 de 0 de 0 registros",
        "infoFiltered": "(Encontrado de _MAX_registros)",
        "search": "Buscar: ",
        "processing": "Procesando la información",
        "paginate": {
          "first": " |< ",
          "previous": "Ant.",
          "next": "Sig.",
          "last": " >| "
        }
      }
    });
    $('#tbl2').DataTable({
      //salto de linea cuando se desborda de la pantalla
      "responsive": true,
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
        "sRowSelect": "multi",
        "aButtons": [{
          "sExtends": "select_none",
          "sButtonText": "Borrar selección"
        }]
      },
      "pagingType": "simple_numbers",
      //Actualizo las etiquetas de mi tabla para mostrarlas en español
      "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página.",
        "zeroRecords": "No se encontró registro.",
        "info": "  _START_ de _END_ (_TOTAL_ registros totales).",
        "infoEmpty": "0 de 0 de 0 registros",
        "infoFiltered": "(Encontrado de _MAX_registros)",
        "search": "Buscar: ",
        "processing": "Procesando la información",
        "paginate": {
          "first": " |< ",
          "previous": "Ant.",
          "next": "Sig.",
          "last": " >| "
        }
      }
    });
  });
</script>

</html>