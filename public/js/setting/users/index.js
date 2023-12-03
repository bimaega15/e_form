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
                    data: "code_profile",
                    name: "code_profile",
                    searchable: true,
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
                    data: "jabatan.nama_jabatan",
                    name: "jabatan.nama_jabatan",
                    searchable: true,
                },
                {
                    data: "usersid_atasan",
                    name: "usersid_atasan",
                    searchable: true,
                },
                {
                    data: "gambar_profile",
                    name: "gambar_profile",
                    searchable: false,
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

    function getProfileUsers(id)
    {
        let getUrl = $('.url_root').data('url');
        $.ajax({
            url: `${getUrl}/setting/users/getUsersIdProfile/${id}/usersId`,
            dataType: 'json',
            type: 'get',
            success: function(data){
                $('select[name="usersid_atasan"]')
                .append(new Option(`${data.nama_profile} | ${data.jabatan.nama_jabatan}`, data.users_id, true, true))
                .trigger("change");
            }
        })
    }
    // handle btn edit
    body.on("click", ".btn-edit", function (e) {
        e.preventDefault();

        showModalFormLarge(
            $(this).attr("href"),
            { id: $(this).data("id") },
            "Ubah Data",
            "get"
        );

        let id =  $(this).data("usersid_atasan");
        getProfileUsers(id);
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

        showModalFormLarge(
            $(this).attr("href"),
            { users_id: $(this).data("users_id") },
            "Management Access",
            "get"
        );
    });
});
