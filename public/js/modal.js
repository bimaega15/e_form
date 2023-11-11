var modal_small = "modal_small";
var modal_medium = "modal_medium";
var modal_large = "modal_large";
var modal_extra_large = "modal_extra_large";

function showModalFormSmall(url, param, caption, tipe = "post") {
    $.ajax({
        url: url,
        data: param,
        type: tipe,
        beforeSend: function () {
            // blockUIWrapper.block();
        },
        success: function (html) {
            // blockUIWrapper.release();
            $(`#${modal_small} .modal-title`).text(caption);
            $(`#${modal_small} .modal-body-content`).html(html);
            $(`#${modal_small}`).modal(`show`);
        },
        error: function (jqXHR, exception) {
            // blockUIWrapper.release();
            ajaxErrorMessage(jqXHR);
        },
    });
}

function showModalFormMedium(url, param, caption, tipe = "post") {
    $.ajax({
        url: url,
        data: param,
        type: tipe,
        beforeSend: function () {
            // blockUIWrapper.block();
        },
        success: function (html) {
            // blockUIWrapper.release();
            $(`#${modal_medium} .modal-title`).text(caption);
            $(`#${modal_medium} .modal-body-content`).html(html);
            $(`#${modal_medium}`).modal(`show`);
        },
        error: function (jqXHR, exception) {
            // blockUIWrapper.release();
            swal({
                title: "Oops!",
                html: ajaxErrorMessage(jqXHR, exception),
                type: "error",
                buttonsStyling: false,
                confirmButtonText: "OK",
                confirmButtonClass: "btn btn-primary",
            });
        },
    });
}

function showModalFormLarge(url, param, caption, tipe = "post") {
    $.ajax({
        url: url,
        data: param,
        type: tipe,
        beforeSend: function () {
            // blockUIWrapper.block();
        },
        success: function (html) {
            // blockUIWrapper.release();
            $(`#${modal_large} .modal-title`).text(caption);
            $(`#${modal_large} .modal-body-content`).html(html);
            $(`#${modal_large}`).modal(`show`);
        },
        error: function (jqXHR, exception) {
            // blockUIWrapper.release();
            swal({
                title: "Oops!",
                html: ajaxErrorMessage(jqXHR, exception),
                type: "error",
                buttonsStyling: false,
                confirmButtonText: "OK",
                confirmButtonClass: "btn btn-primary",
            });
        },
    });
}

function showModalFormExtraLarge(url, param, caption, tipe = "post") {
    $.ajax({
        url: url,
        data: param,
        type: tipe,
        beforeSend: function () {
            // blockUIWrapper.block();
        },
        success: function (html) {
            // blockUIWrapper.release();
            $(`#${modal_extra_large} .modal-title`).text(caption);
            $(`#${modal_extra_large} .modal-body-content`).html(html);
            $(`#${modal_extra_large}`).modal(`show`);
        },
        error: function (jqXHR, exception) {
            // blockUIWrapper.release();
            swal({
                title: "Oops!",
                html: ajaxErrorMessage(jqXHR, exception),
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "OK",
                confirmButtonClass: "btn btn-primary",
            });
        },
    });
}
