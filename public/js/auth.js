/********************************************/
/*      FUNCION DE CAMBIO DE PANELES        */
/********************************************/
var Step;
$(".btn_next_step").on("click", function (e) {
  Step = parseInt(e.currentTarget.parentNode.id.slice(4)) + 1;
  $("#Step" + Step).removeClass("hidden");
  $("#Step" + (Step - 1)).addClass("hidden");
  if ($("#Btn_redirect").is(":visible")) {
    $("#Btn_redirect").addClass("hidden");
  }
});

