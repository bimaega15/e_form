$(document).ready(function () {
    var urlCreateView = $(".url_view_tentangkami").data("url");
    function createViewTentangKami() {
        $.ajax({
            url: urlCreateView,
            type: "get",
            dataType: "text",
            success: function (data) {
                $("#output_menu").html(data);
            },
        });
    }
    createViewTentangKami();

    function createViewProfileSingkat() {
        var urlProfileSingkat = $(".url_view_profilesingkat").data("url");
        $.ajax({
            url: urlProfileSingkat,
            type: "get",
            dataType: "text",
            success: function (data) {
                $("#output_menu").html(data);
            },
        });
    }

    $(document).on("click", ".btn-tab-data", function (e) {
        e.preventDefault();
        $(".btn-tab-data").attr("class", "w-100 btn btn-light btn-tab-data");

        let viewData = $(this).data("view");
        if (viewData == "tentang_kami") {
            $(".btn-tab-data[data-view='tentang_kami']").attr(
                "class",
                "w-100 btn btn-primary btn-tab-data"
            );
            createViewTentangKami();
        }
        if (viewData == "profile_singkat") {
            $(".btn-tab-data[data-view='profile_singkat']").attr(
                "class",
                "w-100 btn btn-primary btn-tab-data"
            );
            createViewProfileSingkat();
        }
    });

    var body = $("body");
    // handle btn add data
    body.on("click", ".btn-add", function () {
        var urlView = $(".url_createview").data("url");
        showModalFormLarge(urlView, {}, "Tambah Data", "get");
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
