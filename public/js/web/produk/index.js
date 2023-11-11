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
                    data: "nama_produk",
                    name: "nama_produk",
                    searchable: true,
                },
                {
                    data: "harga_produk",
                    name: "harga_produk",
                    searchable: false,
                },
                {
                    data: "keterangan_produk",
                    name: "keterangan_produk",
                    searchable: false,
                },
                {
                    data: "gambar_produk",
                    name: "gambar_produk",
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

    // initialize manually with a list of links
    $(document).on("click", '[data-gallery="photoviewer"]', function (e) {
        e.preventDefault();
        var items = [],
            options = {
                index: $(".photoviewer").index(this),
            };

        $('[data-gallery="photoviewer"]').each(function () {
            items.push({
                src: $(this).attr("href"),
                title: $(this).attr("data-title"),
            });
        });

        new PhotoViewer(items, options);
    });
});
