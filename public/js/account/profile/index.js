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
                    data: "nama_profile",
                    name: "nama_profile",
                    searchable: true,
                },
                {
                    data: "email_profile",
                    name: "email_profile",
                    searchable: true,
                },
                {
                    data: "alamat_profile",
                    name: "alamat_profile",
                    searchable: true,
                },
                {
                    data: "nohp_profile",
                    name: "nohp_profile",
                    searchable: true,
                },
                {
                    data: "jeniskelamin_profile",
                    name: "jeniskelamin_profile",
                    searchable: true,
                },
                {
                    data: "gambar_profile",
                    name: "gambar_profile",
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
        showModalFormMedium($(this).data("url"), {}, "Tambah Data", "get");
    });

    // handle btn edit
    body.on("click", ".btn-edit", function (e) {
        e.preventDefault();

        showModalFormMedium(
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

    $(document).on("click", ".btn-access", function (e) {
        e.preventDefault();

        showModalFormMedium(
            $(this).attr("href"),
            { users_id: $(this).data("users_id") },
            "Management Access",
            "get"
        );
    });
});
