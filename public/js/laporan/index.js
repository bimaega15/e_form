// "use strict";
var datatable;

$(document).ready(function () {
    function initDatatable() {
        datatable = basicDatatable(
            $("#dataTable"),
            $(".url_datatable").data("url"),
            [
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                },
                {
                    data: "pengajuan_transaction",
                    name: "pengajuan_transaction",
                    searchable: true,
                },
                {
                    data: "status_transaction",
                    name: "status_transaction",
                    searchable: true,
                },
                {
                    data: "oleh_transaction",
                    name: "oleh_transaction",
                    searchable: true,
                },
                {
                    data: "code_transaction",
                    name: "code_transaction",
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
                    data: "paymentterms_transaction",
                    name: "paymentterms_transaction",
                    searchable: true,
                },
                {
                    data: "metode_pembayaran_id",
                    name: "metode_pembayaran_id",
                    searchable: true,
                },
                {
                    data: "totalproduct_transaction",
                    name: "totalproduct_transaction",
                    searchable: true,
                },
                {
                    data: "totalprice_transaction",
                    name: "totalprice_transaction",
                    searchable: true,
                },
                {
                    data: "action",
                    name: "action",
                    searchable: false,
                    orderable: false,
                },
            ]
        );
    }
    initDatatable();

    var body = $("body");

    body.on('click','.btn-filter', function(e){
        e.preventDefault();
        let is_transaksi_expired = false;
        if($('input[name="is_transaksi_expired"]').is(":checked")){
            is_transaksi_expired = true;
        }
        let periode_transaksi = $('input[name="periode_transaksi"]').val();

        periode_transaksi = periode_transaksi.split('-');
        var tanggalAwal = new Date(periode_transaksi[0]);
        var tanggalAkhir = new Date(periode_transaksi[1]);

        // Mendapatkan nilai tanggal, bulan, dan tahun dari tanggal awal
        var tanggalAwalFormatted = tanggalAwal.getFullYear() + '-' + 
                                ('0' + (tanggalAwal.getMonth() + 1)).slice(-2) + '-' + 
                                ('0' + tanggalAwal.getDate()).slice(-2);

        // Mendapatkan nilai tanggal, bulan, dan tahun dari tanggal akhir
        var tanggalAkhirFormatted = tanggalAkhir.getFullYear() + '-' + 
                                    ('0' + (tanggalAkhir.getMonth() + 1)).slice(-2) + '-' + 
                                    ('0' + tanggalAkhir.getDate()).slice(-2);

        $('#dataTable').DataTable().destroy();

        datatable = basicDatatable(
            $("#dataTable"),
            $(".url_datatable").data("url"),
            [
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                },
                {
                    data: "pengajuan_transaction",
                    name: "pengajuan_transaction",
                    searchable: true,
                },
                {
                    data: "status_transaction",
                    name: "status_transaction",
                    searchable: true,
                },
                {
                    data: "oleh_transaction",
                    name: "oleh_transaction",
                    searchable: true,
                },
                {
                    data: "code_transaction",
                    name: "code_transaction",
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
                    data: "paymentterms_transaction",
                    name: "paymentterms_transaction",
                    searchable: true,
                },
                {
                    data: "metode_pembayaran_id",
                    name: "metode_pembayaran_id",
                    searchable: true,
                },
                {
                    data: "totalproduct_transaction",
                    name: "totalproduct_transaction",
                    searchable: true,
                },
                {
                    data: "totalprice_transaction",
                    name: "totalprice_transaction",
                    searchable: true,
                },
                {
                    data: "action",
                    name: "action",
                    searchable: false,
                    orderable: false,
                },
            ], {
                is_transaksi_expired,
                tanggal_awal: tanggalAwalFormatted,
                tanggal_akhir: tanggalAkhirFormatted,
            }
        );
    })

    body.on("click", ".btn-approval", function (e) {
        e.preventDefault();

        showModalFormExtraLarge(
            $(this).attr("href"),
            { id: $(this).data("id") },
            "Form Approval",
            "get"
        );
    });

    body.on("click", ".btn-history", function (e) {
        e.preventDefault();

        showModalFormExtraLarge(
            $(this).attr("href"),
            { id: $(this).data("id") },
            "History Pengajuan",
            "get"
        );
    });

    body.on("click", ".btn-detail-pengajuan", function (e) {
        e.preventDefault();

        showModalFormExtraLarge(
            $(this).attr("href"),
            '',
            "Detail Pengajuan",
            "get"
        );
    });

    body.on("click", ".btn-detail-transaksi", function (e) {
        e.preventDefault();

        showModalFormExtraLarge(
            $(this).attr("href"),
            '',
            "Detail Transaksi",
            "get"
        );
    });

    body.on('click','.btn-report-excel',function(){
        var urlExcel = $('.url_excel').data('url');
        window.location.href = urlExcel;
    })
});


