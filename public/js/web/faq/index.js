// "use strict";

function loadOutputFaq() {
    $.ajax({
        url: $(".url_faq").data("url"),
        type: "get",
        dataType: "text",
        success: function (data) {
            $("#output_faq").html(data);
        },
    });
}

function getDataFaq() {
    var output = null;
    $.ajax({
        url: $(".url_faq_getData").data("url"),
        type: "get",
        dataType: "json",
        async: false,
        success: function (data) {
            output = data;
        },
    });

    return output;
}

$(document).ready(function () {
    loadOutputFaq();

    var body = $("body");
    // handle btn add data
    body.on("click", ".btn-add", function () {
        showModalFormExtraLarge($(this).data("url"), {}, "Tambah Data", "get");
    });

    // handle btn edit
    body.on("click", ".btn-edit", function (e) {
        e.preventDefault();
        let url = $(this).data("url");
        url = url.trim();

        let id = $(this).data("id");
        showModalFormExtraLarge(url, { id: id }, "Ubah Data", "get");
    });

    // handle btn delete
    function handleDelete(element) {
        basicDeleteConfirmDatatable($(element).data("url"));
    }

    body.on("click", ".btn-delete", function (e) {
        e.preventDefault();
        handleDelete(this);
    });

    let lastFaqItem = $("#output_form_faq .faq-item:last");
    let lastFaqItemId = lastFaqItem.length
        ? lastFaqItem.find('input[type="text"]').attr("id")
        : null;

    if (lastFaqItemId) {
        let lastFaqCount = parseInt(lastFaqItemId.match(/\d+/)[0]);
        faqCount = lastFaqCount + 1;
    } else {
        faqCount = 0;
    }

    body.on("click", ".btn-add-faq", function (e) {
        e.preventDefault();
        faqCount++;

        let output = `
            <ul class="faq-item">
                <li>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">

                                <label for="faq-${faqCount}">Kategori</label> 
                                <button class="btn btn-danger delete-kategori p-0" type="button" style="border-radius: 50%; width: 30px; height: 30px; margin-top: 5px; margin-left: 10px;">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                <input type="text" class="form-control" id="faq-${faqCount}" placeholder="Kategori">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary btn-add-subfaq p-0" type="button" style="border-radius: 50%; width: 30px; height: 30px; margin-top: 38px;">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </div>
                    </div>
                </li>
                <li>
                    <ul class="subfaq-list">
                    </ul>
                </li>
            </ul>
        `;

        // Menambahkan kategori FAQ ke elemen yang sesuai
        $("#output_form_faq").append(output);
    });

    let subfaqCount = 0;

    // Menangani klik pada tombol btn-add-subfaq
    body.on("click", ".btn-add-subfaq", function (e) {
        e.preventDefault();
        subfaqCount = 0;
        let countSubFaqCount = $(this)
            .closest(".faq-item")
            .find(".subfaq-list li");
        if (countSubFaqCount.length > 0) {
            subfaqCount = countSubFaqCount.length;
        }

        subfaqCount++;

        let output = `
        <li>
            <div class="row">
                <div class="col-lg-10">
                    <div class="form-group">
                        <label for="subfaq-${subfaqCount}">Data FAQ</label>
                        <input type="text" class="form-control" id="subfaq-${subfaqCount}" placeholder="Data FAQ">
                    </div>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-danger btn-delete-subfaq p-0" type="button" style="border-radius: 50%; width: 30px; height: 30px; margin-top: 40px;">
                        <i class="zmdi zmdi-delete"></i>
                    </button>
                </div>
            </div>
        </li>
    `;

        // Menemukan elemen ul dengan class "subfaq-list" yang sesuai dan menambahkan subkategori FAQ beserta tombol penghapusan
        let subfaqList = $(this).closest(".faq-item").find(".subfaq-list");
        subfaqList.append(output);
    });

    // Menangani klik pada tombol btn-delete-subfaq
    body.on("click", ".btn-delete-subfaq", function (e) {
        e.preventDefault();

        // Menghapus elemen subkategori FAQ yang terkait dengan tombol penghapusan
        $(this).closest("li").remove();
    });

    $(document).on("click", ".delete-kategori", function () {
        let kategoriElement = $(this).closest(".faq-item");

        kategoriElement.remove();
    });
});
