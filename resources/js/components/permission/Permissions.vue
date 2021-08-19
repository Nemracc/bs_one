<template>
  <section class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Permisos</h3>

                <div class="card-tools">

                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addNew">
                      <i class="fa fa-plus-square"></i>
                      Add New
                  </button>

                </div>

              </div>

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <!-- <th>Photo</th> -->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr v-for="permiso in permisos.data" :key="permiso.id">

                      <td>{{permiso.id}}</td>
                      <td>{{permiso.name}}</td>
                      <td>{{permiso.guard_name}}</td>
                      <td>
                        <a href="#" @click="editModal(permiso)"><i class="fa fa-edit blue"></i></a>
                        /
                        <a href="#" @click="deletePermission(permiso.id)"><i class="fa fa-trash red"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

                <!-- /.card-body -->
              <div class="card-footer">
                 <pagination :data="permisos" @pagination-change-page="getResults"></pagination>
              </div>

            </div>
            <!-- /.card -->
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNew" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form @submit.prevent="createPermission">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input v-model="form.name" type="text" name="name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input v-model="form.guard_name" type="text" name="guard_name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('guard_name') }">
                            <has-error :form="form" field="guard_name"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>

    </div>
  </section>
</template>

<script>
    export default {
        data () {
            return {
              permisos : {},
              // Create a new form instance
              form: new Form({
                  id : '',
                  name: '',
                  guard_name: '',
              })
            }
        },
        methods: {
            getResults(page = 1) {
                this.$Progress.start();
                axios.get('api/permission?page=' + page).then(({ data }) =>  (this.permisos = data.data));

                /*
                axios.get('api/permission?page=' + page).then(function (response) {
                        var respuesta = response.data;
                        //me.permisos = respuesta.permissions;
                        me.permisos = respuesta.data;
                })
                    .catch(function (error) {
                        if (error.message.indexOf('401')){
                            window.location.replace('/login');
                        }
                });
                */
                this.$Progress.finish();
            },

            loadPermissions(){

               let me=this;

                axios.get('api/permission')
                .then(function (data) {
                    this.permisos = data.data;
                })
                .catch( function (error){
                    if (error.message.indexOf('401')){
                        window.location.replace('/login');
                    }
                });

                /*
                axios.get("api/permission").then(function (response) {
                    var respuesta = response.data;
                    //me.permisos = respuesta.permissions;  //asi se ve en controller a la hora de la devolucion
                    me.permisos = respuesta.data;
                })
                .catch(function (error) {
                    //console.log(error);
                    // de esta forma si el usuario se desloguea o dejo mucho tiempo sin actividad
                    // le va redirigir al sistema de login
                    if (error.message.indexOf('401')){
                        window.location.replace('/login');
                    }
                });
                */
            },

            createPermission(){
              // mostramos la barra de progreso
              this.$Progress.start();

              // realizamos la peticion al metodo store, mediante el verbo post
              //this.form.post('api/permission/insertar')

              this.form.post('api/permission')
              .then((data)=>{
                  $('#addNew').modal('hide');

                  Toast.fire({
                        icon: 'success',
                        title: data.data.message
                    });

                  this.$Progress.finish();
                  this.loadPermissions();

              })
              .catch(()=>{

                  Toast.fire({
                      icon: 'error',
                      title: 'Some error occured! Please try again'
                  });
                })


             }


        },
        mounted() {
            //this.getResults();
        },
        created() {
            this.$Progress.start();

            this.loadPermissions();

            this.$Progress.finish();
        }
    }
</script>
