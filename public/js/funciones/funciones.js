/* Determinar Nivel de Busqueda */
// The code initializes some variables and gets some elements from the document
// The variables and elements are used later on in the code

const opcionesBusqueda = document.getElementsByName("busqueda");
const respBusqueda = document.getElementById("resBusqueda");
const respRespTit = document.getElementById("resRepTit");

opcionesBusqueda.forEach((opcion) => {
  opcion.addEventListener("change", () => {
    /* Vaciar innerHTML */
    respBusqueda.innerHTML = "";
    respRespTit.innerHTML = "";

    if (opcion.value == "fecha") {
      /* Ocultar Busqueda*/
      //$("#fitradoBusqueda").hide();
      // $("#textoBusqueda").hide();

      /* Mostrar fecha desde y hasta para busqueda con estilo boostrap*/
      respBusqueda.innerHTML = ` <div class="row p-2" >
                                            <form action="/busqueda" method="POST">
                                              <div class="col">
                                                  <label for="fechaDesde" >Desde</label>
                                                  <input type="date" class="form-control" name="fechaDesde" id="fechaDesde">
                                              </div>
                                              <div class="col">
                                                  <label for="fechaHasta">Hasta</label>
                                                  <input type="date" class="form-control" name="fechaHasta" id="fechaHasta">
                                              </div>
                                              <div class="col text-center m-3 p-1">
                                                  <button type="submit" class="btn btn-primary m-1" name="etnia">Etnia</button>
                                                  <button type="submit" class="btn btn-secondary m-1" name="genero">Genero</button>
                                                  <button type="submit" class="btn btn-success m-1" name="nacionalidad">Nacionalidad</button>

                                              </div>
                                          </form>
                                        </div>`;
    } else if (opcion.value == "noFecha") {
      /* Ocultar Busqueda*/
      // $("#fitradoBusqueda").hide();
      //$("#textoBusqueda").hide();

      respBusqueda.innerHTML = ` <div class="row p-2" style="width: 500px; margin:0px 325px 0px 325px">
                                            <form action="/busqueda" method="POST">
                                            <div class="col text-center m-3 p-1">
                                                  <button type="submit" class="btn btn-primary m-1" name="etnia">Etnia</button>
                                                  <button type="submit" class="btn btn-secondary m-1" name="genero">Genero</button>
                                                  <button type="submit" class="btn btn-success m-1" name="nacionalidad">Nacionalidad</button>

                                              </div>
                                            </form>
                                  </div>`;
    } else if (opcion.value == "fechah") {
      respBusqueda.innerHTML = ` <div class="row p-2" >
                                    <form action="/busqueda" method="POST">
                                      <div class="col">
                                          <label for="fechaDesde" class="fw-bold">Desde</label>
                                          <input type="date" class="form-control" name="fechaDesde" id="fechaDesde">
                                      </div>
                                      <div class="col">
                                          <label for="fechaHasta" class="fw-bold">Hasta</label>
                                          <input type="date" class="form-control" name="fechaHasta" id="fechaHasta">
                                      </div>
                                      <div class="col text-center m-3 p-1">
                                          <button type="submit" class="btn btn-primary m-1" name="masculino">Masculino</button>
                                          <button type="submit" class="btn btn-info m-1" name="femenino">Femenino</button>
                                          <button type="submit" class="btn btn-secondary m-1" name="mixto">Mixto</button>

                                      </div>
                                    </form> 
                                  </div>`;
    } else if (opcion.value == "nofechah") {
      respBusqueda.innerHTML = ` <div class="row p-2" >
                                    <form action="/SistemaGestionDocumental/index.php/busquedaHistorico" method="GET">
                                      
                                      <div class="col text-center m-3 p-1">
                                          <button type="submit" class="btn btn-primary m-1">Consultar</button>
                                      </div>
                                    </form>
                                  </div>`;
    } else if (opcion.value == "fechaRepTit") {
      respRespTit.innerHTML = ` <div class="row p-2" >
                                    <form action="/busqueda" method="POST">
                                        <div class="col">
                                          <label for="fechaDesde">Desde</label>
                                          <input type="date" class="form-control" name="fechaDesde" id="fechaDesde">
                                      </div>
                                      <div class="col">
                                          <label for="fechaHasta">Hasta</label>
                                          <input type="date" class="form-control" name="fechaHasta" id="fechaHasta">
                                      </div>
                                      <div class="col text-center m-3 p-1">
                                          <b type="submit" class="btn btn-primary m-1" name="consultar">Consultar</b>
                                      </div>
                                    </form>
                                  </div>`;
    } else if (opcion.value == "noFechaRepTit") {
      respRespTit.innerHTML = ` <div class="row p-2" >
                                    <form action="/busqueda" method="POST">
                                      
                                      <div class="col text-center m-3 p-1">
                                          <b type="submit" class="btn btn-primary m-1" name="consultar">Consultar</b>
                                      </div>
                                    </form>
                                  </div>`;
    }
  });
});
