/********************************************/
/*         AJAX CARGA RESULTADOS            */
/********************************************/
$("#Pais_Select").on("change", function (e) {
  $("#Estado_Select").removeAttr("disabled");
  var id = $("#Pais_Select option:selected").val();
  var url = "http://localhost/request/estado/" + id;
  $.ajax({
    type: "POST",
    url: url,
    dataType: "json",
    success: function (json) {
      let valores = Object.values(json);
      $("#Estado_Select option").remove();

      for (let i = 0; i < valores.length; i++) {
        let id, estado;
        id = estado = valores[i];
        id = id["id"];
        estado = estado["Estado"];
        let html = "<option value=" + id + ">" + estado + "</option>";
        $("#Estado_Select").prepend(html);
      }

      if (Object.entries(json).length === 0) {
        let html = "<option value='null' select>Sin resultados</option>";
        $("#Estado_Select").prepend(html);
      }

      if (Object.entries(json).length > 0) {
        let html =
          "<option value='null' class='hidden' selected>Seleccione su Estado</option>";
        $("#Estado_Select").append(html);
      }
    },
    error: function (error) {
      alert("Ocurrio un error: " + error.message);
    },
  });
});

$("#Estado_Select").on("change", function (e) {
  var id = $("#Estado_Select option:selected").val();
  var url = "http://localhost/request/municipio/" + id;
  $.ajax({
    type: "POST",
    url: url,
    dataType: "json",
    success: function (json) {
      let valores = Object.values(json);
      $("#Municipio_Select option").remove();

      for (let i = 0; i < valores.length; i++) {
        let id, Municipio;
        id = Municipio = valores[i];
        id = id["id"];
        Municipio = Municipio["Municipio"];
        let html = "<option value=" + id + ">" + Municipio + "</option>";
        $("#Municipio_Select").prepend(html);
      }

      if (Object.entries(json).length === 0) {
        let html = "<option value='null' select>Sin resultados</option>";
        $("#Municipio_Select").prepend(html);
      }

      if (Object.entries(json).length > 0) {
        let html =
          "<option value='null' class='hidden' selected>Seleccione su Municipio</option>";
        $("#Municipio_Select").append(html);
      }
    },
    error: function (error) {
      alert("Ocurrio un error: " + error.message);
    },
  });
});

$("#Municipio_Select").on("change", function (e) {
  var id = $("#Municipio_Select option:selected").val();
  var url = "http://localhost/request/colonia/" + id;
  $.ajax({
    type: "POST",
    url: url,
    dataType: "json",
    success: function (json) {
      let valores = Object.values(json);
      $("#Colonia_Select option").remove();

      for (let i = 0; i < valores.length; i++) {
        let id, Colonia;
        id = Colonia = valores[i];
        id = id["id"];
        Colonia = Colonia["Colonia"];
        let html = "<option value=" + id + ">" + Colonia + "</option>";
        $("#Colonia_Select").prepend(html);
      }

      if (Object.entries(json).length === 0) {
        let html = "<option value='null' select>Sin resultados</option>";
        $("#Colonia_Select").prepend(html);
      }

      if (Object.entries(json).length > 0) {
        let html =
          "<option value='null' class='hidden' selected>Seleccione su Colonia</option>";
        $("#Colonia_Select").append(html);
      }
    },
    error: function (error) {
      alert("Ocurrio un error: " + error.message);
    },
  });
});
/********************************************/
