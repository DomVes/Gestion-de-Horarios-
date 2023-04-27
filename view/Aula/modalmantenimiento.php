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
                    <input type="hidden" id="ID_aula" name="ID_aula">

                    <div class="form-group">
                        <label class="form-label" for="bloque">Bloque</label>
                        <input type="text" class="form-control" id="bloque" name="bloque" placeholder="Ingrese Bloque" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="numero_de_aula">Número</label>
                        <input type="number" class="form-control" id="numero_de_aula" name="numero_de_aula" placeholder="Ingrese Numero de Aula" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese Descripcion de Aula" required>
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