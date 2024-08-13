// "use strict";
var datatable;
var url_root = $('.url_root').data('url');
var periode_transaksi = $('input[name="periode_transaksi"]').val();

periode_transaksi = periode_transaksi.split('-');
var tanggalAwal = new Date(periode_transaksi[0]);
var tanggalAkhir = new Date(periode_transaksi[1]);
var tanggalAwalFormatted = tanggalAwal.getFullYear() + '-' +
    ('0' + (tanggalAwal.getMonth() + 1)).slice(-2) + '-' +
    ('0' + tanggalAwal.getDate()).slice(-2);
var tanggalAkhirFormatted = tanggalAkhir.getFullYear() + '-' +
    ('0' + (tanggalAkhir.getMonth() + 1)).slice(-2) + '-' +
    ('0' + tanggalAkhir.getDate()).slice(-2);
var is_transaksi_expired = false;
if ($('input[name="is_transaksi_expired"]').is(":checked")) {
    is_transaksi_expired = true;
}
var initDatatable = () => {
    $.ajax({
        url: `${url_root}/laporan`,
        type: "get",
        dataType: "json",
        data: {
            is_transaksi_expired,
            tanggal_awal: tanggalAwalFormatted,
            tanggal_akhir: tanggalAkhirFormatted,
        },
        success: function (result) {
            const { data } = result;
            $('#dataTable').DataTable().destroy();

            datatable = $('#dataTable').DataTable({
                data: data,
                columns: [
                    {
                        data: null, render: function (data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    { data: 'detail_transaction' },
                    { data: 'pengajuan_transaction' },
                    { data: 'total_transactions' },
                    { data: 'total_subtotal' },
                ]
            });

        }
    })
}


$(document).ready(function () {
    initDatatable();

    var body = $("body");

    const getFilter = () => {
        is_transaksi_expired = false;
        if ($('input[name="is_transaksi_expired"]').is(":checked")) {
            is_transaksi_expired = true;
        }
        periode_transaksi = $('input[name="periode_transaksi"]').val();

        periode_transaksi = periode_transaksi.split('-');
        tanggalAwal = new Date(periode_transaksi[0]);
        tanggalAkhir = new Date(periode_transaksi[1]);

        // Mendapatkan nilai tanggal, bulan, dan tahun dari tanggal awal
        tanggalAwalFormatted = tanggalAwal.getFullYear() + '-' +
            ('0' + (tanggalAwal.getMonth() + 1)).slice(-2) + '-' +
            ('0' + tanggalAwal.getDate()).slice(-2);

        // Mendapatkan nilai tanggal, bulan, dan tahun dari tanggal akhir
        tanggalAkhirFormatted = tanggalAkhir.getFullYear() + '-' +
            ('0' + (tanggalAkhir.getMonth() + 1)).slice(-2) + '-' +
            ('0' + tanggalAkhir.getDate()).slice(-2);
        
        return {
            is_transaksi_expired,
            tanggalAwalFormatted,
            tanggalAkhirFormatted,
        };
    }
    body.on('click', '.btn-filter', function (e) {
        e.preventDefault();
        getFilter();
        initDatatable();
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

    body.on('click', '.btn-report-excel', function () {
        const filterData = getFilter();
        const is_transaksi_expired = filterData.is_transaksi_expired;
        const tanggal_awal = filterData.tanggalAwalFormatted;
        const tanggal_akhir = filterData.tanggalAkhirFormatted;

        const setUrl = `${url_root}/laporan/exportExcel?is_transaksi_expired=${is_transaksi_expired}&tanggal_awal=${tanggal_awal}&tanggal_akhir=${tanggal_akhir}`;
        var urlExcel = setUrl;
        window.location.href = urlExcel;
    })

    const format_primary = (data, users_id) => {
        let output = `
        <table class="table table-report -mt-2" id="dataTableTransaction${users_id}">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">NO.</th>
                    <th class="whitespace-nowrap">MENGAJUKAN</th>
                    <th class="whitespace-nowrap">STATUS</th>
                    <th class="whitespace-nowrap">OLEH</th>
                    <th class="whitespace-nowrap">CODE</th>
                    <th class="whitespace-nowrap">TANGGAL PENGAJUAN</th>
                    <th class="whitespace-nowrap">TANGGAL KADALUARSA</th>
                    <th class="whitespace-nowrap">PAYMENT TERMS</th>
                    <th class="whitespace-nowrap">METODE PEMBAYARAN</th>
                    <th class="whitespace-nowrap">TOTAL PRODUCT</th>
                    <th class="whitespace-nowrap">TOTAL TRANSAKSI</th>
                    <th class="whitespace-nowrap">ACTION</th>
                </tr>
            </thead>
            <tbody>`;
        data.map((item, index) => {
            const isExpired = item.is_expired;
            output += `
            <tr>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${index + 1}</td>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${item.pengajuan_transaction}</td>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${item.status_transaction}</td>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${item.oleh_transaction}</td>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${item.code_transaction}</td>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${item.tanggal_transaction}</td>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${item.expired_transaction}</td>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${item.paymentterms_transaction}</td>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${item.metode_pembayaran_id}</td>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${item.totalproduct_transaction}</td>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${item.totalprice_transaction}</td>
                <td ${isExpired ? 'style="background-color: #FFA1D7;"' : ''}>${item.action}</td>
            </tr>
            `;
        })
        output += `
            </tbody>
        </table>
        `;
        return output;
    }

    const loadData = (payload) => {
        var output;
        $.ajax({
            url: `${url_root}/laporan/detailLaporan`,
            type: 'get',
            dataType: 'json',
            data: {
                ...payload
            },
            async: false,
            success: function (result) {
                output = result.data;
            },
        })

        return output;
    }

    body.on('click', '.btn-detail', function (e) {
        e.preventDefault();
        const users_id = $(this).data('users_id');
        const tanggal_awal = $(this).data('tanggal_awal');
        const tanggal_akhir = $(this).data('tanggal_akhir');
        const is_transaksi_expired = $(this).data('is_transaksi_expired');

        const getLoadData = loadData({
            users_id,
            tanggal_awal,
            tanggal_akhir,
            is_transaksi_expired
        });

        const tr = $(this).closest('tr');
        const row = datatable.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
            $(this).html('<i class="fas fa-plus-circle fa-2x"></i>');
        } else {
            row.child(format_primary(getLoadData, users_id)).show();
            tr.addClass('shown');
            $(this).html('<i class="fas fa-minus-circle fa-2x"></i>');
            $('#dataTableTransaction' + users_id).DataTable();
        }
    })

    body.on("click", ".btn-edit", function (e) {
        e.preventDefault();

        showModalFormExtraLarge(
            $(this).attr("href"),
            { id: $(this).data("id") },
            "Ubah Data",
            "get"
        );
    });

     // handle btn delete
     function handleDelete(element) {
        basicDeleteConfirmDatatable($(element).data("url"), null, null, '', initDatatable, false);
    }

    body.on("click", ".btn-delete", function (e) {
        e.preventDefault();
        handleDelete(this);
    });
});


