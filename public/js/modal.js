$("*[data-close-modal]").click(function () {
  /*Basic Cloase Modal*/ const btnClose =
    "#" + $(this).attr("data-close-modal");
  $(btnClose + "-target").slideUp(function () {
    $(btnClose).removeClass("flex");
    $(btnClose).addClass("hidden");
    $("body").removeClass("overflow-hidden");
  });
});
$("*[data-open-modal]").click(function () {
  $("#" + $(this).attr("data-open-modal")).removeClass("hidden");
  $("#" + $(this).attr("data-open-modal")).addClass("flex");
  $("body").addClass("overflow-hidden");
  $("#" + $(this).attr("data-open-modal") + "-target").slideDown();
});
$("*[data-form]").click(function () {
  let valor = $(this).attr("data-open-modal") + "-target";
  let id = $(this).attr("data-form");
  $("#" + valor).attr("action", "http://localhost/" + id);
});
