// Define

$(".mulai_pelayanan").bootstrapMaterialDatePicker({
    format: "HH:mm",
    date: false,
    time: true,
});
$(".akhir_pelayanan").bootstrapMaterialDatePicker({
    format: "HH:mm",
    date: false,
    time: true,
});
select2Standard(".select2", `#${modal_extra_large}`);

var options = {
    filebrowserImageBrowseUrl: "/laravel-filemanager?type=Images",
    filebrowserImageUploadUrl:
        "/laravel-filemanager/upload?type=Images&_token=",
    filebrowserBrowseUrl: "/laravel-filemanager?type=Files",
    filebrowserUploadUrl: "/laravel-filemanager/upload?type=Files&_token=",
};
var editorKontenService = CKEDITOR.replace("konten_service", options);
var editorDeskripsiService = CKEDITOR.replace("deskripsi_service", options);

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
    data.delete("deskripsi_service");
    data.delete("konten_service");

    var dataKontenService = editorKontenService.getData();
    var dataDeskripsiService = editorDeskripsiService.getData();

    data.append("konten_service", dataKontenService);
    data.append("deskripsi_service", dataDeskripsiService);

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
