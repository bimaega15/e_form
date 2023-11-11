// "use strict";
var datatable;
let url_datastatis = $(".url_datastatis").data("url");
var url_parent_id;
var url_parent_name;

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
                    data: "role_id.name",
                    name: "role_id.name",
                    searchable: true,
                },
                {
                    data: "nama_kirimpesan",
                    name: "nama_kirimpesan",
                    searchable: true,
                },
                {
                    data: "email_kirimpesan",
                    name: "email_kirimpesan",
                    searchable: true,
                },
                {
                    data: "nohandphone_kirimpesan",
                    name: "nohandphone_kirimpesan",
                    searchable: true,
                },
                {
                    data: "subject_kirimpesan",
                    name: "subject_kirimpesan",
                    searchable: true,
                },

                { data: "action", orderable: false, searchable: false },
            ]
        );
    }
    initDatatable();

    var body = $("body");

    // handle btn delete
    function handleDelete(element) {
        basicDeleteConfirmDatatable($(element).data("url"));
    }

    body.on("click", ".btn-delete", function (e) {
        e.preventDefault();
        handleDelete(this);
    });

    body.on("click", ".btn-detail", function (e) {
        e.preventDefault();

        showModalFormLarge(
            $(this).data("url"),
            { id: $(this).data("id") },
            "Ubah Data",
            "get"
        );
    });
});
