// Define


var form = $("#form-submit");
var formApprovel = $("#form-submit-approvel");
var submitButton = document.getElementById("btn_submit");
var submitButtonApprovel = document.getElementById("btn_submit_approvel");
var submitButtonFinishApprovel = document.getElementById("btn_submit_finishapprovel");
select2Standard('.select2', `#${modal_extra_large}`);

var urlSelect2 = $(".select2ServerSide").data('url');
select2Server(".select2ServerSide", `#${modal_extra_large}`, urlSelect2, {
    transaction_id: $(".select2ServerSide").data('transaction_id')
});

// Submit button handler
if (submitButton != null) {
    var nominalBooking = new AutoNumeric("#nominal_booking", {
        digitGroupSeparator: ",",
        decimalPlaces: 0,
        unformatOnSubmit: true,
    });

    loadDataEdit();
    function loadDataEdit() {
        var url_root = $('.url_root').data('url');
        var id = $('.data_id').data('id');
        var overbooking_transaction = $('.data_id').data('overbooking_transaction');

        if (id != '' && id != null) {
            if (overbooking_transaction == 1) {
                $.ajax({
                    url: `${url_root}/transaksi/${id}/edit`,
                    type: 'get',
                    dataType: 'json',
                    data: {
                        typeRequest: 'from_json'
                    },
                    success: function (data) {
                        if (data) {
                            if ($('#overbooking_transaction').is(":checked")) {
                                $('#overbooking').removeClass('hidden');
                                $('#overbooking_tab').removeClass('hidden');

                                $('#detail_product').addClass('hidden');
                                $('#product').addClass('hidden');
                            } else {
                                $('#overbooking').addClass('hidden');
                                $('#overbooking_tab').addClass('hidden');

                                $('#detail_product').removeClass('hidden');
                                $('#product').removeClass('hidden');
                            }
                        }
                    }
                })
            }
        }
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
        let nomorvirtual_transaction = $('input[name="nomorvirtual_transaction"]').val();
        let accept_transaction = $('input[name="accept_transaction"]').val();
        let bank_transaction = $('select[name="bank_transaction"]').val();
        if (nomorvirtual_transaction == '' || nomorvirtual_transaction == undefined) {
            nomorvirtual_transaction = null;
        }
        if (accept_transaction == '' || accept_transaction == undefined) {
            accept_transaction = null;
        }
        if (bank_transaction == '' || bank_transaction == undefined) {
            bank_transaction = null;
        }

        let code_transaction = $('input[name="code_transaction"]').val();
        let tanggal_transaction = $('input[name="tanggal_transaction"]').val();
        let paidto_transaction = $('input[name="paidto_transaction"]').val();
        let metode_pembayaran_id = $('select[name="metode_pembayaran_id"] option:selected').val();
        let expired_transaction = $('input[name="expired_transaction"]').val();
        let purpose_transaction = $('input[name="purpose_transaction"]').val();
        let purposedivisi_transaction = $('input[name="purposedivisi_transaction"]').val();
        let isppn_transaction = 0;
        if ($('#isppn_transaction').is(":checked")) {
            isppn_transaction = 1;
        }
        let valueppn_transaction = $('input[name="valueppn_transaction"]').val();
        let attachment_transaction = $('input[name="attachment_transaction"]').prop('files')[0];

        let metodePembayaranText = $('select[name="metode_pembayaran_id"] option:selected').text().trim().toLowerCase();
        if (metodePembayaranText !== 'cash') {
            if (metodePembayaranText === 'transfer') {
                nomorvirtual_transaction = null;
            }
            if (metodePembayaranText === 'virtual account') {
                accept_transaction = null;
            }
        }
        let overbooking_transaction = 0;
        if ($('input[name="overbooking_transaction"]').is(":checked")) {
            overbooking_transaction = 1;
        }
        let jenis_over_booking = $('select[name="jenis_over_booking"]').val();
        let darirekening_booking = $('input[name="darirekening_booking"]').val();
        let pemilikrekening_booking = $('input[name="pemilikrekening_booking"]').val();
        let tujuanrekening_booking = $('input[name="tujuanrekening_booking"]').val();
        let pemiliktujuan_booking = $('input[name="pemiliktujuan_booking"]').val();
        let nominal_booking = nominalBooking.getNumber();

        let row_data = $('.row_data');

        var arr_qty_detail = [];
        var arr_price_detail = [];
        var arr_subtotal_detail = [];
        var arr_products_id = [];
        var arr_remarks_detail = [];
        var arr_matauang_detail = [];
        var arr_kurs_detail = [];
        var total_subtotal_detail = 0;
        $.each(row_data, function (i, v) {
            var qty_detail = $(this).find('.qty_detail').val();
            var price_detail = $(this).find('.price_detail').val();
            var subtotal_detail = $(this).find('.subtotal_detail').val();
            var remarks_detail = $(this).find('.remarks_detail').val();
            var matauang_detail = $(this).find('.matauang_detail').val();
            var kurs_detail = $(this).find('.kurs_detail').val();

            arr_qty_detail.push(qty_detail);
            arr_price_detail.push(price_detail);
            arr_subtotal_detail.push(subtotal_detail);
            arr_remarks_detail.push(remarks_detail);
            arr_matauang_detail.push(matauang_detail);
            arr_kurs_detail.push(kurs_detail);
            arr_products_id.push($(this).data('id'));

            total_subtotal_detail += parseFloat(subtotal_detail);
        })

        var totalproduct_transaction = 0;
        var totalprice_transaction = 0;

        totalproduct_transaction = arr_qty_detail.reduce((accumulator, currentValue) => parseFloat(accumulator) + parseFloat(currentValue), 0);
        totalprice_transaction = arr_subtotal_detail.reduce((accumulator, currentValue) => parseFloat(accumulator) + parseFloat(currentValue), 0);

        arr_products_id = JSON.stringify(arr_products_id);
        arr_qty_detail = JSON.stringify(arr_qty_detail);
        arr_price_detail = JSON.stringify(arr_price_detail);
        arr_subtotal_detail = JSON.stringify(arr_subtotal_detail);
        arr_remarks_detail = JSON.stringify(arr_remarks_detail);
        arr_matauang_detail = JSON.stringify(arr_matauang_detail);
        arr_kurs_detail = JSON.stringify(arr_kurs_detail);

        var tanggalAwal = new Date(tanggal_transaction);
        var tanggalExpired = new Date(expired_transaction);
        var selisihMilidetik = tanggalExpired - tanggalAwal;
        var selisihHari = selisihMilidetik / (1000 * 60 * 60 * 24);

        var totalppn_transaction = 0;
        if (isppn_transaction == 1) {
            totalppn_transaction = total_subtotal_detail * valueppn_transaction / 100;
            totalprice_transaction += totalppn_transaction;
        }

        if (overbooking_transaction == 1) {
            total_subtotal_detail = nominal_booking;
            totalprice_transaction = nominal_booking;

            if (isppn_transaction == 1) {
                totalppn_transaction = nominal_booking * valueppn_transaction / 100;
                totalprice_transaction += totalppn_transaction;
            }
        }


        var data = new FormData();
        data.append('code_transaction', code_transaction);
        data.append('tanggal_transaction', tanggal_transaction);
        data.append('paidto_transaction', paidto_transaction);
        data.append('metode_pembayaran_id', metode_pembayaran_id);
        data.append('expired_transaction', expired_transaction);
        data.append('purpose_transaction', purpose_transaction);
        data.append('totalproduct_transaction', totalproduct_transaction);
        data.append('totalprice_transaction', totalprice_transaction);
        data.append('paymentterms_transaction', selisihHari);
        data.append('purposedivisi_transaction', purposedivisi_transaction);
        data.append('isppn_transaction', isppn_transaction);
        data.append('valueppn_transaction', valueppn_transaction);
        data.append('attachment_transaction', attachment_transaction);
        data.append('nomorvirtual_transaction', nomorvirtual_transaction);
        data.append('accept_transaction', accept_transaction);
        data.append('bank_transaction', bank_transaction);
        data.append('subtotal_transaction', total_subtotal_detail);
        data.append('totalppn_transaction', totalppn_transaction);
        data.append('overbooking_transaction', overbooking_transaction);

        data.append('jenis_over_booking', jenis_over_booking);
        data.append('darirekening_booking', darirekening_booking);
        data.append('pemilikrekening_booking', pemilikrekening_booking);
        data.append('tujuanrekening_booking', tujuanrekening_booking);
        data.append('pemiliktujuan_booking', pemiliktujuan_booking);
        data.append('nominal_booking', nominal_booking);

        data.append('products_id', arr_products_id);
        data.append('qty_detail', arr_qty_detail);
        data.append('price_detail', arr_price_detail);
        data.append('subtotal_detail', arr_subtotal_detail);
        data.append('remarks_detail', arr_remarks_detail);
        data.append('matauang_detail', arr_matauang_detail);
        data.append('kurs_detail', arr_kurs_detail);

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
}

// Submit button handler
if (submitButtonApprovel != null) {
    submitButtonApprovel.addEventListener("click", function (e) {
        e.preventDefault();
        submitDataApprovel();
    });

    form.submit(function (e) {
        e.preventDefault();
        submitDataApprovel();
    });

    function submitDataApprovel() {
        var formData = $(formApprovel)[0];
        var data = new FormData(formData);

        $.ajax({
            type: "post",
            url: $(formApprovel).attr("action"),
            data: data,
            dataType: "json",
            enctype: "multipart/form-data",
            processData: false, // Important!
            contentType: false,
            cache: false,
            beforeSend: function () {
                submitButtonApprovel.disabled = true;
                submitButtonApprovel.innerHTML = disableButton;
            },
            success: function (data) {
                notifAlert("Successfully", data, "success");
                datatable.ajax.reload();
                modal_extra_large_js.hide();
            },
            error: function (jqXHR, exception) {
                // Enable button
                submitButtonApprovel.disabled = false;
                ajaxErrorMessage(jqXHR, exception);
            },
            complete: function () {
                submitButtonApprovel.disabled = false;
                submitButtonApprovel.innerHTML = enableButton;
            },
        });
    }
}

if (submitButtonFinishApprovel != null) {
    submitButtonFinishApprovel.addEventListener("click", function (e) {
        e.preventDefault();

        let transaction_id = $(this).data('transaction_id');
        let url = $(this).data('url');
        let type = $(this).data('type');
        let keterangan_approvel_finish = $('#keterangan_approvel_finish').val();

        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            data: {
                transaction_id,
                type,
                keterangan_approvel: keterangan_approvel_finish
            },
            beforeSend: function () { },
            success: function (data) {
                notifAlert("Successfully", data, "success");
                datatable.ajax.reload();
                modal_extra_large_js.hide();

                var modal_approvel_finish = tailwind.Modal.getOrCreateInstance(
                    document.querySelector(`#modal-approvel`)
                );
                modal_approvel_finish.hide();
            },
            error: function (jqXHR, exception) {
                ajaxErrorMessage(jqXHR, exception);
            },
        });
    });
}
