<template>
  <section class="content">
    <!-- Aqui Empieza la seccion clientes -->
    <div class="container-fluid">
      <!-- ******************************************************************************* -->
      <div class="row">
        <div class="col-12">
          <div class="card card-gray card-outline card-tabs pb-0 m-0">
            <div class="card-header">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    id="tab-carga-clientes-tab"
                    data-toggle="pill"
                    href="#tab-carga-clientes"
                    role="tab"
                    aria-controls="tab-carga-clientes"
                    aria-selected="true"
                    >Carga de Datos</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="tab-lista-clientes-tab"
                    data-toggle="pill"
                    href="#tab-lista-clientes"
                    role="tab"
                    aria-controls="tab-lista-clientes"
                    aria-selected="false"
                    >Lista de Clientes</a
                  >
                </li>
              </ul>
              <!-- cli_codigo -->
              <input
                type="hidden"
                name="cliente"
                id=""
                v-model="frmCliente.cli_codigo"
              />
            </div>
            <div class="card-body p-0 mb-0">
              <div class="tab-content m-0" id="custom-tabs-one-tabContent">
                <div
                  class="tab-pane fade show active"
                  id="tab-carga-clientes"
                  role="tabpanel"
                  aria-labelledby="tab-carga-clientes"
                >
                  <form
                    @submit.prevent="frmCliente.cli_codigo = ''? createCliente(): updateCliente()"
                  >
                    <div class="card m-0">
                      <div class="card-body p-0">
                        <div class="row pb-0">
                          <div class="col-12 pb-0 pt-0">
                            <div
                              class="
                                card card-primary card-outline card-tabs
                                m-0
                              "
                            >
                              <!-- Tabs General, Actividades, documentos... -->
                              <tab2TabsDatos></tab2TabsDatos>
                              <!-- Tabs -->
                              <div
                                class="card-body pt-1 pb-1 m-0"
                                style="height: 300px; overflow-y: auto"
                              >
                                <div
                                  class="tab-content"
                                  id="custom-tabs-one-tabContent"
                                >
                                  <!-- Datos Generales -->
                                  <div
                                    class="tab-pane fade show active"
                                    id="tab-general"
                                    role="tabpanel"
                                    aria-labelledby="tab-general-tab"
                                  >
                                    <!-- Datos Cabecera -->
                                    <div
                                      class="
                                        row
                                        border border-gray
                                        rounded
                                        p-2
                                        bg-light-grey
                                      "
                                    >
                                      <div class="col-4 m-0 p-0">
                                        <!-- Columna 1 -->
                                        <div class="input-group m-0 p-0">
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0">Nombre</label>
                                            <input
                                              v-model="frmCliente.cli_nombres"
                                              type="text"
                                              name="cli_nombres"
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              :class="{
                                                'is-invalid':
                                                  frmCliente.errors.has(
                                                    'cli_nombres'
                                                  ),
                                              }"
                                            />
                                            <has-error
                                              :form="frmCliente"
                                              field="cli_nombres"
                                            ></has-error>
                                          </div>

                                          <div class="form-group col-10 m-0">
                                            <label class="m-0">Apellido</label>
                                            <input
                                              v-model="frmCliente.cli_apellidos"
                                              type="text"
                                              name="cli_apellidos"
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              :class="{
                                                'is-invalid':
                                                  frmCliente.errors.has(
                                                    'cli_apellidos'
                                                  ),
                                              }"
                                            />
                                            <has-error
                                              :form="frmCliente"
                                              field="cli_apellidos"
                                            ></has-error>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-4 m-0 p-0">
                                        <!-- Columna 2 -->
                                        <div class="input-group m-0 p-0">
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0">RUC</label>
                                            <input
                                              v-model="frmCliente.cli_ruc"
                                              type="text"
                                              name="cli_ruc"
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              :class="{
                                                'is-invalid':
                                                  frmCliente.errors.has(
                                                    'cli_ruc'
                                                  ),
                                              }"
                                            />
                                            <has-error
                                              :form="frmCliente"
                                              field="cli_ruc"
                                            ></has-error>
                                          </div>

                                          <div class="form-group col-10 m-0">
                                            <label class="m-0">E-Mail</label>
                                            <input
                                              v-model="frmCliente.cli_mail"
                                              type="text"
                                              name="cli_mail"
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              :class="{
                                                'is-invalid':
                                                  frmCliente.errors.has(
                                                    'cli_mail'
                                                  ),
                                              }"
                                            />
                                            <has-error
                                              :form="frmCliente"
                                              field="cli_mail"
                                            ></has-error>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-4 m-0 p-0">
                                        <!-- Columna 3 -->
                                        <div class="input-group m-0 p-0">
                                          <div class="form-group col-10 m-0">
                                            <label for="cli_sexo" class="m-0"
                                              >Sexo</label
                                            >
                                            <select
                                              name="cli_sexo"
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              v-model="frmCliente.cli_sexo"
                                            >
                                              <option
                                                v-for="sexo in sexoLista"
                                                v-bind:value="sexo.value"
                                                v-bind:key="sexo.value"
                                              >
                                                {{ sexo.text }}
                                              </option>
                                            </select>
                                          </div>

                                          <label
                                            for="cli_telefono"
                                            class="
                                              col-sm-3 col-form-label
                                              smallxs
                                            "
                                          >
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Datos Cabecera -->

                                    <!-- Datos Generales -->
                                    <span class="badge badge-primary"
                                      >Datos laborales</span
                                    >
                                    <div
                                      class="
                                        row
                                        border border-gray
                                        rounded
                                        p-2
                                        bg-light-grey
                                      "
                                    >
                                      <div class="col-4 m-0 p-0 pl-2">
                                        <div class="input-group m-0 p-0">
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0"
                                              >Direccion laboral:</label
                                            >
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_direccion_laboral"
                                            />
                                          </div>
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0"
                                              >Localidad de la empresa:</label
                                            >
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_localidad_laboral"
                                            />
                                          </div>
                                        </div>
                                      </div>

                                      <!-- {{-- Segunda columna --}} -->
                                      <div class="col-4 m-0 p-0">
                                        <div class="input-group m-0 p-0">
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0"
                                              >Nombre de la empresa:</label
                                            >
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_nombre_empresa_laboral"
                                            />
                                          </div>

                                          <div class="form-group col-10 m-0">
                                            <label class="m-0"
                                              >Encargado de pago:</label
                                            >
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_encargado_pago"
                                            />
                                          </div>
                                        </div>
                                      </div>
                                      <!-- {{-- Tercera columna --}} -->
                                      <div class="col-4 m-0 p-0">
                                        <div class="input-group m-0 p-0">
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0">Cargo:</label>
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_cargo_laboral"
                                            />
                                          </div>
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0">Telefono:</label>
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_telefono_laboral"
                                              v-model="frmCliente.cli_telefono1"
                                            />
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <span class="badge badge-primary"
                                      >Datos Personales</span
                                    >
                                    <div
                                      class="
                                        row
                                        border border-gray
                                        rounded
                                        p-2
                                        bg-light-grey
                                      "
                                    >
                                      <div class="col-4 m-0 p-0">
                                        <div class="input-group m-0 p-0">
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0"
                                              >Direccion:</label
                                            >
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_direccion_laboral"
                                            />
                                          </div>
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0"
                                              >Localidad:</label
                                            >
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_localidad"
                                            />
                                          </div>
                                        </div>
                                      </div>

                                      <!-- {{-- Segunda columna --}} -->
                                      <div class="col-4 m-0 p-0">
                                        <div class="input-group m-0 p-0">
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0">Telefono:</label>
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_telefono"
                                              v-model="frmCliente.cli_telefono2"
                                            />
                                          </div>

                                          <div class="form-group col-10 m-0">
                                            <label class="m-0"
                                              >Encargado de pago:</label
                                            >
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_direccion_laboral"
                                            />
                                          </div>
                                        </div>
                                      </div>

                                      <!-- {{-- Tercera columna --}} -->
                                      <div class="col-4 m-0 p-0">
                                        <div class="input-group m-0 p-0">
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0">Cargo:</label>
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_direccion_laboral"
                                            />
                                          </div>
                                          <div class="form-group col-10 m-0">
                                            <label class="m-0">Telefono:</label>
                                            <input
                                              class="
                                                form-control form-control-sm
                                                mb-1
                                              "
                                              type="text"
                                              name="cli_direccion_laboral"
                                            />
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Datos Generales -->
                                  </div>
                                  <!-- Datos Generales -->

                                  <!-- Actividades Cobranza -->
                                  <div
                                    class="tab-pane fade"
                                    id="tab-actividades-cobranza"
                                    role="tabpanel"
                                    aria-labelledby="tab-actividades-cobranza-tab"
                                  >
                                    <!-- Actividades Cobranza -->
                                    <div class="row">
                                      <div
                                        class="
                                          col-12
                                          d-flex
                                          justify-content-end
                                        "
                                      >
                                        <button
                                          type="button"
                                          class="btn btn-primary btn-sm"
                                          data-toggle="modal"
                                          data-target="#crearActividadCobranza"
                                        >
                                          Agregar Nuevo registro
                                        </button>
                                      </div>
                                    </div>
                                    <!-- Actividades Cobranza -->
                                  </div>
                                  <!-- Actividades Cobranza -->

                                  <!-- Documentos -->
                                  <div
                                    class="tab-pane fade"
                                    id="tab-documentos"
                                    role="tabpanel"
                                    aria-labelledby="tab-documentos-tab"
                                  >
                                    <!-- Documentos -->
                                    <div class="row">
                                      <div
                                        class="
                                          col-12
                                          d-flex
                                          justify-content-end
                                        "
                                      >
                                        <!-- </button> -->
                                        <input
                                          type="file"
                                          class="btn btn-primary btn-sm"
                                          name=""
                                          id="doc"
                                          ref="document"
                                          @change="select_file"
                                        />
                                      </div>
                                      <listaDocumentos
                                        :documentos="documentos"
                                      ></listaDocumentos>
                                    </div>
                                    <!-- Documentos -->
                                  </div>
                                  <!-- Documentos -->
                                  <div
                                    class="tab-pane fade"
                                    id="tab-mapa"
                                    role="tabpanel"
                                    aria-labelledby="tab-mapa-tab"
                                  >
                                    <!-- mapa -->
                                    <div id="map"></div>
                                    <!-- mapa -->
                                  </div>
                                </div>
                              </div>
                              <!-- /.card -->
                            </div>
                          </div>
                        </div>
                        <!-- Final de los tabs -->
                      </div>
                      <div class="card-footer">
                        <!-- Boton  -->
                        <button type="submit" class="btn btn-primary">
                          {{ SubmitDescripcion }}
                        </button>
                        <!-- <button v-else type="submit" class="btn btn-primary">
                          Actualizar
                        </button> -->
                        <!-- Boton  -->
                      </div>
                    </div>
                  </form>
                </div>
                <!-- ListaClientes -->
                <!-- RecuperaCliente: Es el evento que se dispara desde el componente hijo -->
                <!-- Y este a su vez ejecuta la funcion de recuperarCliente, teniendo como parametro  -->
                <!-- el cli_codigo, que no hace falta pasarlo directamente aca, pues lo que hacermos  -->
                <!-- no es la invocacion de la funcion, sino que la relacionamos para que  -->
                <!-- se ejecute cuando se dispare el evento "click" en el componente hijo -->
                <listaClientes
                  :clientes="clientes"
                  @RecuperaCliente="recuperarCliente"
                ></listaClientes>
                <!-- ListaClientes -->
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- ******************************************************************************* -->
      <!-- ******************************************************************************* -->
      <!-- {{-- Modal para crear un nuevo registro de actividades cobranza --}} -->
      <div
        class="modal fade"
        id="crearActividadCobranza"
        data-backdrop="static"
        role="dialog"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <!-- style="width: 800px" -->
            <form @submit.prevent="createClienteActividad">
              <!-- @csrf -->
              <div class="modal-header bg-info">
                <h4 class="modal-title">Crear Nuevo Registro</h4>
                <button type="button" class="close" data-dismiss="modal">
                  &times;
                </button>
              </div>
              <div class="modal-body">
                <!-- {{-- Contenido del modal --}} -->
                <div class="row">
                  <div class="col-6">
                    <!-- {{-- Deuda Gs --}} -->
                    <div class="form-group row">
                      <label for="DeudaGs" class="col-sm-4 col-form-label"
                        >Total Deuda Gs.</label
                      >
                      <div class="col-sm-8">
                        <input
                          type="text"
                          disabled
                          class="form-control form-control-sm col-6"
                          id="DeudaGs"
                          value=""
                        />
                      </div>
                    </div>
                  </div>

                  <div class="col-6">
                    <!-- {{-- Deuda USD --}} -->
                    <div class="form-group row">
                      <label for="DeudaUSD" class="col-sm-4 col-form-label"
                        >Total Deuda USD.</label
                      >
                      <div class="col-sm-8">
                        <input
                          type="text"
                          disabled
                          class="form-control form-control-sm col-6"
                          id="DeudaUSD"
                          value=""
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <!-- {{-- Fila 2 --}} -->
                <div class="row">
                  <div class="col-6">
                    <!-- {{-- Cliente --}} -->
                    <div class="form-group row">
                      <label for="cliCobranza" class="col-sm-4 col-form-label"
                        >Cliente</label
                      >
                      <!-- cli_codigo -->
                      <div class="col-sm-8">
                        <input
                          type="text"
                          disabled
                          class="form-control form-control-sm col-6"
                          id="cliCobranza"
                          v-model="frmClienteActividad.cli_codigo"
                        />
                      </div>
                    </div>
                    <!-- {{-- Tipo --}} -->
                    <div class="form-group row">
                      <label
                        for="selectTipoCobranza"
                        class="col-sm-4 col-form-label"
                        >Tipo</label
                      >
                      <div class="col-sm-8">
                        <select
                          id="selectTipoCobranza"
                          class="form-control form-control-sm"
                          name=""
                          v-model="frmClienteActividad.cli_act_tipo"
                        >
                          <option value="1">Telefonico</option>
                          <option value="2">Correo Electronico</option>
                          <option value="3">Otro</option>
                          <option
                            v-for="tcon in tipoContacto"
                            v-bind:value="tcon.value"
                            v-bind:key="tcon.value"
                          >
                            {{ tcon.text }}
                          </option>
                        </select>
                      </div>
                    </div>

                    <!-- {{-- Empleado--}} -->

                    <div class="form-group row">
                      <label
                        for="selectEmpleado"
                        class="col-sm-4 col-form-label"
                        >Empleado</label
                      >
                      <div class="col-sm-8">
                        <select
                          id="selectEmpleado"
                          class="form-control form-control-sm"
                          name=""
                          v-model="frmCliente.fun_codigo"
                        >
                          <option
                            v-for="funcionario in funcionarios"
                            v-bind:value="funcionario.value"
                            v-bind:key="funcionario.value"
                          >
                            {{ funcionario.text }}
                          </option>
                        </select>
                      </div>
                    </div>

                    <!-- {{-- Fecha Contacto --}} -->
                    <div class="form-group row">
                      <label for="fechaContacto" class="col-sm-4 col-form-label"
                        >Fecha Contacto</label
                      >
                      <div class="col-sm-8">
                        <input
                          type="datetime-local"
                          class="form-control form-control-sm"
                          id="fechaContacto"
                          v-model="frmClienteActividad.cli_act_fecha_inicio"
                        />
                      </div>
                    </div>

                    <!-- {{-- Fecha Proximo Contacto --}} -->
                    <div class="form-group row">
                      <label for="proxContacto" class="col-sm-4 col-form-label"
                        >Prox. Contacto</label
                      >
                      <div class="col-sm-8">
                        <input
                          type="datetime-local"
                          class="form-control form-control-sm"
                          id="proxContacto"
                          v-model="frmClienteActividad.cli_act_fecha_fin"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <!-- {{-- Sigla seguimiento --}} -->
                    <div class="form-group row">
                      <label
                        for="SiglaSeguimiento"
                        class="col-sm-4 col-form-label"
                        >Sig. Seguimiento</label
                      >
                      <div class="col-sm-8">
                        <select
                          id="SiglaSeguimiento"
                          class="form-control form-control-sm"
                          name=""
                          v-model="frmClienteActividad.cli_act_siglas_segui"
                        >
                          <option value="1">Volver a Llamar</option>
                          <option value="2">Correo Electronico</option>
                          <option value="3">Otro</option>
                        </select>
                      </div>
                    </div>

                    <!-- {{-- Monto a Pagar --}} -->
                    <div class="form-group row">
                      <label for="MontoPagar" class="col-sm-4 col-form-label"
                        >Monto a Pagar</label
                      >
                      <div class="col-sm-8">
                        <input
                          class="form-control form-control-sm"
                          type="text"
                          name=""
                          id="MontoPagar"
                          v-model="frmClienteActividad.cli_act_monto_pago"
                        />
                      </div>
                    </div>

                    <!-- {{-- Comentario --}} -->
                    <div class="form-group row">
                      <label for="Comentario" class="col-sm-4 col-form-label"
                        >Comentario</label
                      >
                      <div class="col-sm-8">
                        <textarea
                          class="form-control form-control-sm"
                          id="Comentario"
                          rows="3"
                          v-model="frmClienteActividad.cli_act_comentario"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- {{-- Contenido del modal fin --}} -->
              </div>
              <div class="modal-footer d-flex justify-content-between">
                <div>
                  <button
                    type="button"
                    class="btn btn-danger btn-sm"
                    data-dismiss="modal"
                  >
                    Cerrar
                  </button>
                </div>
                <div>
                  <button type="submit" class="btn btn-primary btn-sm">
                    Guardar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- {{-- Modal para crear un nuevo registro de actividades cobranza --}} -->
    </div>
  </section>
