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
                    <input type="hidden" id="ID_evento" name="ID_evento">

                    <div class="form-group">
                        <label class="form-label" for="codigo">Código</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese el código" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Ingrese la fecha" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="duracion">Duración</label>
                        <input type="time" class="form-control" id="duracion" name="duracion" placeholder="Ingrese la duración" required>
                    </div> 
                    <div class="form-group">
                        <label class="form-label" for="objetivo">Objetivo</label>
                        <input type="text" class="form-control" id="objetivo" name="objetivo" placeholder="Ingrese el objetivo" required>
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