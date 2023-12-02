// Define
var form = $("#form-submit");
var submitButton = document.getElementById("btn_submit");
select2Standard('.select2',`#${modal_extra_large}`);

// Submit button handler
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
    let row_data = $('.row_data');

    var arr_quantity_product = [];
    var arr_price_product = [];
    var arr_subtotal_product = [];
    var arr_products_id = [];
    $.each(row_data, function(i,v){
        var quantity_product = $(this).find('.quantity_product').val();
        var price_product = $(this).find('.price_product').val();
        var subtotal_product = $(this).find('.subtotal_product').val();

        arr_quantity_product.push(quantity_product);
        arr_price_product.push(price_product);
        arr_subtotal_product.push(subtotal_product);
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

    data.append('products_id', arr_products_id);
    data.append('qty_detail', arr_quantity_product);
    data.append('price_detail', arr_price_product);
    data.append('subtotal_detail', arr_subtotal_product);

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
