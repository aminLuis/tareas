<template>
    
    <div>

        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-nueva">Nueva</button>
        <br><br>
      
        <table class="table">

            <thead>

                <tr>
                    <th>Descripción actividad</th>
                    <th>User</th>
                    <th>Acción</th>
                </tr>

            </thead>

            <tbody>

                <tr v-for="actividad in actividades" :key="actividad.id">
                    <td v-text="actividad.descripcion"></td>
                    <td v-text="usuario"></td>
                    <td>
                        <button @click="cargar_datos(actividad)" class="btn btn-warning" data-toggle="modal" data-target="#modal-editar">Editar</button>
                        <button @click="delete_actividad(actividad.id)" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>

            </tbody>

        </table>

        <!-- Inicio modal nueva -->

            <div class="modal fade" id="modal-nueva" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Nueva actividad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form @submit.prevent="save_actividad">

                            <div class="row">

                                <div class="col">
                                    <label for="">Descripción actividad</label>
                                    <input v-model="array_actividad.descripcion" type="text" class="form-control" required>
                                </div>
                                
                            </div>

                            <br>
                            <button class="btn btn-success">Guardar</button>

                        </form>

                    </div>
                    
                    </div>
              </div>
          </div>

        <!-- Final modal nueva -->


        <!-- Inicio modal editar -->

            <div class="modal fade" id="modal-editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalLabel">Editar actividad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form @submit.prevent="update_actividad">

                            <div class="row">

                                <div class="col">
                                    <label for="">Descripción actividad</label>
                                    <input v-model="array_editar.descripcion" type="text" class="form-control" required>
                                </div>
                                
                            </div>

                            <br>
                            <button class="btn btn-success">Guardar cambios</button>

                        </form>

                    </div>
                    
                    </div>
                </div>
            </div>

        <!-- Final modal editar -->


    </div>

</template>

<script>

let user = document.head.querySelector('meta[name="user"]');
let id = JSON.parse(user.content).id;
let Usuario = JSON.parse(user.content).name;

export default {
    data(){
        return{
            array_actividad:{
                'id_user':'',
                'descripcion':''
            },
            actividades:[],
            usuario:Usuario,
            array_editar:{
                'id':'',
                'descripcion':''
            },
            idEditar:''
        };
    },

    methods: {

        async save_actividad(){
            this.array_actividad.id_user = id;
            await axios.post('actividad/save',this.array_actividad).then((result) => {
                 alert('Actividad registrada');
                 this.listar_actividades();
                 this.limpiar_campos();
            }).catch((error) => {
                console.log(error);
          });
        },


        async update_actividad(){
            await axios.put('actividad/update/'+this.array_editar.id,this.array_editar).then((result) => {
                alert('Actividad actualizada');
                this.listar_actividades();
            }).catch((error) => {
                console.log(error);
          });
      
        },

        async delete_actividad(id){

            const op = confirm('¿Desea eliminar el registro?');

            if(op){
                
                await axios.delete('actividad/delete/'+id).then((response)=>{
                    alert('Se ha eliminado el registro');
                    this.listar_actividades();
                }).catch((error)=>{
                    console.log(error);
                })

            }
      
        },

        async listar_actividades(){
          await axios.get('actividad/list/'+id).then((response) => {
                this.actividades = response.data;
          }).catch((error) => {
                console.log(error);
          });
        },

        limpiar_campos: function(){
            this.array_actividad = {
                'id_user':'',
                'descripcion':''
            }
        },

        cargar_datos: function(actividad){
           this.array_editar = {
               'id':actividad.id,
               'descripcion':actividad.descripcion
           }
            this.idEditar = actividad.id;
        }
       
    },

    created() {
     this.listar_actividades();
     },
}
</script>