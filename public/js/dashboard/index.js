const getDataGrafik = () => {
    var setUrl = $(".url_grafik").data("url");
    var output = null;
    $.ajax({
        url: setUrl,
        dataType: "json",
        type: "get",
        async: false,
        data: {
            xhr: "donut_grafik",
        },
        success: function (data) {
            output = data;
        },
    });

    return output;
};

const getLineGrafik = () => {
    var setUrl = $(".url_grafik").data("url");
    var output = null;
    $.ajax({
        url: setUrl,
        dataType: "json",
        type: "get",
        async: false,
        data: {
            xhr: "line_grafik",
        },
        success: function (data) {
            output = data;
        },
    });

    return output;
};

$(function () {
    "use strict";
    initDonutChart();
    MorrisArea();
});

//Start
function initDonutChart() {
    var dataGrafik = getDataGrafik();

    Morris.Donut({
        element: "donut_chart",
        data: dataGrafik.grafik,
        colors: dataGrafik.color,
        formatter: function (y) {
            return y + "%";
        },
    });
} //End
//Start
function MorrisArea() {
    var lineGrafik = getLineGrafik();
    Morris.Area({
        element: "area_chart",
        data: lineGrafik,
        lineColors: ["#a87ff6"],
        xkey: "period",
        xLabelFormat: function (x) {
            var date = new Date(x);
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            return (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' + year;
        },
        ykeys: ["jumlah_data"],
        labels: ["Pengunjung"],
        pointSize: 0,
        lineWidth: 0,
        resize: true,
        fillOpacity: 0.8,
        behaveLikeLine: true,
        gridLineColor: "#a87ff6",
        hideHover: "auto",
    });
}
//End
