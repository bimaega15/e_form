// "use strict";
var datatable;
var editor;
var encodeKategori = $(".encode_kategori").data("kategori_portfolio");

$(document).ready(function () {
    var urlDatatable = $(".url_datatable").data("url");

    function initDatatable() {
        for (let i = 0; i < encodeKategori.length; i++) {
            const element = encodeKategori[i];

            basicDatatable(
                $(`#dataTable_${i}`),
                `${urlDatatable}?kategori_portfolio_id=${element.id}`,
                [
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        className: "text-center",
                    },
                    {
                        data: "judul_projects",
                        name: "judul_projects",
                        searchable: true,
                    },
                    {
                        data: "waktu_projects",
                        name: "waktu_projects",
                        searchable: true,
                    },
                    {
                        data: "gambar_projects",
                        name: "gambar_projects",
                        searchable: true,
                    },
                    {
                        data: "users.name",
                        name: "users.name",
                        searchable: true,
                    },
                    {
                        data: "kategori_portfolio.nama_kategori_portfolio",
                        name: "kategori_portfolio.nama_kategori_portfolio",
                        searchable: true,
                    },
                    { data: "action", orderable: false, searchable: false },
                ]
            );
        }
    }
    initDatatable();

    var body = $("body");
    // handle btn add data
    body.on("click", ".btn-add", function () {
        showModalFormLarge($(this).data("url"), {}, "Tambah Data", "get");
    });

    // handle btn edit
    body.on("click", ".btn-edit", function (e) {
        e.preventDefault();

        showModalFormLarge(
            $(this).attr("href"),
            { id: $(this).data("id") },
            "Ubah Data",
            "get"
        );
    });

    // handle btn delete
    function handleDelete(element) {
        let getTable = `#${$(element).closest("table.table").attr("id")}`;
        basicDeleteConfirmDatatable(
            $(element).data("url"),
            null,
            null,
            getTable
        );
    }

    body.on("click", ".btn-delete", function (e) {
        e.preventDefault();
        handleDelete(this);
    });
});
