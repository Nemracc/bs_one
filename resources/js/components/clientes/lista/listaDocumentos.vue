<template>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Cliente</th>
          <th>Ruta del archivo</th>
          <th>Nombre del archivo</th>
          <th>Creado el</th>
         
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="documento in documentos.data"
          :key="documento.doc_codigo"
          v-on:click="RecuperaCliCodigo(documento.cli_codigo)"
          style="cursor: pointer"
        >
          <td ref="cli_codigo">{{ documento.doc_codigo }}</td>
          <td>{{ documento.cli_codigo }}</td>
          <td>{{ documento.doc_path }}</td>
          <td>{{ documento.doc_nombre_original }}</td>
          <td>{{ documento.created_at }}</td>
          
        </tr>
      </tbody>
    </table>
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
    "documentos",
    // {
    //     recuperarCliente: Function,
    // },
  ],
  methods: {
    //   RecuperaCliCodigo(cli_codigo){
    //     // console.log(cli_codigo);
    //     //RecuperaCliente es el metodo que vamos a disparar en el componente padre
    //     //al dar click en este componente hijo
    //     this.$emit('RecuperaCliente', cli_codigo);
    //   }
  },
};
</script>