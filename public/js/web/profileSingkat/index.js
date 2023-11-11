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
                    data: "judul_tentangdetail",
                    name: "judul_tentangdetail",
                    searchable: true,
                },
                {
                    data: "nama_tentangdetail",
                    name: "nama_tentangdetail",
                    searchable: false,
                },
                {
                    data: "posisi_tentangdetail",
                    name: "posisi_tentangdetail",
                    searchable: false,
                },
                {
                    data: "gambar_tentangdetail",
                    name: "gambar_tentangdetail",
                    searchable: true,
                },
                {
                    data: "is_active",
                    name: "is_active",
                    searchable: true,
                },
                { data: "action", orderable: false, searchable: false },
            ]
        );
    }
    initDatatable();
});
