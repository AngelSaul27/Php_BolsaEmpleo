const ctx = document.getElementById("Admon_Chart_Empresas");
const myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: [
      "Bimbo",
      "Burger King",
      "Dominos",
      "AMD",
      "HP",
      "GOOGLE",
      "LALA",
      "McDonalds",
      "Cinepolis",
      "BBVA",
      "Satander",
      "Nvidia",
      "Walmart",
      "Inbursa",
      "Liverpol",
    ],
    datasets: [
      {
        label: "TOTAL DE OFERTAS",
        data: [13, 12, 15, 34, 12, 19, 23, 35, 67, 13, 13, 8, 27, 21, 13],
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
        ],
        borderColor: [
          "rgba(255, 99, 132, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        borderWidth: 1,
      },
      {
        label: "SOLICITUDES TOTALES",
        data: [13, 13, 18, 19, 20, 25,23,34,69,15,15,10,27,21,13],
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
        ],
        borderColor: [
          "rgba(255, 99, 132, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
        ],
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});
const valores = [];
$("tbody").find("td").map(function (){
  let data = $(this).text();
  valores.push(data);
});
const ctxAsp = document.getElementById("Admon_Chart_Asp");
const chartAsp = new Chart(ctxAsp, {
  type: "pie",
  data: {
    labels: [
      "Total de Aspirantes",
      "Aspirantes Validados",
      "Aspirantes No Validados",
      "Aspirantes En Proceso de Validación",
      "Aspirantes Con Solicitudes Aceptadas",
      "Aspirantes Con Solicitudes Denegadas",
      "Cuentas de Aspirantes Activas",
    ],
    datasets: [
      {
        data: valores,
        backgroundColor: ["#BCEBCC","#9A80FE","#FFF180",
        "#5D47B3","#FF99A7","#80FF9A","#206B65",
        ],
        hoverOffset: 4,
      },
    ],
  },
  options: {
    plugins: {
      legend: {
        display: false,
      },
    },
  },
});