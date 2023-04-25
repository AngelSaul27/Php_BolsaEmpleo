const Header = []; //header table
const Body = []; //Header body
var DataBody = [], count = 0, Arrays, Link = ""; //Almacenado del contenido de la tabla

function MapingTable(longitud_col, buscar, Url) {
    //GET HEADER TABLE
    $("table thead tr td span").each(function (e) {
        e < longitud_col ? Header.push($(this).text()) : ""; //GET HEADER TABLE
    });

    //GET CONTENT TABLE - MAP SPAN TH
    $("table tbody tr th").each(function (e) {
        if (count < longitud_col) {
            if ($(this).find(buscar).length > 0) {
                if (count == 0) { //FUNCTION FOR IMAGES
                    Link = $(this).find(buscar).text();
                }
                Body.push($(this).find(buscar).text());
            }
            if (count == longitud_col - 2 && longitud_col != 0) {
                if (!$(this).find(buscar).text()) {
                    Body.push(Url + Link);
                }
            }
            count++;
        } else {
            e + 2; count = 0;
        }
    });

    DataBody = InGroup(Body, longitud_col);

    Arrays = {
        Header: Header,
        Body: DataBody,
    };

}

//SLICE ARRAYS
function InGroup(arr, size) {
    var chunk = [],
        i;
    for (i = 0; i <= arr.length; i += size) chunk.push(arr.slice(i, i + size));
    return chunk;
}

$("#listado_aspirantes").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: $("form").attr("action"),
        data: Arrays,
        beforeSend: function (xhr) {
            $("form button span").text("Procesando..");
        },
        success: function (data) {
            window.open(data, "_blank");
            $("form button span").text("Completado");
            $("form button").attr("disabled", "disabled");
            $("form button").css("background-color", "#86a79f");
        },
        error: function (xhr, status, error) {
            console.log(
                "An error occured: " +
                xhr.status +
                " " +
                xhr.statusText +
                " error: " +
                error
            );
            $("form button span").text("¡Ocurrio un error, intentelo mas tarde!");
        },
    });
});

$("#listado_empleadores").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: $("form").attr("action"),
        data: Arrays,
        beforeSend: function (xhr) {
            $("form button span").text("Procesando..");
        },
        success: function (data) {
            window.open(data, "_blank");
            $("form button span").text("Completado");
            $("form button").attr("disabled", "disabled");
            $("form button").css("background-color", "#86a79f");
        },
        error: function (xhr, status, error) {
            console.log(
                "An error occured: " +
                xhr.status +
                " " +
                xhr.statusText +
                " error: " +
                error
            );
            $("form button span").text("¡Ocurrio un error, intentelo mas tarde!");
        },
    });
});

$("#listado_solicitudes_empleador").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: $("form").attr("action"),
        data: Arrays,
        beforeSend: function (xhr) {
            $("form button span").text("Procesando..");
        },
        success: function (data) {
            window.open(data, "_blank");
            $("form button span").text("Completado");
            $("form button").attr("disabled", "disabled");
            $("form button").css("background-color", "#86a79f");
        },
        error: function (xhr, status, error) {
            console.log(
                "An error occured: " +
                xhr.status +
                " " +
                xhr.statusText +
                " error: " +
                error
            );
            $("form button span").text("¡Ocurrio un error, intentelo mas tarde!");
        },
    });
});

