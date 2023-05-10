var tabla;

function init() {
  $("#usuario_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

/* TODO: Guardar datos de los input */
function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#usuario_form")[0]);
  $.ajax({
    url: "../../controller/materia.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      console.log(datos);
      $("#usuario_form")[0].reset();
      /* TODO:Ocultar Modal */
      $("#modalmantenimiento").modal("hide");
      $("#usuario_data").DataTable().ajax.reload();

      /* TODO:Mensaje de Confirmacion */
      swal({
        title: "HelpDesk!",
        text: "Completado.",
        type: "success",
        confirmButtonClass: "btn-success",
      });
    },
  });
}

$(document).ready(function () {
  // Llenar combo usuarios
  cargarSelect("../../controller/usuario.php?op=combo", "#docente_id");
  // Llenar combo grupos
  cargarSelect("../../controller/grupo.php?op=combo", "#id_grupo");
  // Llenar combo Aulas
  cargarSelect("../../controller/aula.php?op=combo", "#aula_id");

  /* TODO: Mostrar listado de registros */
  tabla = $("#usuario_data")
    .dataTable({
      aProcessing: true,
      aServerSide: true,
      dom: "Bfrtip",
      searching: true,
      lengthChange: false,
      colReorder: true,
      buttons: [],
      ajax: {
        url: "../../controller/materia.php?op=listar",
        type: "post",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      responsive: true,
      bInfo: true,
      iDisplayLength: 5,
      autoWidth: false,
      language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
        oAria: {
          sSortAscending:
            ": Activar para ordenar la columna de manera ascendente",
          sSortDescending:
            ": Activar para ordenar la columna de manera descendente",
        },
      },
    })
    .DataTable();
});
function cargarSelect(url, selector) {
  $.post(url, function (data, status) {
    $(selector).html(data);
  });
}
/* TODO: Mostrar informacion segun ID en los inputs */
function editar(ID_materia) {
  $("#mdltitulo").html("Editar Registro");

  /* TODO: Mostrar Informacion en los inputs */
  $.post(
    "../../controller/materia.php?op=mostrar",
    { ID_materia: ID_materia },
    function (data) {
      data = JSON.parse(data);
      $("#ID_materia").val(data.ID_materia);
      $("#id_grupo").val(data.id_grupo);
      $("#nombre").val(data.nombre);
      $("#aula_id").val(data.aula_id);
      $("#docente_id").val(data.docente_id);
    }
  );

  /* TODO: Mostrar Modal */
  $("#modalmantenimiento").modal("show");
}

/* TODO: Cambiar estado a eliminado en caso de confirmar mensaje */
function eliminar(ID_materia) {
  swal(
    {
      title: "Confirmar!",
      text: "Esta seguro de Eliminar el registro?",
      type: "error",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Si",
      cancelButtonText: "No",
      closeOnConfirm: false,
    },
    function (isConfirm) {
      if (isConfirm) {
        $.post(
          "../../controller/materia.php?op=eliminar",
          { ID_materia: ID_materia },
          function (data) {}
        );

        /* TODO: Recargar Datatable JS */
        $("#usuario_data").DataTable().ajax.reload();

        /* TODO: Mensaje de Confirmacion */
        swal({
          title: "Listo!",
          text: "Registro Eliminado.",
          type: "success",
          confirmButtonClass: "btn-success",
        });
      }
    }
  );
}
/* TODO: Limpiar Inputs */
$(document).on("click", "#btnnuevo", function () {
  $("#ID_materia").val("");
  $("#mdltitulo").html("Nuevo Registro");
  $("#usuario_form")[0].reset();
  /* TODO:Mostrar Modal */
  $("#modalmantenimiento").modal("show");
});

init();
