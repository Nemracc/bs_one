<template>
  <div
    class="tab-pane fade"
    id="tab-lista-clientes"
    role="tabpanel"
    aria-labelledby="tab-lista-clientes"
  >
    <div class="card-body table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Codigo</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>RUC</th>
            <th>Telefono</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="cliente in clientes.data"
            :key="cliente.id"
            v-on:click="RecuperaCliCodigo(cliente.cli_codigo)"
            style="cursor: pointer"
          >
            <td ref="cli_codigo">{{ cliente.cli_codigo }}</td>
            <td>{{ cliente.cli_nombres }}</td>
            <td>{{ cliente.cli_apellidos }}</td>
            <td>{{ cliente.cli_ruc }}</td>
            <td>{{ cliente.cli_telefono }}</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
    // data(){
    //     return {
            
    //     }
    // },
    // Al declarar la propiedad "Clientes", es como si fuera que declaramos que va a recibir un parametro
    // y este "parametro" es el que ya va a contener los datos que recuperamos en el componente padre
    props: [
        "clientes",
        // {
        //     recuperarCliente: Function,
        // },
    ],
    methods:{
      RecuperaCliCodigo(cli_codigo){
        // console.log(cli_codigo);
        //RecuperaCliente es el metodo que vamos a disparar en el componente padre
        //al dar click en este componente hijo
        this.$emit('RecuperaCliente', cli_codigo);
      }
    }
};
</script>