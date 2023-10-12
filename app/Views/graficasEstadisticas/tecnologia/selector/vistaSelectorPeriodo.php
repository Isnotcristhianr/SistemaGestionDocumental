<?php
/* foreach ($ids as $id) {
    echo $id . ",";
} */

?>

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/FiltroEstadisticoTecnologiaPeriodo/General') ?>" class="btn btn-outline-primary">
        <i class="fa-solid fa-caret-left"></i> Volver
    </a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Ténicas y Tecnológicas PUCE-I Periodos
            </h2>
            <h5 class="text-center text-dark">Búsqueda:
                <?php
                /* mostrar nombres de las escuelas seleccionadas */
                foreach ($ids as $id) {
                    foreach ($tbl_periodo as $periodo) {
                        if ($periodo['PER_ID'] == $id) {
                            echo "<ol>". $periodo['PER_PERIODO'] . ", " ."</o>";
                        }
                    }
                }
                ?>
            </h5>
            <h5 class="text-center text-secondary"> Matriculados - Graduados
            </h5>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Reporte ↓</h5>
            <p class="text-center text-secondary" id="periodos"></p>
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
        // TODO: obtener datos de php del controlador
        var datos = <?php echo json_encode($tbl_estadistica_matriz) ?>;
        var periodos = <?php echo json_encode($tbl_periodo) ?>;
        var ids = <?php echo json_encode($ids) ?>;

        // Nombre de las escuelas
        var nombresperiodos = "";
        for (var i = 0; i < ids.length; i++) {
            for (var j = 0; j < periodos.length; j++) {
                if (ids[i] == periodos[j].PER_ID) {
                    nombresperiodos += periodos[j].PER_PERIODO + ", ";
                }
            }
        }

        // Inicializar totales para todas las escuelas
        var totalGeneral = 0;
        var totalHombres = 0;
        var totalMujeres = 0;

        // Calcular totales para todas las escuelas
        for (var i = 0; i < ids.length; i++) {
            // Filtrar datos por la escuela actual
            var filteredData = datos.filter(function(dato) {
                return dato.ESTM_PERIODO == ids[i] && dato.ESTM_TIPO === '3' && (dato.ESTM_CONDICION === '1' || dato.ESTM_CONDICION === '3');
            });

            // Calcular totales para la escuela actual
            for (var j = 0; j < filteredData.length; j++) {
                totalGeneral += parseInt(filteredData[j].ESTM_TOTAL);
                totalHombres += parseInt(filteredData[j].ESTM_GENERO_H);
                totalMujeres += parseInt(filteredData[j].ESTM_GENERO_M);
            }
        }

        // Graficar
        Highcharts.chart('container', {
            chart: {
                type: 'column',
                // Marca de agua
                events: {
                    load: function() {
                        // Imagen opaca fondo
                        this.renderer.image('<?php echo base_url('/public/imgs/logoPucesi.png') ?>')
                            .css({
                                opacity: 0.35
                            })
                            .add();
                    }
                }
            },
            title: {
                text: 'Total Estudiantes Técnicas y Tecnológicas PUCE-I'
            },
            subtitle: {
                text: 'Matriculados - Graduados' + '<br>' +
                    "<b>Periodo(s): </b>" + nombresperiodos
            },
            xAxis: {
                categories: [nombresperiodos],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Estudiantes'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true, // Habilita etiquetas de datos
                        format: '{y}', // Muestra el valor de Y (cantidad de estudiantes)
                        style: {
                            fontWeight: 'bold',
                            color: 'black' // Color de las etiquetas
                        }
                    }
                }
            },
            series: [{
                    name: '👨🏻‍🎓 Hombres',
                    data: [totalHombres]
                },
                {
                    name: '👩🏻‍🎓 Mujeres',
                    data: [totalMujeres]
                },
                {
                    name: '👨🏻‍🎓👩🏻‍🎓 Total',
                    data: [totalGeneral]
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
                    fontSize: "10px"
                },
            }
        });
    </script>


</div>