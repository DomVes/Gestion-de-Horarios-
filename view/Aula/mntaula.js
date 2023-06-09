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
    url: "../../controller/aula.php?op=guardaryeditar",
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
        url: "../../controller/aula.php?op=listar",
        type: "post",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      responsive: true,
      bInfo: true,
      iDisplayLength: 10,
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

/* TODO: Mostrar informacion segun ID en los inputs */
function editar(ID_aula) {
  $("#mdltitulo").html("Editar Registro");

  /* TODO: Mostrar Informacion en los inputs */
  $.post(
    "../../controller/aula.php?op=mostrar",
    { ID_aula: ID_aula },
    function (data) {
      data = JSON.parse(data);
      $("#ID_aula").val(data.ID_aula);
      $("#bloque").val(data.bloque);
      $("#numero_de_aula").val(data.numero_de_aula);
      $("#descripcion").val(data.descripcion);
    }
  );

  /* TODO: Mostrar Modal */
  $("#modalmantenimiento").modal("show");
}

/* TODO: Cambiar estado a eliminado en caso de confirmar mensaje */
function eliminar(ID_aula) {
  swal(
    {
      title: "HelpDesk",
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
          "../../controller/aula.php?op=eliminar",
          { ID_aula: ID_aula },
          function (data) {}
        );

        /* TODO: Recargar Datatable JS */
        $("#usuario_data").DataTable().ajax.reload();

        /* TODO: Mensaje de Confirmacion */
        swal({
          title: "HelpDesk!",
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
  $("#ID_aula").val("");
  $("#mdltitulo").html("Nuevo Registro");
  $("#usuario_form")[0].reset();
  /* TODO:Mostrar Modal */
  $("#modalmantenimiento").modal("show");
});

init();