</template>

<script>
import listaClientes from "./lista/listaClientes.vue";
import listaDocumentos from "./lista/listaDocumentos.vue";
import tab2TabsDatos from "./tabs/tab2-tabs-datos.vue";
import { API_KEY } from "../../API_KEY";
import { Loader, LoaderOptions } from "google-maps";

const loader = new Loader(API_KEY);

export default {
  components: {
    listaClientes,
    listaDocumentos,
    tab2TabsDatos,
  },
  data() {
    return {
      /*VARIABLES PARA PASAR DATOS ENTRE COMPONENTES */
      listaCliCodigo: 0,
      SubmitDescripcion: "Crear", //Esto nos servira para cambiar la descripcion del boton submit
      //para que al recuperar un cliente se cambie a "Actualizar"
      /*VARIABLES PARA PASAR DATOS ENTRE COMPONENTES */
      clientes: {},
      actividades: {},
      // clientesContactos: {},
      // cli_sexo: '',
      sexoLista: [
        { text: "Masculino", value: "1" },
        { text: "Femenino", value: "2" },
      ],
      funcionarios: [
        { text: "Super Administrador", value: "7" },
        { text: "usuario1", value: "1" },
      ],
      tipoContacto: [
        { text: "Telefonico", vlaue: 1 },
        { text: "Correo Electronico", vlaue: 2 },
        { text: "WhatsApp", vlaue: 3 },
        { text: "Otro", value: 4 },
      ],
      documento: null, //Esto es para almacenar un documento
      documentos: [], //Esto es para recuperar los documentos asociados a un cliente
      frmCliente: new Form({
        cli_codigo: "",
        cli_nombres: "",
        cli_apellidos: "",
        cli_ruc: "",
        cli_direccion: "",
        cli_telefono1: "",
        cli_telefono2: "",
        cli_mail: "",
        cli_obs: "",
        cli_sexo: "",
      }),
      frmClienteActividad: new Form({
        cli_act_codigo: "",
        cli_codigo: "",
        tcon_codigo: "",
        cli_act_fecha_operacion: "",
        cli_act_fecha_inicio: "",
        cli_act_hora_inicio: "",
        cli_act_fecha_fin: "",
        cli_act_hora_fin: "",
        cli_act_comentario: "",
        cli_act_estado: "",
        cli_act_codigo_ref: "",
        fun_codigo: "",
        cli_act_siglas_segui: "",
        cli_act_monto_pago: "",
      }),
    };
  },
  methods: {
    loadClientes() {
      //Aca se recibe los datos que envias como respuesta desde laravel
      // if(this.$gate.isAdmin()){
      axios.get("api/clientes").then(({ data }) => (this.clientes = data.data));
      // }
    },
    createCliente() {
      this.$Progress.start();

      this.frmCliente
        .post("api/clientes")
        .then((data) => {
          $("#addNew").modal("hide");

          Toast.fire({
            icon: "success",
            title: data.data.message,
          });
          this.$Progress.finish();
          this.loadClientes();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Algo ha salido mal! Por favor, intentelo de nuevo",
          });
        });
    },
    updateCliente() {
      this.$Progress.start();

      console.log(this.frmCliente.cli_codigo);

      // con el put en nuestro caso le enviamos el parametro en la URL (la clave primaria)
      // y eso se ve en el controller

      this.frmCliente
        .put("api/clientes/" + this.frmCliente.cli_codigo)
        .then((data) => {
          // $("#addNew").modal("hide");

          Toast.fire({
            icon: "success",
            title: data.data.message,
          });
          this.$Progress.finish();
          this.loadClientes();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Algo ha salido mal! Por favor, intentelo de nuevo",
          });
        });
    },
    createClienteActividad() {
      this.$Progress.start();

      this.frmClienteActividad
        .post("api/clientesactividades")
        .then((data) => {
          $("#crearActividadCobranza").modal("hide");

          Toast.fire({
            icon: "success",
            title: data.data.message,
          });
          this.$Progress.finish();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Algo ha salido mal!",
          });
        });
    },
    alerta(cli_codigo) {
      alert("click " + cli_codigo);
      console.log(this.$refs);
    },
    recuperarCliente(cli_codigo) {
      axios
        .get("api/cliente/" + cli_codigo)
        .then(({ data }) => {
          // console.log(data.data);
          this.frmCliente.cli_codigo = data.data.cli_codigo;
          this.frmCliente.cli_nombres = data.data.cli_nombres;
          this.frmCliente.cli_apellidos = data.data.cli_apellidos;
          this.frmCliente.cli_ruc = data.data.cli_ruc;
          this.frmCliente.cli_mail = data.data.cli_mail;
          this.frmCliente.cli_direccion = data.data.cli_direccion;
          this.frmCliente.cli_telefono1 = data.data.cli_telefono1;
          this.frmCliente.cli_telefono2 = data.data.cli_telefono2;
          // console.log(this.frmCliente.cli_codigo);
          this.frmClienteActividad.cli_codigo = data.data.cli_codigo;

          this.SubmitDescripcion = "Actualizar";

          this.RecuperaDocumentosCliente(data.data.cli_codigo);
        })
        .catch((error) => {
          console.log("Error en recuperarCliente!");
          // return Promise.reject(error);
        });
    },
    select_file(event) {
      if (this.frmCliente.cli_codigo != "") {
        this.documento = null;
        this.documento = event.target.files[0];
        // console.log(this.documento);
        //Creamos un nuevo formData para pasar de manera correcta los archivos
        //Es lo mismo que usar un <form method="encrypt-FormData"></form>
        let archivo = new FormData();
        archivo.append("cli_documento", this.documento);
        archivo.append("cli_codigo", this.frmCliente.cli_codigo);
        // console.log(archivo);

        this.$Progress.start();
        axios
          .post("api/documentosclientes", archivo)
          .then((data) => {
            Toast.fire({
              icon: "success",
              title: data.data.message,
            });
          })
          .catch((e) => {
            Toast.fire({
              icon: "error",
              title: "Algo ha salido mal!",
            });
            console.log(e.message);
            console.log("Error en select_file!");
          });
        this.$Progress.finish();
      } else {
        Toast.fire({
          icon: "error",
          title: "No se ha seleccionado ningun cliente!",
        });
      }
    },
    loadMapa() {
      // loader.load().then(function (google) {
      //   // Regular Map
      //   const myLatlng = new google.maps.LatLng(40.748817, -73.985428);
      //   const mapOptions = {
      //     zoom: 13,
      //     center: myLatlng,
      //     scrollwheel: false, // we disable de scroll over the map, it is a really annoing when you scroll through page
      //     disableDefaultUI: true, // a way to quickly hide all controls
      //     zoomControl: true,
      //     styles: [
      //       {
      //         featureType: "water",
      //         stylers: [
      //           { saturation: 43 },
      //           { lightness: -11 },
      //           { hue: "#0088ff" },
      //         ],
      //       },
      //       {
      //         featureType: "road",
      //         elementType: "geometry.fill",
      //         stylers: [
      //           { hue: "#ff0000" },
      //           { saturation: -100 },
      //           { lightness: 99 },
      //         ],
      //       },
      //       {
      //         featureType: "road",
      //         elementType: "geometry.stroke",
      //         stylers: [{ color: "#808080" }, { lightness: 54 }],
      //       },
      //       {
      //         featureType: "landscape.man_made",
      //         elementType: "geometry.fill",
      //         stylers: [{ color: "#ece2d9" }],
      //       },
      //       {
      //         featureType: "poi.park",
      //         elementType: "geometry.fill",
      //         stylers: [{ color: "#ccdca1" }],
      //       },
      //       {
      //         featureType: "road",
      //         elementType: "labels.text.fill",
      //         stylers: [{ color: "#767676" }],
      //       },
      //       {
      //         featureType: "road",
      //         elementType: "labels.text.stroke",
      //         stylers: [{ color: "#ffffff" }],
      //       },
      //       { featureType: "poi", stylers: [{ visibility: "off" }] },
      //       {
      //         featureType: "landscape.natural",
      //         elementType: "geometry.fill",
      //         stylers: [{ visibility: "on" }, { color: "#b8cb93" }],
      //       },
      //       { featureType: "poi.park", stylers: [{ visibility: "on" }] },
      //       {
      //         featureType: "poi.sports_complex",
      //         stylers: [{ visibility: "on" }],
      //       },
      //       { featureType: "poi.medical", stylers: [{ visibility: "on" }] },
      //       {
      //         featureType: "poi.business",
      //         stylers: [{ visibility: "simplified" }],
      //       },
      //     ],
      //   };
      //   const map = new google.maps.Map(
      //     document.getElementById("map"),
      //     mapOptions
      //   );
      //   const marker = new google.maps.Marker({
      //     position: myLatlng,
      //     title: "Regular Map!",
      //   });
      //   marker.setMap(map);
      // });
    },
    RecuperaDocumentosCliente(cli_codigo) {
      axios
        .get("api/documentosclientes/" + cli_codigo)
        .then(({ data }) => {
          // console.log(data.data);
          if (data) {
            this.documentos = data.data;
            console.log(this.documentos);
          } else {
            console.log("sin Documentos");
          }
        })
        .catch((error) => {
          console.log("Error en recuperaDocumentosCliente!");
          // return Promise.reject(error);
        });
    },
  },
  mounted() {
    // this.loadMapa();
  },
  created() {
    this.$Progress.start();

    this.loadClientes();

    this.$Progress.finish();
  },
};
</script>

<style>
#map {
  height: calc(100vh - 70px);
  margin-top: 70px;
}
</style>