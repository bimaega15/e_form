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

    // Objek untuk menyimpan data formulir
    let formDataSend = {};

    // Mengumpulkan data kategori FAQ
    $(".faq-item").each(function (index) {
        let faqId = `faq-${index}`;
        let faqValue = $(this).find("input[type='text']").val();

        formDataSend[faqId] = faqValue;

        // Mengumpulkan data subkategori FAQ
        let subfaqData = [];
        $(this)
            .find(".subfaq-list input[type='text']")
            .each(function () {
                subfaqData.push($(this).val());
            });

        formDataSend[faqId + "_sub"] = subfaqData;
    });

    // Mengonversi formData menjadi JSON
    let formDataJSON = JSON.stringify(formDataSend);

    data.append("content_faqs", formDataJSON);
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
            $(`#${modal_extra_large}`).modal("toggle");
            loadOutputFaq();
            let dataFaq = getDataFaq();
            if (dataFaq) {
                let getUrl = $(".root_form").data("url");
                getUrl = `${getUrl}/web/faq/${dataFaq.id}/edit`;
                $(".btn-form-faq").removeClass("btn-add").addClass("btn-edit");
                $(".btn-form-faq").attr("data-url", getUrl);
                $(".btn-form-faq").attr("data-id", dataFaq.id);

                $(".btn-form-faq").data("url", getUrl);
                $(".btn-form-faq").data("id", dataFaq.id);
            } else {
                getUrl = `${getUrl}/web/faq/create`;
                $(".btn-form-faq").removeClass("btn-edit").addClass("btn-add");
                $(".btn-form-faq").attr("data-url", getUrl);
                $(".btn-form-faq").attr("data-id", "");

                $(".btn-form-faq").data("url", getUrl);
                $(".btn-form-faq").data("id", "");
            }
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
