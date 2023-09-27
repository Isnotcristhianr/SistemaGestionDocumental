<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoGradoEscuela/General" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grado PUCE-I
            </h2>
            <h4 class="text-center text-dark">Búsqueda:
                <!-- Obtener el id de la escuela -->
                <?php
                foreach ($tbl_carrera as $row) {
                    if ($row['CAR_ID'] == $id) {
                        echo $row['CAR_NOMBRE'];
                    }
                }
                ?>
            </h4>
            <h5 class="text-center text-secondary"> Matriculados - Graduados
            </h5>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Reporte ↓</h5>
            <p class="text-center text-secondary" id="carreras"></p>
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
        var carrera = <?php echo json_encode($tbl_carrera) ?>;


        //tbl_carrera tiene car_padreesc que se compara con el id de la escuela
        //se obtiene un conjunto de carreras que corresponden a la escuela
        //guardar los id de las carreras en un array, se guardan los id de CAR_ID que corresponden a la escuela
        //CTIP_ID debe ser 2 (GRADO), CAR_CARRERA = 1 (CARRERA)
        //CAR_ACTIVA = SÍ
        var carreras = [];
        for (var i = 0; i < carrera.length; i++) {
            if (carrera[i].CAR_PADREESC == <?php echo $id ?> && carrera[i].CTIP_ID == 2 && carrera[i].CAR_CARRERA == 1 && (carrera[i].CAR_ACTIVA == 'SÍ' || carrera[i].CAR_ACTIVA == 'No')) {
                carreras.push(carrera[i].CAR_ID);
            }
        }

        //mostrar nombre de la escuela según el id
        var nombreEscuela = '';
        for (var i = 0; i < carrera.length; i++) {
            if (carrera[i].CAR_ID == <?php echo $id ?>) {
                nombreEscuela = carrera[i].CAR_NOMBRE;
                break;
            }
        }

        // Objeto para asociar escuela con totales
        var escuelaTotalMap = {};

        // Recorrer los datos y las carreras
        for (let i = 0; i < datos.length; i++) {
            var dato = datos[i];
            if (carreras.includes(dato.ESTM_CARRERA) && (dato.ESTM_SEDE === '2' && dato.ESTM_TIPO === '2' && (dato.ESTM_CONDICION === '1' || dato.ESTM_CONDICION === '3'))) {
                // Agregar la escuela si no está en el objeto
                if (!escuelaTotalMap[nombreEscuela]) {
                    escuelaTotalMap[nombreEscuela] = {
                        hombres: 0,
                        mujeres: 0,
                        total: 0
                    };
                }
                // Sumar los totales
                escuelaTotalMap[nombreEscuela].hombres += parseInt(dato.ESTM_GENERO_H);
                escuelaTotalMap[nombreEscuela].mujeres += parseInt(dato.ESTM_GENERO_M);
                escuelaTotalMap[nombreEscuela].total += parseInt(dato.ESTM_TOTAL);

            }
        }

        //Obtener array con nombres de las carreras
        var carrerasNombre = [];
        for (var i = 0; i < carrera.length; i++) {
            if (carreras.includes(carrera[i].CAR_ID)) {
                carrerasNombre.push(carrera[i].CAR_NOMBRE);
            }
        }
        // Obtener los nombres de escuela y sus totales
        var escuelas = Object.keys(escuelaTotalMap);
        var totalesH = escuelas.map(function(escuela) {
            return escuelaTotalMap[escuela].hombres;
        });
        var totalesM = escuelas.map(function(escuela) {
            return escuelaTotalMap[escuela].mujeres;
        });
        var totales = escuelas.map(function(escuela) {
            return escuelaTotalMap[escuela].total;
        });


        // Graficar

        //tam dinamico
        // Calcular el alto deseado en función de la cantidad de carreras
        var altoDeseado = carreras.length * 100;

        //ALTO MINIMO
        if (altoDeseado < 400) {
            altoDeseado = 400;
        }

        //ALTO MAXIMO
        if (altoDeseado > 500) {
            altoDeseado = 500;
        }

        // Establecer el alto del contenedor
        document.getElementById('container').style.height = altoDeseado + 'px';

        Highcharts.chart('container', {
            chart: {
                type: 'column',
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
                text: 'Total Estudiantes Histórico Tulcán Grado PUCE-I'
            },
            subtitle: {
                text: 'Matriculados - Graduados <br> <b>Escuela: </b>' +
                    /* nombre de la escuela */
                    nombreEscuela +
                    /* Carreras nombre */
                    '<br><b>Carreras: </b>' +
                    carrerasNombre
            },
            xAxis: {
                crosshair: true,
                /* Nombre escuela */
                categories: escuelas,
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
                    data: totalesH
                },
                {
                    name: '👩🏻‍🎓 Mujeres',
                    data: totalesM
                },
                {
                    name: '👨🏻‍🎓👩🏻‍🎓 Total',
                    data: totales
                },
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
    <br>
</div>