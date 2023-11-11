var form = $("#contactForm");
var submitButton = document.getElementById("btn-submit-kirimpesan");
select2Standard(".select2Standard", "#contactForm", "bootstrap-5");

// Submit button handler
submitButton.addEventListener("click", function (e) {
    e.preventDefault();
    submitData();
});

function resetForm() {
    $("#contactForm")[0].reset();
    $('select[name="role_id"] option')
        .attr("selected", false)
        .trigger("change");
}

function submitData() {
    var formData = $(form)[0];
    var data = new FormData(formData);
    data.delete("accepts_kirimpesan");

    let getActive = 0;
    if ($('#contactForm input[name="accepts_kirimpesan"]').is(":checked")) {
        getActive = 1;
    }
    if (getActive == 0) {
        return toastr.warning("Anda belum accept", "Perhatikan kembali");
    }
    var role_id = $('select[name="role_id"]').val();
    if (role_id == "" || role_id == null) {
        return toastr.warning(
            "Mohon tujuan pesanan diisi",
            "Perhatikan kembali"
        );
    }

    data.append("accepts_kirimpesan", getActive);

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
            submitButton.innerHTML = disableButtonFrontend;
        },
        success: function (data) {
            toastr.success(data, "Successfully");
            resetForm();
        },
        error: function (jqXHR, exception) {
            // Enable button
            submitButton.disabled = false;
            toastr.error(jqXHR.responseText, "Failed");
        },
        complete: function () {
            submitButton.disabled = false;
            submitButton.innerHTML = enableButtonFrontend;
        },
    });
}
