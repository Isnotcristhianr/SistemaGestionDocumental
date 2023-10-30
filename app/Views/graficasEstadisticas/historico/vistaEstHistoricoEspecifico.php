<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/deHistorico') ?>" class="btn btn-outline-primary">
        <i class="fa-solid fa-caret-left"></i> Volver
    </a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grado PUCE-I Por Fechas
            </h2>
            <h4 class="text-center text-dark">Búsqueda
                Desde: <?php echo $fechaInicio ?>
                Hasta: <?php echo $fechaFin ?> </h4>
            <h5 class="text-center text-secondary"> Matriculados - Graduados
            </h5>
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
            // Objeto para asociar periodos con totales
            var periodoTotalMap = {};

            // Recorrer los datos y el período
            for (let i = 0; i < datos.length; i++) {
                for (let j = 0; j < peri.length; j++) {
                    if (datos[i].ESTM_PERIODO == peri[j].PER_ID) {
                        // Agregar PER_ANO a periodo si no está en el objeto
                        if (!periodoTotalMap.hasOwnProperty(peri[j].PER_ANO)) {
                            periodoTotalMap[peri[j].PER_ANO] = 0; // Inicializar el total para este año en 0
                        }
                        // Acumular el total
                        periodoTotalMap[peri[j].PER_ANO] += parseInt(datos[i].ESTM_TOTAL);
                    }
                }
            }

            // Obtener periodos únicos y ordenarlos en orden ascendente
            var periodo = Object.keys(periodoTotalMap).map(Number);
            periodo.sort(function(a, b) {
                return a - b;
            });

            // Obtener los totales ordenados de acuerdo con el nuevo orden de periodos
            var total = periodo.map(function(periodoKey) {
                return periodoTotalMap[periodoKey];
            });
        }


        //! Por Años Genero Masculino -> ESTM_GENERO_H
        {
            // Objeto para asociar periodos con totales de género masculino
            var periodoHTotalMap = {};

            // Recorrer los datos y el período
            for (let i = 0; i < datos.length; i++) {
                for (let j = 0; j < peri.length; j++) {
                    if (datos[i].ESTM_PERIODO == peri[j].PER_ID) {
                        // Agregar PER_ANO a periodoH si no está en el objeto
                        if (!periodoHTotalMap.hasOwnProperty(peri[j].PER_ANO)) {
                            periodoHTotalMap[peri[j].PER_ANO] = 0; // Inicializar el total para este año en 0
                        }
                        // Acumular el total de género masculino
                        periodoHTotalMap[peri[j].PER_ANO] += parseInt(datos[i].ESTM_GENERO_H);
                    }
                }
            }

            // Obtener periodos únicos y ordenarlos en orden ascendente
            var periodoH = Object.keys(periodoHTotalMap).map(Number);
            periodoH.sort(function(a, b) {
                return a - b;
            });

            // Obtener los totales de género masculino ordenados de acuerdo con el nuevo orden de periodos
            var totalH = periodoH.map(function(periodoKey) {
                return periodoHTotalMap[periodoKey];
            });
        }


        //! Por Años Genero Femenino -> ESTM_GENERO_M
        {
            // Objeto para asociar periodos con totales de género femenino
            var periodoMTotalMap = {};

            // Recorrer los datos y el período
            for (let i = 0; i < datos.length; i++) {
                for (let j = 0; j < peri.length; j++) {
                    if (datos[i].ESTM_PERIODO == peri[j].PER_ID) {
                        // Agregar PER_ANO a periodoM si no está en el objeto
                        if (!periodoMTotalMap.hasOwnProperty(peri[j].PER_ANO)) {
                            periodoMTotalMap[peri[j].PER_ANO] = 0; // Inicializar el total para este año en 0
                        }
                        // Acumular el total de género femenino
                        periodoMTotalMap[peri[j].PER_ANO] += parseInt(datos[i].ESTM_GENERO_M);
                    }
                }
            }

            // Obtener periodos únicos y ordenarlos en orden ascendente
            var periodoM = Object.keys(periodoMTotalMap).map(Number);
            periodoM.sort(function(a, b) {
                return a - b;
            });

            // Obtener los totales de género femenino ordenados de acuerdo con el nuevo orden de periodos
            var totalM = periodoM.map(function(periodoKey) {
                return periodoMTotalMap[periodoKey];
            });
        }

        //transformar fecha inicio y fin a año
        var fechaInicio = new Date('<?php echo $fechaInicio ?>');
        var fechaFin = new Date('<?php echo $fechaFin ?>');
        //solo año
        var añoInicio = fechaInicio.getFullYear();
        var añoFin = fechaFin.getFullYear();

        //filtrar por fecha, tipo y condicion
        var periodoFiltrado = [];
        var totalFiltrado = [];
        var totalHFiltrado = [];
        var totalMFiltrado = [];
        for (let i = 0; i < periodo.length; i++) {
            if (periodo[i] >= añoInicio && periodo[i] <= añoFin) {
                periodoFiltrado.push(periodo[i]);
                totalFiltrado.push(total[i]);
                totalHFiltrado.push(totalH[i]);
                totalMFiltrado.push(totalM[i]);
            }
        }



        //grafica
        Highcharts.chart('container', {
            chart: {
                type: 'line',
                //marca de agua
                events: {
                    load: function() {
                        //imagen opaca fondo
                        this.renderer.image('<?php echo base_url('/public/imgs/logoPucesi.png') ?>')
                            .css({
                                opacity: 0.35
                            })
                            .add();
                    }
                }
            },
            title: {
                text: 'Total de Estudiantes Histórico PUCE-I '
            },
            subtitle: {
                text: '<b>📅 Desde: </b> ' +
                    '<?php echo $fechaInicio ?>' +
                    ' <b>📅 Hasta: </b> ' +
                    '<?php echo $fechaFin ?>'
            },
            xAxis: {
                categories: periodoFiltrado,
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
                    name: '👨🏻‍🎓👩🏻‍🎓 Total',
                    data: totalFiltrado
                },

                {
                    name: '👨🏻‍🎓 Hombres',
                    data: totalHFiltrado
                },
                {
                    name: '👩🏻‍🎓 Mujeres',
                    data: totalMFiltrado
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
                text: "Secretaría General PUCE-I",
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