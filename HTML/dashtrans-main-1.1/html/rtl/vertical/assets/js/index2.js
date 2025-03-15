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
  var e = {
    series: [
      {
        name: "نشست ها",
        data: [14, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5],
      },
    ],
    chart: {
      foreColor: "rgba(255, 255, 255, 0.65)",
      fontFamily: "Vazirmatn FD",
      height: 310,
      type: "area",
      zoom: {
        enabled: !1,
      },
      toolbar: {
        show: !0,
      },
      dropShadow: {
        enabled: !0,
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
      ],
    },
    title: {
      text: "نشست ها",
      align: "right",
      style: {
        fontFamily: "Vazirmatn FD",
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        shade: "light",
        gradientToColors: ["#fff"],
        shadeIntensity: 1,
        type: "vertical",
        opacityFrom: 0.7,
        opacityTo: 0.2,
        stops: [0, 100, 100, 100],
      },
    },
    markers: {
      size: 5,
      colors: ["#000"],
      strokeColors: "#fff",
      strokeWidth: 2,
      hover: {
        size: 7,
      },
    },
    grid: {
      borderColor: "rgba(255, 255, 255, 0.12)",
      show: true,
    },
    dataLabels: {
      enabled: !1,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontFamily: "Vazirmatn FD",
      },
      fixed: {
        enabled: !1,
      },
      x: {
        show: !0,
      },
      y: {
        formatter: function (e) {
          return " " + e + " ";
        },
      },
      marker: {
        show: !1,
      },
    },
    colors: ["#fff"],
    yaxis: {
      title: {
        text: "نشست ها",
        style: {
          fontFamily: "Vazirmatn FD",
        },
      },
    },
  };
  new ApexCharts(document.querySelector("#chart1"), e).render();
  e = {
    series: [
      {
        name: "کل کاربران",
        data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257],
      },
    ],
    chart: {
      type: "bar",
      fontFamily: "Vazirmatn FD",
      height: 65,
      toolbar: {
        show: !1,
      },
      zoom: {
        enabled: !1,
      },
      dropShadow: {
        enabled: 0,
        top: 3,
        left: 14,
        blur: 4,
        opacity: 0.12,
        color: "#fff",
      },
      sparkline: {
        enabled: !0,
      },
    },
    markers: {
      size: 0,
      colors: ["#fff"],
      strokeColors: "#fff",
      strokeWidth: 2,
      hover: {
        size: 7,
      },
    },
    plotOptions: {
      bar: {
        horizontal: !1,
        columnWidth: "45%",
        endingShape: "rounded",
      },
    },
    dataLabels: {
      enabled: !1,
    },
    stroke: {
      show: !0,
      width: 0,
      curve: "smooth",
    },
    colors: ["#fff"],
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
        "دی",
        "بهمن",
        "اسفند",
      ],
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontFamily: "Vazirmatn FD",
      },
      fixed: {
        enabled: !1,
      },
      x: {
        show: !1,
      },
      y: {
        title: {
          formatter: function (e) {
            return "";
          },
        },
      },
      marker: {
        show: !1,
      },
    },
  };
  new ApexCharts(document.querySelector("#chart2"), e).render();
  e = {
    series: [
      {
        name: "بازدید از صفحات",
        data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257],
      },
    ],
    chart: {
      type: "bar",
      fontFamily: "Vazirmatn FD",
      height: 65,
      toolbar: {
        show: !1,
      },
      zoom: {
        enabled: !1,
      },
      dropShadow: {
        enabled: 0,
        top: 3,
        left: 14,
        blur: 4,
        opacity: 0.12,
        color: "#fff",
      },
      sparkline: {
        enabled: !0,
      },
    },
    markers: {
      size: 0,
      colors: ["#fff"],
      strokeColors: "#fff",
      strokeWidth: 2,
      hover: {
        size: 7,
      },
    },
    plotOptions: {
      bar: {
        horizontal: !1,
        columnWidth: "45%",
        endingShape: "rounded",
      },
    },
    dataLabels: {
      enabled: !1,
    },
    stroke: {
      show: !0,
      width: 0,
      curve: "smooth",
    },
    colors: ["#fff"],
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
        "دی",
        "بهمن",
        "اسفند",
      ],
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontFamily: "Vazirmatn FD",
      },
      fixed: {
        enabled: !1,
      },
      x: {
        show: !1,
      },
      y: {
        title: {
          formatter: function (e) {
            return "";
          },
        },
      },
      marker: {
        show: !1,
      },
    },
  };
  new ApexCharts(document.querySelector("#chart3"), e).render();
  e = {
    series: [
      {
        name: "میانگین هر نشست",
        data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257],
      },
    ],
    chart: {
      type: "bar",
      fontFamily: "Vazirmatn FD",
      height: 65,
      toolbar: {
        show: !1,
      },
      zoom: {
        enabled: !1,
      },
      dropShadow: {
        enabled: 0,
        top: 3,
        left: 14,
        blur: 4,
        opacity: 0.12,
        color: "#fff",
      },
      sparkline: {
        enabled: !0,
      },
    },
    markers: {
      size: 0,
      colors: ["#fff"],
      strokeColors: "#fff",
      strokeWidth: 2,
      hover: {
        size: 7,
      },
    },
    plotOptions: {
      bar: {
        horizontal: !1,
        columnWidth: "45%",
        endingShape: "rounded",
      },
    },
    dataLabels: {
      enabled: !1,
    },
    stroke: {
      show: !0,
      width: 0,
      curve: "smooth",
    },
    colors: ["#fff"],
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
        "دی",
        "بهمن",
        "اسفند",
      ],
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      theme: "dark",
      style: {
        fontFamily: "Vazirmatn FD",
      },
      fixed: {
        enabled: !1,
      },
      x: {
        show: !1,
      },
      y: {
        title: {
          formatter: function (e) {
            return "";
          },
        },
      },
      marker: {
        show: !1,
      },
    },
  };
  new ApexCharts(document.querySelector("#chart4"), e).render();
  e = {
    series: [
      {
        name: "نرخ ترک",
        data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257],
      },
    ],
    chart: {
      type: "bar",
      fontFamily: "Vazirmatn FD",
      height: 65,
      toolbar: {
        show: !1,
      },
      zoom: {
        enabled: !1,
      },
      dropShadow: {
        enabled: 0,
        top: 3,
        left: 14,
        blur: 4,
        opacity: 0.12,
        color: "#fff",
      },
      sparkline: {
        enabled: !0,
      },
    },
    markers: {
      size: 0,
      colors: ["#fff"],
      strokeColors: "#fff",
      strokeWidth: 2,
      hover: {
        size: 7,
      },
    },
    plotOptions: {
      bar: {
        horizontal: !1,
        columnWidth: "45%",
        endingShape: "rounded",
      },
    },
    dataLabels: {
      enabled: !1,
    },
    stroke: {
      show: !0,
      width: 0,
      curve: "smooth",
    },
    colors: ["#fff"],
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
        "دی",
        "بهمن",
        "اسفند",
      ],
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      theme: "dark",
      fixed: {
        enabled: !1,
      },
      x: {
        show: !1,
      },
      y: {
        title: {
          formatter: function (e) {
            return "";
          },
        },
      },
      marker: {
        show: !1,
      },
    },
  };
  new ApexCharts(document.querySelector("#chart5"), e).render(),
    Highcharts.chart("chart6", {
      chart: {
        height: 350,
        fontFamily: "Vazirmatn FD",
        type: "column",
        styledMode: !0,
      },
      credits: {
        enabled: !1,
      },
      title: {
        text: "وضعیت منابع ترافیکی ، 1400",
        style: {
          fontFamily: "Vazirmatn FD",
        },
      },
      accessibility: {
        announceNewData: {
          enabled: !0,
        },
      },
      xAxis: {
        type: "category",
      },
      yAxis: {
        title: {
          text: "کل سهم بازار",
          style: {
            fontFamily: "Vazirmatn FD",
          },
        },
      },
      legend: {
        enabled: !1,
      },
      plotOptions: {
        series: {
          borderWidth: 0,
          dataLabels: {
            enabled: !0,
            format: "{point.y:.1f}%",
          },
        },
      },
      tooltip: {
        headerFormat:
          '<div lang="fa" dir="rtl"> ' +
          '<span style="font-size:11px">{series.name}</span><br>' +
          "</div>",
        pointFormat:
          '<div lang="fa" dir="rtl"> ' +
          '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> از کل<br/>' +
          "</div>",
        useHTML: true,
        style: {
          fontFamily: "Vazirmatn FD",
        },
      },
      series: [
        {
          name: "منابع ترافیک",
          colorByPoint: !0,
          data: [
            {
              name: "جستجوی ارگانیک",
              y: 62.74,
              drilldown: "جستجوی ارگانیک",
            },
            {
              name: "مستقیم",
              y: 40.57,
              drilldown: "مستقیم",
            },
            {
              name: "ارجاعی",
              y: 25.23,
              drilldown: "ارجاعی",
            },
            {
              name: "سایر",
              y: 10.58,
              drilldown: "سایر",
            },
          ],
        },
      ],
      drilldown: {
        series: [
          {
            name: "کروم",
            id: "Chrome",
            data: [
              ["65.0", 0.1],
              ["64.0", 1.3],
              ["63.0", 53.02],
              ["62.0", 1.4],
              ["61.0", 0.88],
              ["60.0", 0.56],
              ["59.0", 0.45],
              ["58.0", 0.49],
              ["57.0", 0.32],
              ["56.0", 0.29],
              ["55.0", 0.79],
              ["54.0", 0.18],
              ["51.0", 0.13],
              ["49.0", 2.16],
              ["48.0", 0.13],
              ["47.0", 0.11],
              ["43.0", 0.17],
              ["29.0", 0.26],
            ],
          },
          {
            name: "فایرفاکس",
            id: "Firefox",
            data: [
              ["58.0", 1.02],
              ["57.0", 7.36],
              ["56.0", 0.35],
              ["55.0", 0.11],
              ["54.0", 0.1],
              ["52.0", 0.95],
              ["51.0", 0.15],
              ["50.0", 0.1],
              ["48.0", 0.31],
              ["47.0", 0.12],
            ],
          },
          {
            name: "اینترنت اکسپلورر",
            id: "Internet Explorer",
            data: [
              ["11.0", 6.2],
              ["10.0", 0.29],
              ["9.0", 0.27],
              ["8.0", 0.47],
            ],
          },
          {
            name: "سافاری",
            id: "Safari",
            data: [
              ["11.0", 3.39],
              ["10.1", 0.96],
              ["10.0", 0.36],
              ["9.1", 0.54],
              ["9.0", 0.13],
              ["5.1", 0.2],
            ],
          },
          {
            name: "اج",
            id: "Edge",
            data: [
              ["16", 2.6],
              ["15", 0.92],
              ["14", 0.4],
              ["13", 0.1],
            ],
          },
          {
            name: "اپرا",
            id: "Opera",
            data: [
              ["50.0", 0.96],
              ["49.0", 0.82],
              ["12.1", 0.14],
            ],
          },
        ],
      },
    }),
    Highcharts.chart("chart7", {
      chart: {
        height: 350,
        fontFamily: "Vazirmatn FD",
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: !1,
        type: "pie",
        styledMode: !0,
        style: {
          direction: "rtl",
        },
      },
      credits: {
        enabled: !1,
      },
      title: {
        text: "دستگاه های ورودی",
      },
      subtitle: {
        text: "نرخ دستگاه های استفاده شده توسط کاربران",
      },
      tooltip: {
        pointFormat:
          '<div lang="fa" dir="rtl"> ' +
          "{series.name}: <b>{point.percentage:.1f}%</b>" +
          "</div>",
        useHTML: true,
        style: {
          fontFamily: "Vazirmatn FD",
        },
      },
      legend: {
        useHTML: true,
        rtl: true,
      },
      accessibility: {
        point: {
          valueSuffix: "%",
        },
      },
      plotOptions: {
        pie: {
          allowPointSelect: !0,
          cursor: "pointer",
          innerSize: 120,
          dataLabels: {
            enabled: !0,
            format:
              '<div lang="fa" dir="rtl"> ' +
              "<b>{point.name}</b>: {point.percentage:.1f} %" +
              "</div>",
            useHTML: true,
          },
          showInLegend: !0,
        },
      },
      series: [
        {
          name: "کاربران",
          colorByPoint: !0,
          data: [
            {
              name: "رومیزی",
              y: 56,
            },
            {
              name: "موبایل",
              y: 30,
            },
            {
              name: "تبلت",
              y: 14,
            },
          ],
        },
      ],
      responsive: {
        rules: [
          {
            condition: {
              maxWidth: 500,
            },
            chartOptions: {
              plotOptions: {
                pie: {
                  innerSize: 140,
                  dataLabels: {
                    enabled: !1,
                  },
                },
              },
            },
          },
        ],
      },
    }),
    Highcharts.chart("chart8", {
      chart: {
        type: "bar",
        fontFamily: "Vazirmatn FD",
        styledMode: !0,
      },
      credits: {
        enabled: !1,
      },
      exporting: {
        buttons: {
          contextButton: {
            enabled: !1,
          },
        },
      },
      title: {
        text: "بازدیدکنندگان بر اساس جنسیت",
      },
      xAxis: {
        categories: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد"],
      },
      yAxis: {
        min: 0,
        title: {
          text: "بازدیدکنندگان بر اساس جنسیت",
          style: {
            display: "none",
          },
        },
      },
      tooltip: {
        useHTML: true,
        rtl: true,
      },
      legend: {
        reversed: !1,
        useHTML: true,
        rtl: true,
      },
      plotOptions: {
        series: {
          stacking: "normal",
        },
      },
      series: [
        {
          name: "آقا",
          data: [5, 3, 4, 7, 2],
        },
        {
          name: "خانم",
          data: [2, 2, 3, 2, 1],
        },
        {
          name: "سایر",
          data: [3, 4, 4, 2, 5],
        },
      ],
    });
  e = {
    series: [42, 47, 52, 58, 65],
    chart: {
      height: 340,
      type: "polarArea",
      fontFamily: "Vazirmatn FD",
    },
    labels: ["کروم", "فایرفاکس", "اج", "اوپرا", "سافاری"],
    fill: {
      opacity: 1,
    },
    stroke: {
      width: 1,
      colors: void 0,
    },
    colors: [
      "rgba(255, 255, 255, 0.70)",
      "rgba(255, 255, 255, 0.50)",
      "rgba(255, 255, 255, 0.30)",
      "rgba(255, 255, 255, 0.12)",
      "#fff",
    ],
    yaxis: {
      show: !1,
    },
    dataLabels: {
      enabled: !1,
    },
    legend: {
      show: !1,
      position: "bottom",
    },
    plotOptions: {
      polarArea: {
        rings: {
          strokeWidth: 0,
        },
      },
    },
  };
  new ApexCharts(document.querySelector("#chart9"), e).render(),
    jQuery("#geographic-map").vectorMap({
      map: "world_mill_en",
      backgroundColor: "transparent",
      borderColor: "#818181",
      borderOpacity: 0.25,
      borderWidth: 1,
      zoomOnScroll: !1,
      color: "#009efb",
      regionStyle: {
        initial: {
          fill: "rgba(255, 255, 255, 0.50)",
        },
      },
      markerStyle: {
        initial: {
          r: 9,
          fill: "#fff",
          "fill-opacity": 1,
          stroke: "#000",
          "stroke-width": 5,
          "stroke-opacity": 0.4,
        },
      },
      enableZoom: !0,
      hoverColor: "#009efb",
      /*  markers: [
        {
          latLng: [21, 78],
          name: "I Love My India",
        },
      ], */
      series: {
        regions: [
          {
            values: {
              IN: "#fff",
              US: "#fff",
              RU: "#fff",
              AU: "#fff",
            },
          },
        ],
      },
      hoverOpacity: null,
      normalizeFunction: "linear",
      scaleColors: ["#b6d6ff", "#005ace"],
      selectedColor: "#c9dfaf",
      selectedRegions: [],
      showTooltip: !0,
      onRegionClick: function (e, t, o) {
        var r = 'شما روی  "' + o + '" کلیک کردید، کد : ' + t.toUpperCase();
        alert(r);
      },
    });
});
