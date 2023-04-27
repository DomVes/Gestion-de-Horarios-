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
                    <input type="hidden" id="ID_grupo" name="ID_grupo">

                    <div class="form-group">
                        <label class="form-label" for="codigo">Código</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese Codigo de grupo" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="numero_de_grupo">Número de grupo</label>
                        <input type="text" class="form-control" id="numero_de_grupo" name="numero_de_grupo" placeholder="Ingrese Número de Grupo" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="cantidad_de_estudiantes">Cantidad de estudiantes</label>
                        <input type="number" class="form-control" id="cantidad_de_estudiantes" name="cantidad_de_estudiantes" placeholder="Ingrese Cantidad de Estudiantes" required>
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