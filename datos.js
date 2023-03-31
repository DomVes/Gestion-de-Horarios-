function init(){
}

$(document).ready(function() {

});

/* TODO: Script para poder modificar segun el valor de acceso soporte o usuario */
$(document).on("click", "#btnsoporte", function () {
    if ($('#rol_id').val()==1){
        $('#lbltitulo').html("Acceso Docente");
        $('#btnsoporte').html("Acceso Grupo");
        $('#rol_id').val(2);
        $("#imgtipo").attr("src","public/2.jpg");
    }else{
        $('#lbltitulo').html("Acceso Grupo");
        $('#btnsoporte').html("Acceso Docente");
        $('#rol_id').val(1);
        $("#imgtipo").attr("src","public/1.jpg");
    }
});

init();