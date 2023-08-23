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
        }

        //!Por Años Genero Masculino -> ESTM_GENERO_H
        {
            //NUEVO TOTAL DE ESTUDIANTES H
            var totalH = [];
            //recorrer datos
            for (let i = 0; i < datos.length; i++) {
                //agregar total
                totalH.push(datos[i].ESTM_GENERO_H);
            }

            //* eje x -> periodo
            //? logica-> periodo
            var periodoH = [];
            //recorrer datos
            for (let i = 0; i < datos.length; i++) {
                //recorrer peri
                for (let j = 0; j < peri.length; j++) {
                    //comparar PER_ID con ESTM_PERIODO
                    if (datos[i].ESTM_PERIODO == peri[j].PER_ID) {
                        //agregar PER_ANO a periodo
                        periodoH.push(peri[j].PER_ANO);
                    }
                }
            }
            //sumar los ESTM_GENERO_M de cada año y mostrar por consola el total de cada año, transformar string a int para sumar
            //recorrer periodo
            for (let i = 0; i < periodoH.length; i++) {
                //acumulador
                var sumaH = 0;
                //recorrer datos
                for (let j = 0; j < datos.length; j++) {
                    //recorrer peri
                    for (let k = 0; k < peri.length; k++) {
                        //comparar PER_ID con ESTM_PERIODO
                        if (datos[j].ESTM_PERIODO == peri[k].PER_ID) {
                            //comparar PER_ANO con periodo
                            if (peri[k].PER_ANO == periodoH[i]) {
                                //acumular total
                                sumaH += parseInt(datos[j].ESTM_GENERO_H);
                            }
                        }
                    }
                }
                //eliminar años repetidos de periodo y su total asignado
                periodoH = periodoH.filter((value, index) => periodoH.indexOf(value) === index);

                //mostrar total por cada año
                console.log(" Total de Estudiantes Masculino " + periodoH[i] + ": " + sumaH);

                //enviar a la grafica
                totalH[i] = sumaH;

                //ordenar periodo de menor a mayor
                periodoH.sort(function(a, b) {
                    return a - b;
                });
            }
        }

        //! Por Años Genero Femenino -> ESTM_GENERO_M
        {
            //Nuevo total de estudiantes M
            var totalM = [];
            //recorrer datos
            for (let i = 0; i < datos.length; i++) {
                //agregar total
                totalM.push(datos[i].ESTM_GENERO_M);
            }

            //* eje x -> periodo
            //? logica-> periodo
            var periodoM = [];
            //recorrer datos
            for (let i = 0; i < datos.length; i++) {
                //recorrer peri
                for (let j = 0; j < peri.length; j++) {
                    //comparar PER_ID con ESTM_PERIODO
                    if (datos[i].ESTM_PERIODO == peri[j].PER_ID) {
                        //agregar PER_ANO a periodo
                        periodoM.push(peri[j].PER_ANO);
                    }
                }
            }
            //sumar los ESTM_GENERO_M de cada año y mostrar por consola el total de cada año, transformar string a int para sumar
            //recorrer periodo
            for (let i = 0; i < periodoM.length; i++) {
                //acumulador
                var sumaM = 0;
                //recorrer datos
                for (let j = 0; j < datos.length; j++) {
                    //recorrer peri
                    for (let k = 0; k < peri.length; k++) {
                        //comparar PER_ID con ESTM_PERIODO
                        if (datos[j].ESTM_PERIODO == peri[k].PER_ID) {
                            //comparar PER_ANO con periodo
                            if (peri[k].PER_ANO == periodoM[i]) {
                                //acumular total
                                sumaM += parseInt(datos[j].ESTM_GENERO_M);
                            }
                        }
                    }
                }
                //eliminar años repetidos de periodo y su total asignado
                periodoM = periodoM.filter((value, index) => periodoM.indexOf(value) === index);

                //mostrar total por cada año
                console.log(" Total de Estudiantes Femenino " + periodoM[i] + ": " + sumaM);

                //enviar a la grafica
                totalM[i] = sumaM;

                //ordenar periodo de menor a mayor
                periodoM.sort(function(a, b) {
                    return a - b;
                });
            }


        }

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
                categories: periodo,
                title: {
                    text: 'Año'
                }
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
                pointStart: 0,
                pointEnd: 0
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
            exporting: {
                buttons: {
                    contextButton: {
                        menuItems: ["viewFullscreen", "printChart", "separator", "downloadPNG", "downloadJPEG", "downloadPDF", "downloadSVG", "separator", "downloadXLS", "downloadCSV"]
                    }
                }
            },
            credits: {
                enabled: true,
                href: "https://www.pucesi.edu.ec/webs2/",
                text: "Secretaria General PuceI" ,
                style: {
                    color: "#666666",
                    cursor: "pointer",
                    fontSize: "20px"
                },
            }
        });
    </script>
    <br>

</div>