/**
 * Spinner
 */
var disableButton = `
<div class="d-flex justify-content-center align-items-center">
    <div class="spinner-border mr-1" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div>
        Loading
    </div>
</div>
`;
var enableButton = `
<div class="d-flex justify-content-center align-items-center">
<i class="zmdi zmdi-mail-send mr-1"></i> Simpan
</div>
`;

var disableButtonFrontend = `
<div class="d-flex justify-content-center align-items-center">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="ms-2">
        Loading
    </div>
</div>
`;
var enableButtonFrontend = `
<div class="d-flex justify-content-center align-items-center">
    <i class="zmdi zmdi-mail-send mr-1"></i> Kirim Pesan
</div>
`;

/**
 * Ajax Error Message Handler
 * @param {*} jqXHR
 * @param {*} exception
 */
function ajaxErrorMessage(jqXHR, exception) {
    var msgerror = "";
    if (jqXHR.status === 0) {
        msgerror = "Koneksi tidak stabil/ terputus.";
    } else if (jqXHR.status == 404) {
        msgerror = "Halaman tidak ditemukan.";
    } else if (jqXHR.status == 500) {
        msgerror = "Kesalahan pada server.";
    } else if (exception === "parsererror") {
        msgerror = "Gagal parsing JSON.";
    } else if (exception === "timeout") {
        msgerror = "Waktu request habis (Request Time Out)";
    } else if (exception === "abort") {
        msgerror = "Gagal ajax request.";
    } else {
        msgerror = "Error.\n" + jqXHR.responseJSON.message;
    }

    swal({
        title: jqXHR.statusText,
        text: msgerror,
        type: "error",
        buttonsStyling: false,
        confirmButtonText: "OK",
        customClass: {
            confirmButton: "btn btn-primary",
        },
    });
}
function notifAlert(title, text, type) {
    swal({
        title,
        text,
        type,
        buttonsStyling: false,
        confirmButtonText: "OK",
        customClass: {
            confirmButton: "btn btn-primary",
        },
    });
}

/**
 * Basic datatable init
 * @param {*} tableId
 * @param {*} ajaxUrl
 * @param {*} columns
 * @returns
 */
function basicDatatable(tableId, ajaxUrl, columns, videoJs = false) {
    return tableId
        .on("preXhr.dt", function (e, settings, processing) {})
        .on("xhr.dt", function (e, settings, json, xhr) {
            // $('.dataTables_processing').hide()
        })
        .DataTable({
            serverSide: true,
            processing: true,
            searching: true,
            search: {
                caseInsensitive: true,
            },
            searchHighlight: true,
            ajax: ajaxUrl,
            dom:
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-content-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +
                "<'table-responsive'tr>" +
                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">",
            language: {
                lengthMenu: "Show _MENU_",
            },
            columns: columns,
            drawCallback: function (settings) {
                if (datatable == null) {
                    datatable = $(tableId).DataTable();
                }
                if (tableId != null) {
                    datatable = $(tableId).DataTable();
                }
                var info = datatable.page.info();
                if (videoJs == true) {
                    var data = datatable.rows().data();
                    data.each(function (rowData, index) {
                        videojs("my-player-" + rowData.id);
                    });
                }

                $('[data-toggle="tooltip"]').tooltip();
                datatable
                    .column(0, { search: "applied", order: "applied" })
                    .nodes()
                    .each(function (cell, i) {
                        cell.innerHTML = info.start + i + 1;
                    });
            },
        });
}

/**
 * Basic Confirm Message on Delete Action Form
 * @param {*} urlDelete
 * @param {*} data
 */
function basicDeleteConfirmDatatable(
    urlDelete,
    data,
    text = "",
    tableExecute = "",
    renderView = function () {},
    loadDataTable = true
) {
    var text = text ? text : "Benar ingin menghapus data ini?";

    swal(
        {
            title: "Konfirmasi",
            text: text,
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus",
            cancelButtonText: "Tidak",
            dangerMode: true,
        },
        function (result) {
            if (result) {
                $.ajax({
                    url: urlDelete,
                    type: "post",
                    dataType: "json",
                    data: data,
                    beforeSend: function () {},
                    success: function (data) {
                        notifAlert("Successfully", data, "success");
                        if (renderView != null) {
                            renderView();
                        }

                        if (loadDataTable) {
                            if (tableExecute != "") {
                                datatable = $(tableExecute).DataTable();
                            }
                            datatable.ajax.reload(null, false);
                        }
                    },
                    error: function (jqXHR, exception) {
                        ajaxErrorMessage(jqXHR, exception);
                    },
                });
            }
        }
    );
}

/**
 * Render content into div element
 * @param {*} e
 * @param {*} url
 * @param {*} params
 * @param {*} type
 * @param {*} tab_pasien
 */
function renderContentTab(url, params = {}, type = "get", divElement, el) {
    $.ajax({
        url: url,
        data: params,
        type: type,
        beforeSend: function () {},
        success: function (html) {
            divElement.html(html);
        },
        error: function (jqXHR, exception) {
            ajaxErrorMessage(jqXHR);
        },
    });

    if (el) {
        setActiveTab(el);
    }
}

/**
 * Remove Space
 * @param {*} text
 */
function onRemoveSpace(text) {
    text.value = text.value.replace(/\s+/g, "");
}

function setActiveTab(e) {
    $(".btn-tab").removeClass("active");
    $(e).addClass("active");
}

function blockUiMessage() {
    return spinner;
}

function textareaTrim(pane) {
    $.trim(pane.val())
        .replace(/\s*[\r\n]+\s*/g, "\n")
        .replace(/(<[^\/][^>]*>)\s*/g, "$1")
        .replace(/\s*(<\/[^>]+>)/g, "$1");
}

function select2Standard(selector, parent, theme = "bootstrap") {
    $(`${selector}`).select2({
        dropdownParent: $(`${parent}`),
        closeOnSelect: true,
        theme: theme,
    });
}

function select2Server(selector, parent, routing, passData = {}) {
    function formatRepo(repo) {
        if (repo.loading) {
            return repo.text;
        }

        var $container = $(
            "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'></div>" +
                "</div>" +
                "</div>" +
                "</div>"
        );

        $container.find(".select2-result-repository__title").text(repo.text);
        return $container;
    }

    function formatRepoSelection(repo) {
        return repo.text;
    }

    $(`${selector}`).select2({
        dropdownParent: $(`${parent}`),
        closeOnSelect: true,
        theme: "bootstrap",
        ajax: {
            url: `${routing}`,
            dataType: "json",
            data: function (params) {
                let setData = {
                    search: params.term,
                    page: params.page || 1,
                };
                return {
                    ...setData,
                    ...passData,
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.results,
                    pagination: {
                        more: params.page * 10 < data.count_filtered,
                    },
                };
            },
            cache: true,
        },
        templateResult: formatRepo,
        templateSelection: formatRepoSelection,
    });
}
