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

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
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
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
              </div>
          </div>

        <!-- Final modal nueva -->

    </div>

</template>