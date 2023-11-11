// "use strict";
var datatable;
let url_datastatis = $(".url_datastatis").data("url");
var url_parent_id;
var url_parent_name;
var check_input = [];

function loadNested() {
    var url_menu = $(".url_rendermenu").data("url");
    $.ajax({
        url: url_menu,
        type: "get",
        dataType: "text",
        success: function (data) {
            $("#output_tree").html(data);
        },
    });
}

$(document).ready(function () {
    var body = $("body");
    // handle btn add data
    body.on("click", ".btn-add", function () {
        showModalFormLarge($(this).data("url"), {}, "Tambah Data", "get");
    });

    loadNested();

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

    function loadNestedForm() {
        var url_menu = $(".url_rendermenu_form").data("url");
        $.ajax({
            url: url_menu,
            type: "get",
            dataType: "text",
            success: function (data) {
                $("#output_menu").html(data);
            },
            complete: function () {
                $(".dd").nestable();
                $(".dd").on("change", function () {
                    var $this = $(this);
                    var serializedData = window.JSON.stringify(
                        $($this).nestable("serialize")
                    );
                    sortingAndNested(serializedData);
                });
            },
        });
    }

    // handle btn delete
    function handleDelete(element, data = null) {
        basicDeleteConfirmDatatable(
            $(element).data("url"),
            {
                nestedTree: data,
            },
            "",
            "",
            loadNestedForm,
            false
        );
    }

    body.on("click", ".btn-delete", function (e) {
        e.preventDefault();
        var $this = $(".dd");
        var serializedData = window.JSON.stringify(
            $($this).nestable("serialize")
        );

        handleDelete(this, serializedData);
    });
});
