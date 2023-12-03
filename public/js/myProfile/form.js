// Define
var form = $("#form-submit");
var submitButton = document.getElementById("btn_submit");

var urlSelect2 = $(".select2ServerSide").data('url');

select2Standard(".select2", `#${modal_large}`);
select2Server(".select2ServerSide", `#${modal_large}`, urlSelect2);

// Submit button handler
submitButton.addEventListener("click", function (e) {
    e.preventDefault();
    submitData();
});

function submitData() {
    var formData = $(form)[0];
    var data = new FormData(formData);

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
            getLoadData();
            modal_large_js.hide();
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
