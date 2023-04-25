/*RECUPERAMOS LAS CABEZERAS DE LA TABLA*/
const Header = [];
$("tbody")
  .find("tr th span")
  .map(function () {
    let data = $(this).text();
    Header.push(data);
  });
/*RECUPEREAMOS LAS FILAS DE DATOS DE LA TABLA*/
const Cols = [];
$("tbody")
  .find("tr td span")
  .map(function () {
    let data = $(this).text();
    Cols.push($.trim(data));
  });

const ctxAsp = document.getElementById("Admon_Chart_Asp");
const chartAsp = new Chart(ctxAsp, {
  type: "doughnut",
  data: {
    labels: Header,
    datasets: [
      {
        data: Cols,
        backgroundColor: [
          "#BCEBCC",
          "#9A80FE",
          "#FFF180",
          "#5D47B3",
          "#FF99A7",
          "#80FF9A",
          "#206B65",
        ],
        hoverOffset: 4,
      },
    ],
  },
  options: {
    plugins: {
      legend: {
        display: true,
      },
    },
  },
});

$("form").submit(function (e) {
  var img = ctxAsp.toDataURL();
  $("#base64").attr("value", img);
  $("#tbody").attr("value", Cols);
  $("#thead").attr("value", Header);
});