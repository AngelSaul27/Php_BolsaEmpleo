$(window).on("load", function () {
  setTimeout(function () {
    $(".loader-page").css({ visibility: "hidden", opacity: "0" });
  }, 100);
});
/* Cuando el usuario hace clic en el botón 
alternar entre ocultar y mostrar el contenido del desplegable  */
$("*[data-dropdown]").on("click", function (e) {
  e.preventDefault();
  $("#" + $(this).data("dropdown")).toggleClass("visible");
});
//Cerrar el desplegable si el usuario hace clic fuera de él
window.addEventListener("click", function (e) {
  $("*[data-dropdown]").map(function () {
    let id = this.id;
    let container = $(this).data("dropdown");
    if (!document.getElementById(id).contains(e.target)) {
      $("#" + container).removeClass("visible");
    }
  });
});
/* Function hidden mensajeCollapse */
$(document).ready(function () {
  function mensajeCollapse() {
    /*ERROR FOR SERVER*/
    if ($("#errorsSession").length > 0) {
      setTimeout(function () {
        $("#errorsSession").fadeOut(1500);
        setTimeout(function () {
          $("#errorsSession").remove();
        }, 1700);
      }, 3000);
    }
    /*ERROR FOR RESPONSE JSON*/
    if ($("#dinamycMessage").length > 0) {
      setTimeout(function () {
        $("#dinamycMessage").fadeOut(800);
        setTimeout(function () {
          $("#dinamycMessage").remove();
        }, 900);
      }, 700);
    }
  }
  setInterval(mensajeCollapse, 500);
});
