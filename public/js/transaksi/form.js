// Define
var form = $("#form-submit");
var formApprovel = $("#form-submit-approvel");
var submitButton = document.getElementById("btn_submit");
var submitButtonApprovel = document.getElementById("btn_submit_approvel");
var submitButtonFinishApprovel = document.getElementById("btn_submit_finishapprovel");
select2Standard('.select2',`#${modal_extra_large}`);

var urlSelect2 = $(".select2ServerSide").data('url');
select2Server(".select2ServerSide", `#${modal_extra_large}`, urlSelect2);

// Submit button handler
if(submitButton != null){
    submitButton.addEventListener("click", function (e) {
        e.preventDefault();
        submitData();
    });

    form.submit(function (e) {
        e.preventDefault();
        submitData();
    });

    function submitData() {
        let code_transaction = $('input[name="code_transaction"]').val();
        let tanggal_transaction = $('input[name="tanggal_transaction"]').val();
        let paidto_transaction = $('input[name="paidto_transaction"]').val();
        let metode_pembayaran_id = $('select[name="metode_pembayaran_id"] option:selected').val();
        let expired_transaction = $('input[name="expired_transaction"]').val();
        let purpose_transaction = $('input[name="purpose_transaction"]').val();
        let purposedivisi_transaction = $('input[name="purposedivisi_transaction"]').val();
        let isppn_transaction = 0;
        if($('#isppn_transaction').is(":checked")){
            isppn_transaction = 1;
        }
        let valueppn_transaction = $('input[name="valueppn_transaction"]').val();
        let attachment_transaction = $('input[name="attachment_transaction"]').prop('files')[0];
        
        let row_data = $('.row_data');

        var arr_quantity_product = [];
        var arr_price_product = [];
        var arr_subtotal_product = [];
        var arr_products_id = [];
        var arr_remarks_detail = [];
        $.each(row_data, function(i,v){
            var quantity_product = $(this).find('.quantity_product').val();
            var price_product = $(this).find('.price_product').val();
            var subtotal_product = $(this).find('.subtotal_product').val();
            var remarks_detail = $(this).find('.remarks_detail').val();

            arr_quantity_product.push(quantity_product);
            arr_price_product.push(price_product);
            arr_subtotal_product.push(subtotal_product);
            arr_remarks_detail.push(remarks_detail);
            arr_products_id.push($(this).data('id'));
        })
        var totalproduct_transaction = 0;
        var totalprice_transaction = 0;

        totalproduct_transaction = arr_quantity_product.reduce((accumulator,currentValue) => parseFloat(accumulator) + parseFloat(currentValue), 0);
        totalprice_transaction = arr_subtotal_product.reduce((accumulator,currentValue) => parseFloat(accumulator) + parseFloat(currentValue), 0);

        arr_products_id = JSON.stringify(arr_products_id);
        arr_quantity_product = JSON.stringify(arr_quantity_product);
        arr_price_product = JSON.stringify(arr_price_product);
        arr_subtotal_product = JSON.stringify(arr_subtotal_product);
        arr_remarks_detail = JSON.stringify(arr_remarks_detail);

        var tanggalAwal = new Date(tanggal_transaction);
        var tanggalExpired = new Date(expired_transaction);
        var selisihMilidetik = tanggalExpired - tanggalAwal;
        var selisihHari = selisihMilidetik / (1000 * 60 * 60 * 24);

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

        data.append('products_id', arr_products_id);
        data.append('qty_detail', arr_quantity_product);
        data.append('price_detail', arr_price_product);
        data.append('subtotal_detail', arr_subtotal_product);
        data.append('remarks_detail', arr_remarks_detail);

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
if(submitButtonApprovel != null){
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

if(submitButtonFinishApprovel != null){
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
            beforeSend: function () {},
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
