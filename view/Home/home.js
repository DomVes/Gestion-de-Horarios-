function init() {}

$(document).ready(function () {
  $.post("../../controller/evento.php?op=total", function (data) {
    data = JSON.parse(data);
    $("#lbltotaleventos").html(data.TOTAL);
  });
  $.post("../../controller/aula.php?op=total", function (data) {
    data = JSON.parse(data);
    $("#lbltotalaulas").html(data.TOTAL);
  });
  $.post("../../controller/materia.php?op=total", function (data) {
    data = JSON.parse(data);
    $("#lbltotalmaterias").html(data.TOTAL);
  });
  $.post("../../controller/usuario.php?op=total", function (data) {
    data = JSON.parse(data);
    $("#lbltotaldocentes").html(data.TOTAL);
  });
});

init();
