// Define
var options = {
    filebrowserImageBrowseUrl: "/laravel-filemanager?type=Images",
    filebrowserImageUploadUrl:
        "/laravel-filemanager/upload?type=Images&_token=",
    filebrowserBrowseUrl: "/laravel-filemanager?type=Files",
    filebrowserUploadUrl: "/laravel-filemanager/upload?type=Files&_token=",
};
var editor = CKEDITOR.replace("keterangan_notes", options);

var form = $("#form-submit");
var submitButton = document.getElementById("btn_submit");

// Submit button handler
submitButton.addEventListener("click", function (e) {
    e.preventDefault();
    submitData();
});

form.submit(function (e) {
    e.preventDefault();
    submitData();
});

function submitData() {
    var formData = $(form)[0];
    var data = new FormData(formData);
    delete data.delete('keterangan_notes');

    var getKeteranganNotes = editor.getData();
    data.append("keterangan_notes", getKeteranganNotes);

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
            modal_extra_large_js.hide();
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
