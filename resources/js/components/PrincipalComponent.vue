<template>
    
    <div>

    <div class="row">

        <div class="col-2">
            
            <div class="sidebar">
                <div class="opciones">
                    <a type="button" @click="changes('Actividad')" class="btn btn-success top">Actividad</a>
                    <br>
                    <a type="button" @click="changes('Tiempo')" class="btn btn-success top">Tiempo</a>
                </div>
            </div>

        </div>

        <div class="col">
            <component v-bind:is="current"></component>
        </div>

    </div>

    </div>

</template>

<script>

import tiempo from './TiempoComponent.vue';
import actividad from './ActividadComponent.vue';

export default {

    data(){
        return{
            current:null
        }
    },

    components:{
        Tiempo: tiempo,
        Actividad: actividad
    },

    methods: {
        
        changes: function(value){
            this.current = value;
        }

    },
    
}
</script>

<style>

.sidebar{
    width: 98%;
    height: 300px;
    background: rgb(183, 183, 236);
}

.opciones{
    padding: 20px;
}

.top{
    margin-top: 10px;
    width: 90%;
}

</style>