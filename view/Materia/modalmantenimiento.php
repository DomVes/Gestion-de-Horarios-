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
                    <input type="hidden" id="ID_materia" name="ID_materia">
                    <div class="form-group">
                        <label class="form-label" for="id_grupo">Codigo del grupo</label>
                        <select type="select2" class="form-control" id="id_grupo" name="id_grupo" placeholder="Seleccionar" required></select>
                    </div> 
                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre" required>
                    </div>                     
                    <div class="form-group">
                        <label class="form-label" for="docente_id">Docente</label>
                        <select type="select2" class="form-control" id="docente_id" placeholder="Seleccionar" name="docente_id"required>
                        </select>
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