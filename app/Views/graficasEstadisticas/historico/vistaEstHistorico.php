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
    <label for=""><b>Fuente: </b>Secretaria General
        <!-- Tomar año actual -->
        <?php
        $fecha = date('Y');
        echo $fecha;
        ?>
    </label>
    <!-- Grafica -->
    <!-- Script chartJs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <!-- Logica Grafica -->
    <script>
        //TODO: obtener datos de php del controlador
        var datos = <?php echo json_encode($tbl_estadistica_matriz) ?>;
        var peri = <?php echo json_encode($tbl_periodo) ?>;

        //datos tiene: ESTM_TOTAL(total por periodo), ESTM_PERIODO(id de PER_ID)
        //peri tiene: PER_ID(id), PER_ANO(año), PER_PERIODO(nombre del periodo)

        //TODO preparar los datos para el grafico
        //* eje y -> total de estudiantes min 0 y max suma de ESTM_TOTAL
        //? logica-> total
        var total = [];
        //recorrer datos
        for (let i = 0; i < datos.length; i++) {
            //agregar total
            total.push(datos[i].ESTM_TOTAL);
        }

        //* eje x -> periodo
        //? logica-> periodo
        var periodo = [];
        //recorrer datos
        for (let i = 0; i < datos.length; i++) {
            //recorrer peri
            for (let j = 0; j < peri.length; j++) {
                //comparar PER_ID con ESTM_PERIODO
                if (datos[i].ESTM_PERIODO == peri[j].PER_ID) {
                    //agregar PER_ANO a periodo
                    periodo.push(peri[j].PER_ANO);
                }
            }
        }
        //sumar los totales de cada año y mostrar por consola el total de cada año, transformar string a int para sumar
        //recorrer periodo
        for (let i = 0; i < periodo.length; i++) {
            //acumulador
            var suma = 0;
            //recorrer datos
            for (let j = 0; j < datos.length; j++) {
                //recorrer peri
                for (let k = 0; k < peri.length; k++) {
                    //comparar PER_ID con ESTM_PERIODO
                    if (datos[j].ESTM_PERIODO == peri[k].PER_ID) {
                        //comparar PER_ANO con periodo
                        if (peri[k].PER_ANO == periodo[i]) {
                            //acumular total
                            suma += parseInt(datos[j].ESTM_TOTAL);
                        }
                    }
                }
            }
            //eliminar años repetidos de periodo y su total asignado
            periodo = periodo.filter((value, index) => periodo.indexOf(value) === index);

            //mostrar total por cada año
            console.log(" Total de Estudiantes " + periodo[i] + ": " + suma);

            //enviar a la grafica
            total[i] = suma;

            //ordenar periodo de menor a mayor
            periodo.sort(function(a, b) {
                return a - b;
            });
        }

        //grafico
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            //tipo de grafico
            type: 'line',
            data: {
                //datos
                labels: periodo,
                datasets: [{
                    label: 'Total de Estudiantes Historico PUCE-I',
                    data: total,
                    backgroundColor: [
                        'rgba(22, 66, 132, 1)',
                        'rgba(54, 162, 235, 0.2)',

                    ],
                    borderColor: [
                        'rgba(34, 131, 196, 1)',
                        'rgba(54, 162, 235, 1)',

                    ],
                    borderWidth: 1,
                    fill: false,
                    pointStyle: 'circle',
                    pointRadius: 10,
                    pointHoverRadius: 10
                }]
            },

            options: {
                //titulo
                title: {
                    display: true,
                    text: 'Total de Estudiantes Histórico PUCE-I' + '\n' + '(1976-2022)',
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
                //responsive
                responsive: true,
            },

            //ejes x y y
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Month'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Value'
                    }
                }
            }


        });
    </script>
    <br>
    <!-- Descarga -->
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <!-- Excel Exportar -->
            <a href="#" id="export" class="btn btn-success btn-sm m-2">
                <i class="fas fa-file-excel"></i> Exportar Datos a Excel
            </a>
            <!-- Exportar PDF -->
            <a href="#" id="exportPdf" class="btn btn-danger btn-sm  m-2">
                <i class="fas fa-file-pdf"></i> Exportar a PDF
            </a>
            <!-- Exportar Img -->
            <a href="#" id="exportImg" class="btn btn-warning btn-sm  m-2">
                <i class="fas fa-file-image"></i> Exportar a Imagen
            </a>
            <!-- Imprimir -->
            <a href="#" id="exportPrint" class="btn btn-info btn-sm  m-2">
                <i class="fas fa-print"></i> Imprimir
            </a>
            <!-- ENVIAR IMG A CORREO -->
            <a href="#" id="exportEmail" class="btn btn-secondary btn-sm  m-2">
                <i class="fas fa-envelope"></i> Enviar a Correo
            </a>
        </div>
    </div>

    <!-- Descargas -->
    <!-- Chartjs to pdf -->
    <script>
        //Exportar a pdf
        document.getElementById('exportPdf').addEventListener('click', function() {

        });

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
            //crear ventana para enviar correo con img adjunta
            var win = window.open("mailto:?subject=Reporte Estadistico Historico PUCE-I&body=Gráfico Estadistico Historico PUCE-I (1976-2022)", "_blank");
        });
    </script>
</div>