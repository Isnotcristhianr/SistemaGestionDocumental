<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/deHistorico') ?>" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Historico PUCE-I
            </h2>
            <h4 class="text-center text-dark">Búsqueda: General </h4>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Reporte ↓</h5>
        </div>
    </div>
</div>
<!-- Contenido-->
<div class="container-center m-5 p-1 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="container">
        <h4>Reporte</h4>
    </div>
    <!-- Reporte Estadistico -->
    <canvas id="myChart"></canvas>
    <!-- Grafica -->
    <!-- Script chartJs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <!-- Logica Grafica -->
    <script>
        //TODO: obtener datos de php del controlador
        var datos = <?php echo json_encode($tbl_estadistica_matriz) ?>;
        var peri = <?php echo json_encode($tbl_periodo) ?>;

        //preparar los datos para el grafico

        //! eje y -> total de estudiantes graduados y matriculados
        //? logica-> total
        //datos tiene: ESTM_TOTAL
        var total = datos.map(function(elem) {
            return elem.ESTM_TOTAL;
        });


        //! eje x 
        //? logica-> periodo
        //peri tiene: PER_ID, PER_ANO
        //datos tiene: ESTM_PERIODO, ESTM_TOTAL
        //se compara PER_ID con ESTM_PERIODO y si coinciden se guarda el PER_ANO
        /* 
        1.  ESTM_PERIODO coincide con PER_ID, entonces ESTM_TOTAL tiene un ESTM_ID
        2. Donde coincide se le asigna el ESTM_TOTAL a PER_ANO y se guarda en periodo
        3. Se repite el proceso hasta que se recorran todos los datos
        4. se ordena el arreglo periodo de menor a mayor
        5. se suman los valores de ESTM_TOTAL que coincidan con PER_ANO y se asigan al total
        */

        var periodo = [];
        for (var i = 0; i < datos.length; i++) {
            for (var j = 0; j < peri.length; j++) {
                if (datos[i].ESTM_PERIODO == peri[j].PER_ID) {
                    periodo.push(peri[j].PER_ANO);
                }
            }
        }
        var a = [],
            b = [],
            prev;
        periodo.sort();
        for (var i = 0; i < periodo.length; i++) {
            if (periodo[i] !== prev) {
                a.push(periodo[i]);
                b.push(1);
            } else {
                b[b.length - 1]++;
            }
            prev = periodo[i];
        }
        periodo = a;
        total = b;



        //grafico
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            //tipo de grafico
            type: 'line',
            data: {
                //datos
                labels: periodo,
                datasets: [{
                    label: 'Total de Graduados por Periodo',
                    data: total,
                    backgroundColor: [
                        'rgba(99, 119, 255, 0.3)',
                        'rgba(54, 162, 235, 0.2)',

                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 1)',
                        'rgba(54, 162, 235, 1)',

                    ],
                    borderWidth: 1
                }]
            },

            options: {
                //titulo
                title: {
                    display: true,
                    text: 'Total de Estudiantes Historico PUCE-I' + '\n' + '(1976-2022)',
                    fontSize: 15
                },
                //leyenda
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        fontColor: '#000'
                    }
                },
                //eje y
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                //responsive
                responsive: true
            }
        });
    </script>
    <br>
    <!-- Descarga -->
    <div class="container m-5 ">
        <!-- Excel Exportar -->
        <a href="#" id="export" class="btn btn-success btn-sm">
            <i class="fas fa-file-excel"></i> Exportar Datos a Excel
        </a>
        <!-- Exportar PDF -->
        <a href="<?php echo base_url('index.php/ControladorReportes/reporteTitulacionPDF') ?>" class="btn btn-danger btn-sm">
            <i class="fas fa-file-pdf"></i> Exportar a PDF
        </a>
        <!-- Exportar Img -->
        <a href="#" id="exportImg" class="btn btn-warning btn-sm">
            <i class="fas fa-file-image"></i> Exportar a Imagen
        </a>
        <!-- Imprimir -->
        <a href="#" id="exportPrint" class="btn btn-info btn-sm">
            <i class="fas fa-print"></i> Imprimir
        </a>
        <!-- ENVIAR IMG A CORREO -->
        <a href="#" id="exportEmail" class="btn btn-secondary btn-sm">
            <i class="fas fa-envelope"></i> Enviar a Correo
        </a>
    </div>
    <!-- Descargas -->
    <script>
        //Exportar Img
        document.getElementById('exportImg').addEventListener('click', function() {
            //capturar canvas
            var canvas = document.getElementById('myChart');
            //obtener imagen
            var img = canvas.toDataURL('image/png');
            //descargar imagen
            var link = create = document.createElement('a');
            link.href = img;
            link.download = 'ReporteEstadisticoHistorico.png';
            //descargar
            link.click();
        });

        //Imprimir
        document.getElementById('exportPrint').addEventListener('click', function() {
            //capturar canvas
            var canvas = document.getElementById('myChart');
            //crear ventana para impresion
            var win = window.open("", "_blank");

            //agregar canvas a ventana emergente
            win.document.open();
            win.document.write('<html><head ><title>Total de Estudiantes Historico PUCE-I (1976-2022)</title></head><body onload="window.print()">');
            win.document.write('<img src="' + canvas.toDataURL("image/png") + '" alt="Gráfico" />');
            win.document.write('</body></html>');
            win.document.close();

            //imprimir
            win.onload = function() {
                win.print();
                win.close();
            }
        });

        //enviar a email
        document.getElementById('exportEmail').addEventListener('click', function() {
            //capturar canvas
            var canvas = document.getElementById('myChart');
            //obtener imagen
            var img = canvas.toDataURL('image/png');
            //crear ventana para enviar correo
            var win = window.open("mailto:?subject=Reporte Estadistico Historico PUCE-I&body=Gráfico Estadistico Historico PUCE-I (1976-2022)", "_blank");
            

        });
    </script>
</div>