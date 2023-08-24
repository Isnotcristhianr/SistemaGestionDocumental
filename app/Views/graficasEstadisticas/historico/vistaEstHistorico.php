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
    <div id="exportContainer">

        <!-- Reporte Estadistico -->
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    </div>

    <!-- Hichart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- Grafica -->
    <script>
        //TODO: obtener datos de php del controlador
        var datos = <?php echo json_encode($tbl_estadistica_matriz) ?>;
        var peri = <?php echo json_encode($tbl_periodo) ?>;

        //! Por Años General
        {
            // Arrays para almacenar los datos
            var total = [];
            var periodo = [];

            // Recorrer los datos y el período
            for (let i = 0; i < datos.length; i++) {
                for (let j = 0; j < peri.length; j++) {
                    if (datos[i].ESTM_PERIODO == peri[j].PER_ID) {
                        // Agregar PER_ANO a periodo si no está en la lista
                        if (!periodo.includes(peri[j].PER_ANO)) {
                            periodo.push(peri[j].PER_ANO);
                            total.push(0); // Inicializar el total para este año en 0
                        }
                        // Acumular el total
                        total[periodo.indexOf(peri[j].PER_ANO)] += parseInt(datos[i].ESTM_TOTAL);
                    }
                }
            }

            // Mostrar los totales por año
            for (let i = 0; i < periodo.length; i++) {
                console.log("Total de Estudiantes " + periodo[i] + ": " + total[i]);
            }
        }

        //!Por Años Genero Masculino -> ESTM_GENERO_H
        {
            // NUEVO TOTAL DE ESTUDIANTES H
            var totalH = [];
            var periodoH = [];

            // Recorrer los datos y el período
            for (let i = 0; i < datos.length; i++) {
                for (let j = 0; j < peri.length; j++) {
                    if (datos[i].ESTM_PERIODO == peri[j].PER_ID) {
                        // Agregar PER_ANO a periodoH si no está en la lista
                        if (!periodoH.includes(peri[j].PER_ANO)) {
                            periodoH.push(peri[j].PER_ANO);
                            totalH.push(0); // Inicializar el total para este año en 0
                        }
                        // Acumular el total
                        totalH[periodoH.indexOf(peri[j].PER_ANO)] += parseInt(datos[i].ESTM_GENERO_H);
                    }
                }
            }

            // Mostrar los totales por año para estudiantes masculinos
            for (let i = 0; i < periodoH.length; i++) {
                console.log("Total de Estudiantes Masculino " + periodoH[i] + ": " + totalH[i]);
            }
        }

        //! Por Años Genero Femenino -> ESTM_GENERO_M
        {
            // Nuevo total de estudiantes M
            var totalM = [];
            var periodoM = [];

            // Recorrer los datos y el período
            for (let i = 0; i < datos.length; i++) {
                for (let j = 0; j < peri.length; j++) {
                    if (datos[i].ESTM_PERIODO == peri[j].PER_ID) {
                        // Agregar PER_ANO a periodoM si no está en la lista
                        if (!periodoM.includes(peri[j].PER_ANO)) {
                            periodoM.push(peri[j].PER_ANO);
                            totalM.push(0); // Inicializar el total para este año en 0
                        }
                        // Acumular el total
                        totalM[periodoM.indexOf(peri[j].PER_ANO)] += parseInt(datos[i].ESTM_GENERO_M);
                    }
                }
            }

            // Mostrar los totales por año para estudiantes femeninos
            for (let i = 0; i < periodoM.length; i++) {
                console.log("Total de Estudiantes Femenino " + periodoM[i] + ": " + totalM[i]);
            }


        }

        function getYears(data) {
            var years = [];
            //logica -> periodo
            //recorrer datos
            for (let i = 0; i < data.length; i++) {
                //recorrer peri
                for (let j = 0; j < peri.length; j++) {
                    //comparar PER_ID con ESTM_PERIODO
                    if (data[i].ESTM_PERIODO == peri[j].PER_ID) {
                        //agregar PER_ANO a periodo
                        years.push(peri[j].PER_ANO);
                    }
                }
            }

            //eliminar años repetidos de periodo y su total asignado
            years = years.filter((value, index) => years.indexOf(value) === index);

            //ordenar periodo de menor a mayor
            years.sort(function(a, b) {
                return a - b;
            });

            return years;

        }

        // Obtener los años de los datos
        var years = getYears(datos);

        //grafica
        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Total de Estudiantes Historico PUCE-I '
            },
            subtitle: {
                text: 'Desde 1976 Hasta 2023'
            },
            xAxis: {
                categories: years,
                title: {
                    text: 'Año'
                },
            },
            yAxis: {
                title: {
                    text: 'Total de Estudiantes'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                },
            },
            series: [{
                    name: 'Total',
                    data: total
                },

                {
                    name: 'Hombres',
                    data: totalH
                },
                {
                    name: 'Mujeres',
                    data: totalM
                }
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },

            credits: {
                enabled: true,
                href: "https://www.pucesi.edu.ec/webs2/",
                text: "Secretaria General PuceI",
                style: {
                    color: "#666666",
                    cursor: "pointer",
                    fontSize: "15px"
                },
            }
        });
    </script>
    <br>

</div>