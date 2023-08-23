 //TODO: obtener datos de php del controlador
 var datos = <?php echo json_encode($tbl_estadistica_matriz) ?>;
 var peri = <?php echo json_encode($tbl_periodo) ?>;

 //datos tiene: ESTM_TOTAL(total por periodo), ESTM_PERIODO(id de PER_ID)
 //peri tiene: PER_ID(id), PER_ANO(año), PER_PERIODO(nombre del periodo)

 //TODO preparar los datos para el grafico

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
 //grafico
 var ctx = document.getElementById('myChart').getContext('2d');
 var myChart = new Chart(ctx, {
     //tipo de grafico
     type: 'line',
     data: {
         //eje x
         labels: periodo,
         datasets: [{
                 //nombre de la grafica
                 label: 'Total de Estudiantes',
                 //color de la linea
                 borderColor: 'rgb(22, 66, 132)',
                 //grosor de la linea
                 borderWidth: 2,
                 //datos de la grafica
                 data: total,
                 //punto de inicio
                 pointStart: 0,
                 //punto de fin
                 pointEnd: 0,
                 //relleno
                 fill: false,
             },
             {
                 //nombre de la grafica
                 label: 'Total de Estudiantes Masculino',
                 //color de la linea
                 borderColor: 'rgb(25, 135, 84)',
                 //grosor de la linea
                 borderWidth: 2,
                 //datos de la grafica
                 data: totalH,
                 //punto de inicio
                 pointStart: 0,
                 //punto de fin
                 pointEnd: 0,
                 //relleno
                 fill: false,
             },
             {
                 //nombre de la grafica
                 label: 'Total de Estudiantes Femenino',
                 //color de la linea
                 borderColor: 'rgb(214, 51, 132)',
                 //grosor de la linea
                 borderWidth: 2,
                 //datos de la grafica
                 data: totalM,
                 //punto de inicio
                 pointStart: 0,
                 //punto de fin
                 pointEnd: 0,
                 //relleno
                 fill: false,
             }
         ]

     },

     options: {
         //titulo
         title: {
             display: true,
             text: 'Total de Estudiantes Histórico PUCE-I' + '\n' + '(1976-2023)',
             fontSize: 15
         },
         //leyenda
         legend: {
             display: true,
             position: 'top',
             labels: {
                 fontColor: '#000'
             }
         },
         //responsive
         responsive: true,
         //valor etiquetas por punto
         tooltips: {
             mode: 'nearest',
             intersect: false,
         },
         //ejes
         scales: {
             //eje x
             xAxes: [{
                 display: true,
                 scaleLabel: {
                     display: true,
                     labelString: 'Años'
                 }
             }],
             //eje y
             yAxes: [{
                 display: true,
                 scaleLabel: {
                     display: true,
                     labelString: 'Total de Estudiantes'
                 }
             }],
         },
     },

 });