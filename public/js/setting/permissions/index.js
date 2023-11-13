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
                    data: "name",
                    name: "name",
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
});
