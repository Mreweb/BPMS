$(function () {
  "use strict";
  Apex.chart = {
    locales: [
      {
        name: "fa",
        options: {
          months: [
            "فروردین",
            "اردیبهشت",
            "خرداد",
            "تیر",
            "مرداد",
            "شهریور",
            "مهر",
            "آبان",
            "آذر",
            "دی",
            "بهمن",
            "اسفند",
          ],
          shortMonths: [
            "فرو",
            "ارد",
            "خرد",
            "تیر",
            "مرد",
            "شهر",
            "مهر",
            "آبا",
            "آذر",
            "دی",
            "بهمـ",
            "اسفـ",
          ],
          days: [
            "یکشنبه",
            "دوشنبه",
            "سه شنبه",
            "چهارشنبه",
            "پنجشنبه",
            "جمعه",
            "شنبه",
          ],
          shortDays: ["ی", "د", "س", "چ", "پ", "ج", "ش"],
          toolbar: {
            exportToSVG: "دانلود SVG",
            exportToPNG: "دانلود PNG",
            exportToCSV: "دانلود CSV",
            menu: "منو",
            selection: "انتخاب",
            selectionZoom: "بزرگنمایی انتخابی",
            zoomIn: "بزرگنمایی",
            zoomOut: "کوچکنمایی",
            pan: "پیمایش",
            reset: "بازنشانی بزرگنمایی",
          },
        },
      },
    ],
    defaultLocale: "fa",
  };
  // chart 1
  var options = {
    series: [
      {
        name: "پسندها",
        data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5],
      },
    ],
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      height: 400,
      type: "line",
      fontFamily: "Vazirmatn FD",
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: true,
      },
      dropShadow: {
        enabled: true,
        top: 3,
        left: 14,
        blur: 4,
        opacity: 0.1,
      },
    },
    stroke: {
      width: 5,
      curve: "smooth",
    },
    grid: {
      show: true,
      borderColor: "rgba(255, 255, 255, 0.12)",
      strokeDashArray: 4,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontSize: "12px",
        fontFamily: "Vazirmatn FD",
      },
    },
    xaxis: {
      type: "datetime",
      categories: [
        "1/11/1401",
        "2/11/1401",
        "3/11/1401",
        "4/11/1401",
        "5/11/1401",
        "6/11/1401",
        "7/11/1401",
        "8/11/1401",
        "9/11/1401",
        "10/11/1401",
        "11/11/1401",
        "12/11/1401",
        "1/11/1402",
        "2/11/1402",
        "3/11/1402",
        "4/11/1402",
        "5/11/1402",
        "6/11/1402",
      ],
    },
    title: {
      text: "چارت خطی",
      align: "right",
      style: {
        fontSize: "16px",
        color: "#fff",
        fontFamily: "Vazirmatn FD",
        alignRight: "20px",
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        shade: "light",
        gradientToColors: ["#fff"],
        shadeIntensity: 1,
        type: "horizontal",
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100, 100, 100],
      },
    },
    markers: {
      size: 4,
      colors: ["#000"],
      strokeColors: "#fff",
      strokeWidth: 2,
      hover: {
        size: 7,
      },
    },
    colors: ["#fff"],
    yaxis: {
      title: {
        text: "تعداد",
        style: {
          fontFamily: "Vazirmatn FD",
          alignRight: "20px",
        },
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#chart1"), options);
  chart.render();
  // chart 2
  var optionsLine = {
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      height: 420,
      type: "line",
      fontFamily: "Vazirmatn FD",
      zoom: {
        enabled: false,
      },
      dropShadow: {
        enabled: true,
        top: 3,
        left: 2,
        blur: 4,
        opacity: 0.1,
      },
    },
    stroke: {
      curve: "smooth",
      width: 3,
    },
    colors: ["#faf", "#bff", "#ff4"],
    series: [
      {
        name: "موسیقی",
        data: [1, 15, 26, 20, 33, 27],
      },
      {
        name: "تصاویر",
        data: [3, 33, 21, 42, 19, 32],
      },
      {
        name: "فایل ها",
        data: [0, 39, 52, 11, 29, 43],
      },
    ],
    title: {
      text: "چارت چند خطی",
      align: "right",
      style: {
        fontFamily: "Vazirmatn FD",
        // alignRight: "20px",
      },
      // offsetY: 25,
      // offsetX: 20,
    },
    subtitle: {
      text: "آمار",
      align: "right",
      style: {
        fontFamily: "Vazirmatn FD",
        alignRight: "20px",
      },
    },
    markers: {
      size: 4,
      strokeWidth: 0,
      hover: {
        size: 7,
      },
    },
    grid: {
      show: true,
      borderColor: "rgba(255, 255, 255, 0.12)",
      strokeDashArray: 4,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontSize: "12px",
        fontFamily: "Vazirmatn FD",
      },
    },
    labels: [
      "15/01/1402",
      "16/01/1402",
      "17/01/1402",
      "18/01/1402",
      "19/01/1402",
      "20/01/1402",
    ],
    xaxis: {
      tooltip: {
        enabled: false,
      },
    },
    legend: {
      position: "top",
      horizontalAlign: "right",
      offsetY: -20,
    },
  };
  var chartLine = new ApexCharts(
    document.querySelector("#chart2"),
    optionsLine
  );
  chartLine.render();
  // chart 4
  var options = {
    series: [
      {
        name: "سری یک",
        data: [31, 40, 28, 51, 42, 109, 100],
      },
      {
        name: "سری دو",
        data: [11, 32, 45, 32, 34, 52, 41],
      },
    ],
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      fontFamily: "Vazirmatn FD",
      height: 400,
      type: "area",
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: true,
      },
    },
    colors: ["#546E7A", "#E91E63"],
    title: {
      text: "چارت سطح",
      align: "right",
      style: {
        fontSize: "16px",
        color: "#fff",
        fontFamily: "Vazirmatn FD",
        alignRight: "20px",
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "smooth",
    },
    grid: {
      show: true,
      borderColor: "rgba(255, 255, 255, 0.12)",
      strokeDashArray: 4,
    },
    tooltip: {
      // theme: "dark",
      theme: "light",
      style: {
        fontSize: "12px",
        fontFamily: "Vazirmatn FD",
      },
    },
    xaxis: {
      type: "datetime",
      categories: [
        "1402-09-19T00:00:00.000Z",
        "1402-09-19T01:30:00.000Z",
        "1402-09-19T02:30:00.000Z",
        "1402-09-19T03:30:00.000Z",
        "1402-09-19T04:30:00.000Z",
        "1402-09-19T05:30:00.000Z",
        "1402-09-19T06:30:00.000Z",
      ],
      label: {
        textAnchor: "start",
        position: "left",
        style: {
          fontFamily: "Vazirmatn FD",
        },
      },
    },
    tooltip: {
      x: {
        format: "yyyy/MM/dd HH:mm",
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#chart4"), options);
  chart.render();
  // chart 5
  var options = {
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      fontFamily: "Vazirmatn FD",
      height: 300,
      type: "area",
      zoom: {
        enabled: false,
      },
    },
    dataLabels: {
      enabled: false,
    },
    plotOptions: {
      area: {
        isRange: true,
      },
    },
    stroke: {
      curve: "straight",
    },
    grid: {
      show: true,
      borderColor: "rgba(255, 255, 255, 0.12)",
      strokeDashArray: 4,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontSize: "12px",
        fontFamily: "Vazirmatn FD",
      },
    },
    colors: ["#fff"],
    series: [
      {
        name: "دامنه",
        data: [
          {
            x: new Date(1538780400000),
            y: [6632.01, 6643.59],
          },
          {
            x: new Date(1538782140000),
            y: [6630.71, 6648.95],
          },
          {
            x: new Date(1538784000000),
            y: [6635.65, 6651],
          },
          {
            x: new Date(1538785800000),
            y: [6638.24, 6640],
          },
          {
            x: new Date(1538787600000),
            y: [6624.53, 6636.03],
          },
          {
            x: new Date(1538789400000),
            y: [6624.61, 6632.2],
          },
          {
            x: new Date(1538791140000),
            y: [6617, 6627.62],
          },
          {
            x: new Date(1538793000000),
            y: [6605, 6608.03],
          },
          {
            x: new Date(1538794800000),
            y: [6604.5, 6614.4],
          },
          {
            x: new Date(1538796600000),
            y: [6608.02, 6610.68],
          },
          {
            x: new Date(1538798400000),
            y: [6608.91, 6618.99],
          },
          {
            x: new Date(1538800140000),
            y: [6612, 6615.13],
          },
          {
            x: new Date(1538801400000),
            y: [6612, 6624.12],
          },
          {
            x: new Date(1538803800000),
            y: [6603.91, 6623.91],
          },
          {
            x: new Date(1538805600000),
            y: [6611.69, 6618.74],
          },
          {
            x: new Date(1538807400000),
            y: [6611, 6622.78],
          },
          {
            x: new Date(1538809140000),
            y: [6614.9, 6626.2],
          },
        ],
      },
    ],
    title: {
      text: "چارت سطحی",
      align: "right",
      style: {
        fontSize: "16px",
        fontFamily: "Vazirmatn FD",
      },
    },
    xaxis: {
      type: "datetime",
    },
  };
  var chart = new ApexCharts(document.querySelector("#chart5"), options);
  chart.render();
  // chart 6
  var options = {
    series: [
      {
        name: "شمال",
        data: [
          {
            x: 1396,
            y: 322,
          },
          {
            x: 1397,
            y: 324,
          },
          {
            x: 1398,
            y: 329,
          },
          {
            x: 1399,
            y: 342,
          },
          {
            x: 1400,
            y: 348,
          },
          {
            x: 1401,
            y: 334,
          },
          {
            x: 1402,
            y: 325,
          },
          {
            x: 1403,
            y: 316,
          },
          {
            x: 1404,
            y: 318,
          },
          {
            x: 1405,
            y: 330,
          },
          {
            x: 1406,
            y: 355,
          },
          {
            x: 1407,
            y: 366,
          },
          {
            x: 1408,
            y: 337,
          },
          {
            x: 1409,
            y: 352,
          },
          {
            x: 1410,
            y: 377,
          },
          {
            x: 1411,
            y: 383,
          },
          {
            x: 1412,
            y: 344,
          },
          {
            x: 1413,
            y: 366,
          },
          {
            x: 1414,
            y: 389,
          },
          {
            x: 1415,
            y: 334,
          },
        ],
      },
      {
        name: "جنوب",
        data: [
          {
            x: 1396,
            y: 162,
          },
          {
            x: 1397,
            y: 90,
          },
          {
            x: 1398,
            y: 50,
          },
          {
            x: 1399,
            y: 77,
          },
          {
            x: 1400,
            y: 35,
          },
          {
            x: 1401,
            y: -45,
          },
          {
            x: 1402,
            y: -88,
          },
          {
            x: 1403,
            y: -120,
          },
          {
            x: 1404,
            y: -156,
          },
          {
            x: 1405,
            y: -123,
          },
          {
            x: 1406,
            y: -88,
          },
          {
            x: 1407,
            y: -66,
          },
          {
            x: 1408,
            y: -45,
          },
          {
            x: 1409,
            y: -29,
          },
          {
            x: 1410,
            y: -45,
          },
          {
            x: 1411,
            y: -88,
          },
          {
            x: 1412,
            y: -132,
          },
          {
            x: 1413,
            y: -146,
          },
          {
            x: 1414,
            y: -169,
          },
          {
            x: 1415,
            y: -184,
          },
        ],
      },
    ],
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      type: "area",
      fontFamily: "Vazirmatn FD",
      height: 300,
      zoom: {
        enabled: false,
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "straight",
    },
    title: {
      text: "چارت سطحی با مقادیر منفی",
      align: "right",
      style: {
        fontSize: "14px",
        fontFamily: "Vazirmatn FD",
      },
    },
    xaxis: {
      type: "datetime",
      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
    },
    yaxis: {
      tickAmount: 4,
      floating: false,
      labels: {
        style: {
          colors: "#fff",
          fontFamily: "Vazirmatn FD",
        },
        offsetY: -7,
        offsetX: 0,
      },
      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
    },
    fill: {
      opacity: 0.5,
    },
    colors: ["#fff", "rgba(255, 255, 255, 0.50)"],
    tooltip: {
      x: {
        format: "yyyy",
      },
      fixed: {
        enabled: false,
        position: "topRight",
      },
    },
    grid: {
      show: true,
      borderColor: "rgba(255, 255, 255, 0.12)",
      strokeDashArray: 4,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontSize: "12px",
        fontFamily: "Vazirmatn FD",
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#chart6"), options);
  chart.render();
  // chart 7
  var options = {
    series: [
      {
        name: "سود شبکه",
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
      },
      {
        name: "درآمد",
        data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
      },
      {
        name: "جریان آزاد پول",
        data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
      },
    ],
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      type: "bar",
      height: 400,
      fontFamily: "Vazirmatn FD",
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "35%",
        endingShape: "rounded",
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      show: true,
      width: 2,
      colors: ["transparent"],
    },
    title: {
      text: "چارت ستونی",
      align: "right",
      style: {
        fontSize: "16px",
        fontFamily: "Vazirmatn FD",
      },
    },
    colors: ["#fff", "rgba(255, 255, 255, 0.50)", "rgba(255, 255, 255, 0.20)"],
    xaxis: {
      categories: [
        "فروردین",
        "اردیبهشت",
        "خرداد",
        "تیر",
        "مرداد",
        "شهریور",
        "مهر",
        "آبان",
        "آذر",
      ],
    },
    yaxis: {
      title: {
        text: " (هزار)",
      },
    },
    fill: {
      opacity: 1,
    },
    grid: {
      show: true,
      borderColor: "rgba(255, 255, 255, 0.12)",
      strokeDashArray: 4,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontSize: "12px",
        fontFamily: "Vazirmatn FD",
      },
      y: {
        formatter: function (val) {
          return val + " هزار";
        },
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#chart7"), options);
  chart.render();
  // chart 8
  var options = {
    series: [
      {
        name: "سری یک",
        data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380],
      },
    ],
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      type: "bar",
      height: 350,
      fontFamily: "Vazirmatn FD",
    },
    colors: ["#fff"],
    plotOptions: {
      bar: {
        horizontal: true,
      },
    },
    grid: {
      show: true,
      borderColor: "rgba(255, 255, 255, 0.12)",
      strokeDashArray: 4,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontSize: "12px",
        fontFamily: "Vazirmatn FD",
      },
      y: {
        formatter: function (val) {
          return val + " هزار";
        },
      },
    },
    dataLabels: {
      enabled: false,
    },
    xaxis: {
      categories: [
        "کره جنوبی",
        "کانادا",
        "بریتانیا",
        "هلند",
        "ایتالیا",
        "فرانسه",
        "ژاپن",
        "ایلات متحده",
        "چین",
        "آلمان",
      ],
    },
  };
  var chart = new ApexCharts(document.querySelector("#chart8"), options);
  chart.render();
  // chart 9
  var options = {
    series: [
      {
        name: "بلاگ",
        type: "column",
        data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160],
      },
      {
        name: "شبکه های اجتماعی",
        type: "line",
        data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16],
      },
    ],
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      height: 350,
      type: "line",
      fontFamily: "Vazirmatn FD",
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: true,
      },
    },
    stroke: {
      width: [0, 4],
    },
    colors: ["rgba(255, 255, 255, 0.20)", "#fff"],
    title: {
      text: "منبع ترافیک",
      align: "right",
      style: {
        fontFamily: "Vazirmatn FD",
      },
    },
    dataLabels: {
      enabled: true,
      enabledOnSeries: [1],
    },
    grid: {
      show: true,
      borderColor: "rgba(255, 255, 255, 0.12)",
      strokeDashArray: 4,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontSize: "12px",
        fontFamily: "Vazirmatn FD",
      },
      y: {
        formatter: function (val) {
          return val + " هزار";
        },
      },
    },
    labels: [
      "01 خرداد 1401",
      "02 خرداد 1401",
      "03 خرداد 1401",
      "04 خرداد 1401",
      "05 خرداد 1401",
      "06 خرداد 1401",
      "07 خرداد 1401",
      "08 خرداد 1401",
      "09 خرداد 1401",
      "10 خرداد 1401",
      "11 خرداد 1401",
      "12 خرداد 1401",
    ],
    xaxis: {
      type: "datetime",
    },
    yaxis: [
      {
        title: {
          text: "بلاگ",
        },
      },
      {
        opposite: true,
        title: {
          text: "شبکه های اجتماعی",
        },
      },
    ],
  };
  var chart = new ApexCharts(document.querySelector("#chart9"), options);
  chart.render();
  // chart 10
  var options = {
    series: [
      {
        name: "تیم یک",
        type: "column",
        data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30],
      },
      {
        name: "تیم دو",
        type: "area",
        data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43],
      },
      {
        name: "تیم سه",
        type: "line",
        data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39],
      },
    ],
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      fontFamily: "Vazirmatn FD",
      height: 350,
      type: "line",
      stacked: false,
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: true,
      },
    },
    colors: ["#fff", "rgba(255, 255, 255, 0.50)", "rgba(255, 255, 255, 0.20)"],
    stroke: {
      width: [0, 2, 5],
      curve: "smooth",
    },
    plotOptions: {
      bar: {
        columnWidth: "50%",
      },
    },
    fill: {
      opacity: [0.85, 0.25, 1],
      gradient: {
        inverseColors: false,
        shade: "light",
        type: "vertical",
        opacityFrom: 0.85,
        opacityTo: 0.55,
        stops: [0, 100, 100, 100],
      },
    },
    labels: [
      "01/01/1403",
      "02/01/1403",
      "03/01/1403",
      "04/01/1403",
      "05/01/1403",
      "06/01/1403",
      "07/01/1403",
      "08/01/1403",
      "09/01/1403",
      "10/01/1403",
      "11/01/1403",
    ],
    markers: {
      size: 0,
    },
    xaxis: {
      type: "datetime",
    },
    grid: {
      show: true,
      borderColor: "rgba(255, 255, 255, 0.12)",
      strokeDashArray: 4,
    },
    yaxis: {
      title: {
        text: "امتیاز",
      },
      min: 0,
    },
    tooltip: {
      shared: true,
      intersect: false,
      theme: "dark",
      style: {
        fontSize: "12px",
        fontFamily: "Vazirmatn FD",
      },
      y: {
        formatter: function (y) {
          if (typeof y !== "undefined") {
            return y.toFixed(0) + " امتیاز";
          }
          return y;
        },
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#chart10"), options);
  chart.render();
  // chart 11
  var options = {
    series: [44, 55, 13, 43, 22],
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      height: 380,
      type: "pie",
      fontFamily: "Vazirmatn FD",
    },
    colors: ["#673ab7", "#32ab13", "#f02769", "#ffc107", "#198fed"],
    labels: ["تیم یک", "تیم دو", "تیم سه", "تیم چهار", "تیم پنج"],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 360,
          },
          legend: {
            position: "bottom",
          },
        },
      },
    ],
  };
  var chart = new ApexCharts(document.querySelector("#chart11"), options);
  chart.render();
  // chart 12
  var options = {
    series: [44, 55, 41, 17, 15],
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      height: 380,
      type: "donut",
      fontFamily: "Vazirmatn FD",
    },
    colors: ["#673ab7", "#32ab13", "#f02769", "#ffc107", "#198fed"],
    labels: ["تیم یک", "تیم دو", "تیم سه", "تیم چهار", "تیم پنج"],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 320,
          },
          legend: {
            position: "bottom",
          },
        },
      },
    ],
  };
  var chart = new ApexCharts(document.querySelector("#chart12"), options);
  chart.render();
});
