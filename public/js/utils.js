/**
 * Spinner
 */
var disableButton = `
<svg class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24">
<!-- ... -->
</svg>
Processing...`;
var enableButton = `Submit`;

/**
 * Ajax Error Message Handler
 * @param {*} jqXHR
 * @param {*} exception
 */
function ajaxErrorMessage(jqXHR, exception) {
    $(".modal").css({
        zIndex: "100",
    });

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

    Swal.fire({
        title: jqXHR.statusText,
        text: msgerror,
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "OK",
        customClass: {
            confirmButton: "btn btn-primary",
            popup: "my-popup-class",
        },
    });
}
function notifAlert(title, text, icon) {
    $(".modal").css({
        zIndex: "100",
    });

    Swal.fire({
        title,
        text,
        icon,
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

function basicDatatable(tableId, ajaxUrl, columns, dataAjaxUrl={}) {
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
            ajax: {
                url: ajaxUrl,
                type: 'get',
                dataType: 'json',
                data: dataAjaxUrl,
            },
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
                datatable
                    .column(0, { search: "applied", order: "applied" })
                    .nodes()
                    .each(function (cell, i) {
                        cell.innerHTML = info.start + i + 1;
                    });
            },
            rowCallback: function(row, data, index) {
                if(data.is_expired !== undefined){
                    if (data.is_expired == 1) {
                        $('td', row).each(function(i, el) {
                            $(el).css('background-color', '#FFA1D7');
                        });
                    }
                }
            }
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

    Swal.fire({
        title: "Konfirmasi",
        text: text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Tidak",
        dangerMode: true,
    }).then((result) => {
        if (result.isConfirmed) {
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
    });
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

function onRemoveSpace(text) {
    text.value = text.value.replace(/\s+/g, "");
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
