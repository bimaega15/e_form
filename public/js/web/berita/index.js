// "use strict";
var datatable;
var editor;

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
                    data: "kategori_berita.nama_kategoriberita",
                    name: "kategori_berita.nama_kategoriberita",
                    searchable: true,
                },
                {
                    data: "judul_berita",
                    name: "judul_berita",
                    searchable: true,
                },
                {
                    data: "tanggalpublish_berita",
                    name: "tanggalpublish_berita",
                    searchable: true,
                },
                {
                    data: "gambar_berita",
                    name: "gambar_berita",
                    searchable: true,
                },
                {
                    data: "isactive_berita",
                    name: "isactive_berita",
                    searchable: true,
                },
                { data: "action", orderable: false, searchable: false },
            ]
        );
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
        basicDeleteConfirmDatatable($(element).data("url"));
    }

    body.on("click", ".btn-delete", function (e) {
        e.preventDefault();
        handleDelete(this);
    });
});
