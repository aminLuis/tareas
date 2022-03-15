<template>
    
    <div>
        
        <ul class="list-group">
      
          <li class="list-group-item" v-for="actividad in actividades" :key="actividad.id">

              <div class="card">
                <h5 class="card-header" v-text="usuario"></h5>
                <div class="card-body">
                    <h5 class="card-title" v-text="actividad.descripcion">}</h5>
              
                    <a type="button" @click="cargar_id_actividad(actividad.id)" class="btn btn-primary" data-toggle="modal" data-target="#modal-nuevo">Asignar tiempo</a>
                    <a type="button" @click="listar_tiempos(actividad.id); cargar_id_actividad(actividad.id)" class="btn btn-success" data-toggle="modal" data-target="#modal-listar">Ver tiempos</a>
        
                </div>
              </div>

          </li>
      
        </ul>

        <!-- Inicio modal nuevo -->

            <div class="modal fade" id="modal-nuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Asignar tiempo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form @submit.prevent="save_tiempo">

                            <div class="row">
                              
                                <div class="col">
                                    <label for="">Fecha</label>
                                    <input v-model="array_tiempo.fecha" type="date" class="form-control" required>
                                </div>

                            </div>

                            <div class="row">
                              
                                <div class="col">
                                    <label for="">Horas</label>
                                    <input v-model="array_tiempo.horas" type="number" class="form-control" required>
                                </div>

                            </div>

                            <br>
                            <button class="btn btn-success">Guardar</button>
                        </form>

                    </div>
                    
                    </div>
                </div>
            </div>

        <!-- Final modal nuevo -->



        <!-- Inicio modal listar tiempos -->

            <div class="modal fade" id="modal-listar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Tiempos registrados</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <ul class="list-group">
                            <li class="list-group-item" v-for="tiempo in tiempos" :key="tiempo.id">
                                <h6>Fecha:</h6>{{tiempo.fecha}}
                                <h6>Horas:</h6>{{tiempo.horas}}
                                
                                <button @click="delete_tiempo(tiempo.id)" class="btn btn-danger" style="float: right">Eliminar</button>
                            </li>
                        </ul>

                    </div>
                    
                    </div>
                </div>
            </div>

        <!-- Final modal listar tiempos -->


    </div>

</template>

<script>

let user = document.head.querySelector('meta[name="user"]');
let id = JSON.parse(user.content).id;
let Usuario = JSON.parse(user.content).name;

export default {
    
    data(){
        return{
            actividades:[],
            usuario:Usuario,
            array_tiempo:{
                'id_actividad':'',
                'fecha':'',
                'horas':''
            },
            tiempos:[],
            suma:[],
            idActividad:'',
            total:0
        }
    },

    methods:{

        async listar_actividades(){
          await axios.get('actividad/list/'+id).then((response) => {
                this.actividades = response.data;
          }).catch((error) => {
                console.log(error);
          });
        },

        async save_tiempo(){

            if(this.array_tiempo.horas>8){
                alert('La actividad no puede exceder las 8 horas');
            }else{

                 this.array_tiempo.id_actividad = this.idActividad;
                 await axios.post('tiempo/save',this.array_tiempo).then((result) => {
                 alert('Tiempo registrada');
                 
                 this.limpiar_campos();
                }).catch((error) => {
                        console.log(error);
                });

            }

           
        },

        async delete_tiempo(id){

            const op = confirm('¿Desea eliminar el registro?');

            if(op){
                
                await axios.delete('tiempo/delete/'+id).then((response)=>{
                    alert('Se ha eliminado el registro');
                    this.listar_tiempos(this.idActividad);
                }).catch((error)=>{
                    console.log(error);
                })

            }
      
        },

        limpiar_campos: function(){
            this.array_tiempo = {
                'id_actividad':'',
                'fecha':'',
                'horas':''
            }
        },

        async listar_tiempos(id){
          await axios.get('tiempo/list/'+id).then((response) => {
                this.tiempos = response.data;
          }).catch((error) => {
                console.log(error);
          });
        },

        cargar_id_actividad: function(id){
            this.idActividad = id;
        }


    },

    created(){
        this.listar_actividades();
    }

}
</script>