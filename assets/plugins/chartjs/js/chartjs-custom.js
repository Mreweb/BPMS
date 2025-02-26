$(function () {
  ("use strict");
  Chart.defaults.global.defaultFontFamily = "Vazirmatn FD";
  // chart 1
  var ctx = document.getElementById("chart1").getContext("2d");
  var myChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: [
        "شنبه",
        "یکشنبه",
        "دوشنبه",
        "سه شنبه",
        "چهارشنبه",
        "پنجشنبه",
        "جمعه",
      ],
      datasets: [
        {
          label: "گوگل",
          data: [13, 20, 4, 18, 7, 4, 8],
          backgroundColor: "transparent",
          borderColor: "rgba(255, 255, 255, 0.24)",
          pointRadius: "0",
          borderWidth: 4,
        },
        {
          label: "فیسبوک",
          data: [3, 30, 6, 6, 3, 4, 11],
          backgroundColor: "transparent",
          borderColor: "#fff",
          pointRadius: "0",
          borderWidth: 4,
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
        rtl: true,
        labels: {
          fontColor: "#fff",
          boxWidth: 40,
          font: {
            family: "Vazirmatn FD",
          },
        },
      },
      tooltips: {
        enabled: false,
      },
      scales: {
        xAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "#fff",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "rgba(255, 255, 255, 0.64)",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
      },
    },
  });
  // chart 2
  var ctx = document.getElementById("chart2").getContext("2d");
  var myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: [
        "شنبه",
        "یکشنبه",
        "دوشنبه",
        "سه شنبه",
        "چهارشنبه",
        "پنجشنبه",
        "جمعه",
      ],
      datasets: [
        {
          label: "گوگل",
          data: [13, 20, 4, 18, 29, 25, 8],
          barPercentage: 0.5,
          backgroundColor: "rgba(255, 255, 255, 0.24)",
        },
        {
          label: "فیسبوک",
          data: [31, 30, 6, 6, 21, 4, 11],
          barPercentage: 0.5,
          backgroundColor: "#fff",
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
        rtl: true,
        labels: {
          fontColor: "#fff",
          boxWidth: 40,
          font: {
            family: "Vazirmatn FD",
          },
        },
      },
      tooltips: {
        enabled: true,
        rtl: true,
      },
      scales: {
        xAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "#fff",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "rgba(255, 255, 255, 0.64)",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
      },
    },
  });
  // chart 3
  new Chart(document.getElementById("chart3"), {
    type: "pie",
    data: {
      labels: ["آفریقا", "آسیا", "اروپا", "آمریکای لاتین", "آمریکای شمالی"],
      datasets: [
        {
          label: "جمعیت (میلیون)",
          backgroundColor: [
            "rgba(235, 255, 225, 0.64)",
            "#f9f",
            "rgba(155, 245, 255, 0.44)",
            "rgba(215, 255, 255, 0.32)",
            "rgba(255, 255, 255, 0.15)",
          ],
          data: [2478, 5267, 734, 784, 433],
          borderWidth: [0, 0, 0, 0, 0],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true,
        rtl: true,
        labels: {
          fontColor: "#fff",
          boxWidth: 40,
        },
      },
      tooltips: {
        rtl: true,
      },
      title: {
        display: true,
        text: "پیش بینی جمعیت (میلیون) در سال 2050",
        fontColor: "#fff",
      },
    },
  });
  // chart 4
  new Chart(document.getElementById("chart4"), {
    type: "radar",
    data: {
      labels: ["آفریقا", "آسیا", "اروپا", "آمریکای لاتین", "آمریکای شمالی"],
      datasets: [
        {
          label: "1950",
          fill: true,
          backgroundColor: "rgba(255, 215, 255, 0.64)",
          borderColor: "rgba(255, 255, 255, 0.24)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(179,181,198,1)",
          data: [8.77, 55.61, 21.69, 6.62, 6.82],
        },
        {
          label: "2050",
          fill: true,
          backgroundColor: "rgba(255, 255, 255, 0.64)",
          borderColor: "rgba(255,99,132,1)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(255, 255, 255, 0.64)",
          pointBorderColor: "#fff",
          data: [25.48, 54.16, 7.61, 8.06, 4.45],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      title: {
        display: true,
        text: "درصد پراکندگی جمعیت جهان",
        fontColor: "#fff",
      },
      legend: {
        position: "right",
        rtl: true,
        display: true,
        labels: {
          fontColor: "#fff",
          boxWidth: 15,
        },
      },
      tooltips: {
        rtl: true,
      },
      scale: {
        gridLines: {
          color: "rgba(221, 221, 221, 0.52)",
        },
        pointLabels: {
          fontColor: "#fff",
        },
      },
    },
  });
  // chart 5
  new Chart(document.getElementById("chart5"), {
    type: "polarArea",
    data: {
      labels: ["آفریقا", "آسیا", "اروپا", "آمریکای لاتین", "آمریکای شمالی"],
      datasets: [
        {
          label: "جمعیت (میلیون)",
          backgroundColor: [
            "rgba(215, 245, 255, 0.64)",
            "#fff",
            "rgba(215, 255, 225, 0.44)",
            "rgba(155, 255, 255, 0.32)",
            "rgba(255, 155, 255, 0.15)",
          ],
          data: [2478, 5267, 734, 784, 433],
          borderWidth: [0, 0, 0, 0, 0],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      title: {
        display: true,
        text: "پیش بینی جمعیت جهان  (میلیون) در 2050",
        fontColor: "#fff",
      },
      legend: {
        position: "right",
        rtl: true,
        display: true,
        labels: {
          fontColor: "#fff",
          boxWidth: 15,
        },
      },
      tooltips: {
        rtl: true,
      },
      scale: {
        gridLines: {
          color: "rgba(221, 221, 221, 0.12)",
        },
        pointLabels: {
          fontColor: "#fff",
        },
      },
    },
  });
  // chart 6
  new Chart(document.getElementById("chart6"), {
    type: "doughnut",
    data: {
      labels: ["آفریقا", "آسیا", "اروپا", "آمریکای لاتین", "آمریکای شمالی"],
      datasets: [
        {
          label: "جمعیت (میلیون)",
          backgroundColor: [
            "rgba(255, 255, 255, 0.64)",
            "#fff",
            "rgba(255, 255, 255, 0.44)",
            "rgba(255, 255, 255, 0.32)",
            "rgba(255, 255, 255, 0.15)",
          ],
          data: [2478, 5267, 734, 784, 433],
          borderWidth: [0, 0, 0, 0, 0],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      title: {
        display: true,
        text: "پیش بینی جمعیت جهان  (میلیون) در 2050",
        fontColor: "#fff",
      },
      legend: {
        display: true,
        rtl: true,
        labels: {
          fontColor: "#fff",
          boxWidth: 40,
        },
      },
      tooltips: {
        rtl: true,
      },
    },
  });
  // chart 7
  new Chart(document.getElementById("chart7"), {
    type: "horizontalBar",
    data: {
      labels: ["آفریقا", "آسیا", "اروپا", "آمریکای لاتین", "آمریکای شمالی"],
      datasets: [
        {
          label: "جمعیت (میلیون)",
          backgroundColor: [
            "rgba(255, 255, 255, 0.64)",
            "#fff",
            "rgba(255, 255, 255, 0.44)",
            "rgba(255, 255, 255, 0.32)",
            "rgba(255, 255, 255, 0.15)",
          ],
          data: [2478, 5267, 734, 784, 433],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false,
      },
      tooltips: {
        rtl: true,
      },
      title: {
        display: true,
        text: "پیش بینی جمعیت جهان  (میلیون) در 2050",
        fontColor: "#fff",
      },
      scales: {
        xAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "#fff",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "rgba(255, 255, 255, 0.64)",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
      },
    },
  });
  // chart 8
  new Chart(document.getElementById("chart8"), {
    type: "bar",
    data: {
      labels: ["1900", "1950", "1999", "2050"],
      datasets: [
        {
          label: "آفریقا",
          backgroundColor: "#fff",
          data: [133, 221, 783, 2478],
        },
        {
          label: "اروپا",
          backgroundColor: "rgba(255, 255, 255, 0.24)",
          data: [408, 547, 675, 734],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      title: {
        display: true,
        text: "افزایش جمعیت (میلیون)",
        fontColor: "#fff",
      },
      legend: {
        position: "top",
        display: true,
        rtl: true,
        labels: {
          fontColor: "#fff",
          boxWidth: 15,
        },
      },
      tooltips: {
        rtl: true,
      },
      scales: {
        xAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "#fff",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "rgba(255, 255, 255, 0.64)",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
      },
    },
  });
  // chart 9
  new Chart(document.getElementById("chart9"), {
    type: "bar",
    data: {
      labels: ["1900", "1950", "1999", "2050"],
      datasets: [
        {
          label: "اروپا",
          type: "line",
          borderColor: "#fff",
          data: [408, 547, 675, 734],
          fill: false,
        },
        {
          label: "آفریقا",
          type: "line",
          borderColor: "#fff",
          data: [133, 221, 783, 2478],
          fill: false,
        },
        {
          label: "اروپا",
          type: "bar",
          backgroundColor: "rgba(255, 255, 255, 0.54)",
          data: [408, 547, 675, 734],
        },
        {
          label: "آفریقا",
          type: "bar",
          backgroundColor: "rgba(255, 255, 255, 0.24)",
          backgroundColorHover: "#3e95cd",
          data: [133, 221, 783, 2478],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      title: {
        display: true,
        text: "افزایش جمعیت (میلیون): اروپا و آفریقا",
        fontColor: "#fff",
      },
      legend: {
        position: "top",
        display: true,
        rtl: true,
        labels: {
          fontColor: "#fff",
          boxWidth: 15,
        },
      },
      tooltips: {
        rtl: true,
      },
      scales: {
        xAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "#fff",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "rgba(255, 255, 255, 0.64)",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
      },
    },
  });
  // chart 10
  new Chart(document.getElementById("chart10"), {
    type: "bubble",
    data: {
      labels: "آفریقا",
      datasets: [
        {
          label: ["چین"],
          backgroundColor: "#fff",
          borderColor: "#fff",
          data: [
            {
              x: 21269017,
              y: 5.245,
              r: 15,
            },
          ],
        },
        {
          label: ["دانمارک"],
          backgroundColor: "rgba(255, 255, 255, 0.64)",
          borderColor: "rgba(255, 255, 255, 0.64)",
          data: [
            {
              x: 258702,
              y: 7.526,
              r: 10,
            },
          ],
        },
        {
          label: ["آلمان"],
          backgroundColor: "rgba(255, 255, 255, 0.44)",
          borderColor: "rgba(255, 255, 255, 0.44)",
          data: [
            {
              x: 3979083,
              y: 6.994,
              r: 15,
            },
          ],
        },
        {
          label: ["ژاپن"],
          backgroundColor: "rgba(255, 255, 255, 0.24)",
          borderColor: "rgba(255, 255, 255, 0.24)",
          data: [
            {
              x: 4931877,
              y: 5.921,
              r: 15,
            },
          ],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      title: {
        display: true,
        text: "پیش بینی جمعیت جهان  (میلیون) در 2050",
        fontColor: "#fff",
      },
      legend: {
        position: "top",
        display: true,
        rtl: true,
        labels: {
          fontColor: "#fff",
          boxWidth: 15,
        },
      },
      tooltips: {
        rtl: true,
      },
      scales: {
        xAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "#fff",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "rgba(255, 255, 255, 0.64)",
            },
            gridLines: {
              display: true,
              color: "rgba(255, 255, 255, 0.24)",
            },
          },
        ],
      },
    },
  });
});
