// Define
editor = CKEDITOR.replace("keterangan_projects", {
    toolbar: [
        { name: "document", items: ["NewPage", "Preview"] },
        {
            name: "clipboard",
            items: [
                "Cut",
                "Copy",
                "Paste",
                "PasteText",
                "PasteFromWord",
                "-",
                "Undo",
                "Redo",
            ],
        },
        {
            name: "editing",
            items: ["Find", "Replace", "-", "SelectAll", "-", "Scayt"],
        },
        {
            name: "insert",
            items: [
                "Table",
                "HorizontalRule",
                "Smiley",
                "SpecialChar",
                "PageBreak",
                "Iframe",
            ],
        },
        "/",
        { name: "styles", items: ["Styles", "Format"] },
        {
            name: "basicstyles",
            items: ["Bold", "Italic", "Strike", "-", "RemoveFormat"],
        },
        {
            name: "paragraph",
            items: [
                "NumberedList",
                "BulletedList",
                "-",
                "Outdent",
                "Indent",
                "-",
                "Blockquote",
            ],
        },
        { name: "links", items: ["Link", "Unlink", "Anchor"] },
        { name: "tools", items: ["Maximize", "-", "About"] },
    ],
});
CKEDITOR.config.height = 250;

var form = $("#form-submit");
var submitButton = document.getElementById("btn_submit");

// Submit button handler
submitButton.addEventListener("click", function (e) {
    e.preventDefault();
    submitData();
});

function submitData() {
    var formData = $(form)[0];
    var data = new FormData(formData);
    data.delete("kategori_portfolio_id");
    data.delete("keterangan_projects");


    data.append(
        "kategori_portfolio_id",
        $(".tab_click.active").data("kategori_portfolio_id")
    );
    data.append("keterangan_projects", editor.getData());
    let findKategori = $(".tab_click.active").data("kategori_portfolio_id");
    let findTable = $(
        '.tabe_display[data-kategori_portfolio_id="' + findKategori + '"]'
    )
        .find("table.table")
        .attr("id");

    $.ajax({
        type: "post",
        url: $(form).attr("action"),
        data: data,
        dataType: "json",
        enctype: "multipart/form-data",
        processData: false, // Important!
        contentType: false,
        cache: false,
        beforeSend: function () {
            submitButton.disabled = true;
            submitButton.innerHTML = disableButton;
        },
        success: function (data) {
            notifAlert("Successfully", data, "success");
            if (findTable != null) {
                datatable = $(`#${findTable}`).DataTable();
            }
            datatable.ajax.reload();
            $(`#${modal_large}`).modal("toggle");
        },
        error: function (jqXHR, exception) {
            // Enable button
            submitButton.disabled = false;
            ajaxErrorMessage(jqXHR, exception);
        },
        complete: function () {
            submitButton.disabled = false;
            submitButton.innerHTML = enableButton;
        },
    });
}
