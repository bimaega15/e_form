// "use strict";
var datatableExpired;

$(document).ready(function () {
    function initDatatable() {
        datatable = basicDatatable(
            $("#dataTableExpired"),
            $(".datatable_expired").data("url"),
            [
                {
                    data: "code_transaction",
                    name: "code_transaction",
                    searchable: true,
                },
                {
                    data: "pengajuan_transaction",
                    name: "pengajuan_transaction",
                    searchable: true,
                },
               
                {
                    data: "tanggal_transaction",
                    name: "tanggal_transaction",
                    searchable: true,
                },
                {
                    data: "expired_transaction",
                    name: "expired_transaction",
                    searchable: true,
                },
                {
                    data: "totalprice_transaction",
                    name: "totalprice_transaction",
                    searchable: true,
                },
            ]
        );
    }
    initDatatable();

    loadDashboard();
    function loadDashboard()
    {
        var urlRoot = $('.url_root').data('url');
        $.ajax({
            url: `${urlRoot}/dashboard`,
            type: 'get',
            dataType: 'json',
            success: function(data){
                var dataDb = data;

                $('.totalWaiting').html(dataDb.totalWaiting);
                $('.totalSuccess').html(dataDb.totalSuccess);
                $('.totalReject').html(dataDb.totalReject);
                $('.totalTransaction').html(dataDb.totalTransaction);

                $('.totalWaitingAccesor').html(dataDb.totalWaitingAccesor);
                $('.totalSuccessAccesor').html(dataDb.totalSuccessAccesor);
                $('.totalRejectAccesor').html(dataDb.totalRejectAccesor);
                $('.totalTransactionAccesor').html(dataDb.totalTransactionAccesor);


                if ($("#report-employee-chart").length) {
                    $('.male-presentase').html(`${dataDb.grafikPegawai.persentaseLakiLaki}%`);
                    $('.female-presentase').html(`${dataDb.grafikPegawai.persentasePerempuan}%`);

                    var ctx = $("#report-employee-chart")[0].getContext("2d");

                    var labels = ["Laki-laki", "Perempuan"];
                    var data = [dataDb.grafikPegawai.L, dataDb.grafikPegawai.P];
                    var backgroundColors = ["rgb(6, 78, 59)", "rgb(245, 158, 11)"];
                    var hoverBackgroundColors = ["rgb(6, 78, 59)", "rgb(245, 158, 11)"];
                
                    new Chart(ctx, {
                        type: "pie",
                        data: {
                            labels: labels,
                            datasets: [{
                                data: data,
                                backgroundColor: backgroundColors,
                                hoverBackgroundColor: hoverBackgroundColors,
                                borderWidth: 0,
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                }

                if ($("#report-transaction-chart").length) {
                    $('.waiting_grafik').html(`${dataDb.grafikTransaksi.totalWaiting}`);
                    $('.agree_grafik').html(`${dataDb.grafikTransaksi.totalSuccess}`);
                    $('.reject_grafik').html(`${dataDb.grafikTransaksi.totalReject}`);
                    $('.waiting_accesor_grafik').html(`${dataDb.grafikTransaksi.totalWaitingAccesor}`);
                    $('.agree_accesor_grafik').html(`${dataDb.grafikTransaksi.totalSuccessAccesor}`);
                    $('.reject_accesor_grafik').html(`${dataDb.grafikTransaksi.totalRejectAccesor}`);

                    var ctx = $("#report-transaction-chart")[0].getContext("2d");

                    var labels = ["Menunggu", "Disetujui", "Ditolak", "Approvel Accesor", "Disetujui Accesor", "Ditolak Accesor"];
                    var data = [dataDb.grafikTransaksi.totalWaiting, dataDb.grafikTransaksi.totalSuccess, dataDb.grafikTransaksi.totalReject, dataDb.grafikTransaksi.totalWaitingAccesor, dataDb.grafikTransaksi.totalSuccessAccesor, dataDb.grafikTransaksi.totalRejectAccesor];
                    var backgroundColors = ["rgb(6, 78, 59)", "rgb(245, 158, 11)", "rgb(250, 204, 21)", "rgb(21, 67, 176)", "rgb(196, 19, 168)", "rgb(255, 75, 75)"];
                    var hoverBackgroundColors = ["rgb(6, 78, 59)", "rgb(245, 158, 11)", "rgb(250, 204, 21)", "rgb(21, 67, 176)", "rgb(196, 19, 168)", "rgb(255, 75, 75)"];
                
                    new Chart(ctx, {
                        type: "pie",
                        data: {
                            labels: labels,
                            datasets: [{
                                data: data,
                                backgroundColor: backgroundColors,
                                hoverBackgroundColor: hoverBackgroundColors,
                                borderWidth: 0,
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                }

                if ($("#report-transactionpermonth-chart").length) {
                    var ctx = $("#report-transactionpermonth-chart")[0].getContext("2d");
                    var labels = dataDb.transactionReport.label;
                    var data = dataDb.transactionReport.output.map(v => v.total);
    
                    if ($("#report-transactionpermonth-chart").length) {
                        var ctx = $("#report-transactionpermonth-chart")[0].getContext("2d");
                         new Chart(ctx, {
                          type: "line",
                          data: {
                            labels: labels,
                            datasets: [{
                              label: 'Grafik Transaksi Per Tahun',
                              data: data,
                              borderWidth: 2,
                              borderColor: 'rgb(6, 78, 59)',
                              backgroundColor: "transparent",
                              pointBorderColor: "transparent",
                              tension: 0.4
                            }]
                          },
                          options: {
                            maintainAspectRatio: false,
                            plugins: {
                              legend: {
                                display: false
                              }
                            },
                            scales: {
                              x: {
                                ticks: {
                                  font: {
                                    size: 12
                                  },
                                  color: 'rgb(6, 78, 59)'
                                },
                                grid: {
                                  display: false,
                                  drawBorder: false
                                }
                              },
                              y: {
                                ticks: {
                                  font: {
                                    size: 12
                                  },
                                  color: 'rgb(6, 78, 59)',
                                  callback: function callback(value, index, values) {
                                    return "$" + value;
                                  }
                                },
                              }
                            }
                          }
                        });
                      }
                      
                }
            },
            error: function(xhr){
                console.log(xhr.responseText);
            }
        })
    }

    getNotes();
    function getNotes()
    {
        var urlRoot = $('.url_root').data('url');
        $.ajax({
            url: `${urlRoot}/dashboard`,
            type: 'get',
            data: {
                type: 'notes'
            },
            dataType: 'text',
            success: function(data){
                $('#output_notes').html(data);
            },
            error: function(xhr){
                console.log(xhr.responseText);
            }
        })
    }
});


