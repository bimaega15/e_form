// Define
var options = {
    filebrowserImageBrowseUrl: "/laravel-filemanager?type=Images",
    filebrowserImageUploadUrl:
        "/laravel-filemanager/upload?type=Images&_token=",
    filebrowserBrowseUrl: "/laravel-filemanager?type=Files",
    filebrowserUploadUrl: "/laravel-filemanager/upload?type=Files&_token=",
};
var editor = CKEDITOR.replace("isi_berita", options);
select2Standard(".select2", `#${modal_large}`);

var dataBerita = $(".data_video_berita").data("berita");
if (dataBerita != "") {
    var idVideo = $("#load_video_berita .video-js").attr("id");
    var player = videojs(idVideo);
}
var tanggalPublish = $(".datetimepicker").bootstrapMaterialDatePicker({
    format: "dddd DD MMMM YYYY - HH:mm",
    clearButton: true,
    weekStart: 1,
});
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
    data.delete("isi_berita");
    data.delete("tanggalpublish_berita");
    data.delete("isactive_berita");

    var getData = editor.getData();
    var getTanggalPublish = tanggalPublish.val();
    var tanggalpublish_berita = moment(
        getTanggalPublish,
        "dddd DD MMMM YYYY - HH:mm"
    ).format("YYYY-MM-DD HH:mm");
    var getStatusBerita = $('input[name="isactive_berita"]');
    var isactive_berita = 0;
    if (getStatusBerita.is(":checked")) {
        isactive_berita = 1;
    }

    data.append("isi_berita", getData);
    data.append("tanggalpublish_berita", tanggalpublish_berita);
    data.append("isactive_berita", isactive_berita);

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
