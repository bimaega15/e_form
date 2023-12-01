// Define
var form = $("#form-submit");
var submitButton = document.getElementById("btn_submit");
select2Standard('.select2',`#${modal_large}`);

// Submit button handler
getCodeProduct();
function getCodeProduct(){
    var output = null;
    $.ajax({
        url: $('.get_auto_code').data('url'),
        dataType: 'json',
        async: false,
        type: 'get',
        success: function(data){
            output = data.result;
            $('input[name="code_product"]').val(output);
        }
    })
    return output;
}

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