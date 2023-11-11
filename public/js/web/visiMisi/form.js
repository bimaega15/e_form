var options = {
    filebrowserImageBrowseUrl: "/laravel-filemanager?type=Images",
    filebrowserImageUploadUrl:
        "/laravel-filemanager/upload?type=Images&_token=",
    filebrowserBrowseUrl: "/laravel-filemanager?type=Files",
    filebrowserUploadUrl: "/laravel-filemanager/upload?type=Files&_token=",
};

var editor_sejarah_tentangkami = CKEDITOR.replace(
    "sejarah_tentangkami",
    options
);
var editor_visimisi_tentangkami = CKEDITOR.replace(
    "visimisi_tentangkami",
    options
);
var editor_nilainilai_tentangkami = CKEDITOR.replace(
    "nilainilai_tentangkami",
    options
);
CKEDITOR.config.height = 300;

var body = $("body");

// Define
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
    data.delete("sejarah_tentangkami");
    data.delete("visimisi_tentangkami");
    data.delete("nilainilai_tentangkami");

    data.append("sejarah_tentangkami", editor_sejarah_tentangkami.getData());
    data.append("visimisi_tentangkami", editor_visimisi_tentangkami.getData());
    data.append(
        "nilainilai_tentangkami",
        editor_nilainilai_tentangkami.getData()
    );

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
