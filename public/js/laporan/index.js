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
        $("#dataTable").DataTable().remove();
    })
});


