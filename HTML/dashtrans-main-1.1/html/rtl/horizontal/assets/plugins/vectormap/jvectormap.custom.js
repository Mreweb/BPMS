$(function () {
  "use strict";
  jQuery("#world-map-markers").vectorMap({
    map: "world_mill_en",
    backgroundColor: "transparent",
    borderColor: "#818181",
    borderOpacity: 0.25,
    borderWidth: 1,
    zoomOnScroll: false,
    color: "#009efb",
    regionStyle: {
      initial: {
        fill: "#fff",
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
    enableZoom: true,
    hoverColor: "#009efb",
    markers: [
      {
        latLng: [33.0, 52.0],
        name: "اینجا ایران است",
      },
    ],
    hoverOpacity: null,
    normalizeFunction: "linear",
    scaleColors: ["#b6d6ff", "#005ace"],
    selectedColor: "#c9dfaf",
    selectedRegions: [],
    showTooltip: true,
    onRegionClick: function (element, code, region) {
      var message =
        'شما روی منطقه "' +
        region +
        '" کلیک کرده اید ، کد : ' +
        code.toUpperCase();
      alert(message);
    },
  });
  $("#iran").vectorMap({
    map: "iran_ir",
    backgroundColor: "transparent",
    zoomOnScroll: false,
    regionStyle: {
      initial: {
        fill: "#fff",
      },
    },
  });
  $("#usa").vectorMap({
    map: "us_aea_en",
    backgroundColor: "transparent",
    zoomOnScroll: false,
    regionStyle: {
      initial: {
        fill: "#fff",
      },
    },
  });
  $("#australia").vectorMap({
    map: "au_mill",
    backgroundColor: "transparent",
    zoomOnScroll: false,
    regionStyle: {
      initial: {
        fill: "#fff",
      },
    },
  });
  $("#uk").vectorMap({
    map: "uk_mill_en",
    backgroundColor: "transparent",
    zoomOnScroll: false,
    regionStyle: {
      initial: {
        fill: "#fff",
      },
    },
  });
});
