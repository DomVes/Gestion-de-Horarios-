<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" id="ID_horario" name="ID_horario">
                    <div class="form-group">
                        <label class="form-label" for="ID_aula">Aula</label>
                        <select type="select2" class="form-control" id="ID_aula" name="ID_aula" placeholder="Seleccionar" required></select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="ID_materia">Materia</label>
                        <select type="select2" class="form-control" id="ID_materia" name="ID_materia" placeholder="Seleccionar" required></select>
                    </div>   
                    <div class="form-group">
                        <label class="form-label" for="ID_grupo">Grupo</label>
                        <select type="select2" class="form-control" id="ID_grupo" name="ID_grupo" placeholder="Seleccionar" required></select>
                    </div>                     
                    <div class="form-group">
                        <label class="form-label" for="hora_inicio">Hora Inicio</label>
                        <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" placeholder="Ingrese la duración" required>
                    </div>                   
                    <div class="form-group">
                        <label class="form-label" for="hora_fin">Hora Fin</label>
                        <input type="time" class="form-control" id="hora_fin" name="hora_fin" placeholder="Ingrese la duración" required>
                    </div> 
                    <div class="form-group">
                        <label class="form-label" for="dia_de_la_semana">Dia de la semana</label>
                        <input type="text" class="form-control" id="dia_de_la_semana" name="dia_de_la_semana" placeholder="Ingrese la fecha" required>
                    </div>                                     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>