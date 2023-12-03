// "use strict";
var datatable;

$(document).ready(function () {
    function initDatatable() {
        datatable = basicDatatable(
            $("#dataTable"),
            $(".url_datatable").data("url"),
            [
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                },
                {
                    data: "status_transaction",
                    name: "status_transaction",
                    searchable: true,
                },
                {
                    data: "code_transaction",
                    name: "code_transaction",
                    searchable: true,
                },
                {
                    data: "tanggal_transaction",
                    name: "tanggal_transaction",
                    searchable: true,
                },
                {
                    data: "expired_transaction",
                    name: "expired_transaction",
                    searchable: true,
                },
                {
                    data: "paymentterms_transaction",
                    name: "paymentterms_transaction",
                    searchable: true,
                },
                {
                    data: "metode_pembayaran_id",
                    name: "metode_pembayaran_id",
                    searchable: true,
                },
                {
                    data: "totalproduct_transaction",
                    name: "totalproduct_transaction",
                    searchable: true,
                },
                {
                    data: "totalprice_transaction",
                    name: "totalprice_transaction",
                    searchable: true,
                },
                { data: "action", orderable: false, searchable: false },
            ]
        );
    }
    initDatatable();

    var body = $("body");
    // handle btn add data
    body.on("click", ".btn-add", function () {
        showModalFormExtraLarge($(this).data("url"), {}, "Tambah Data", "get");
    });

    // handle btn edit
    body.on("click", ".btn-edit", function (e) {
        e.preventDefault();

        showModalFormExtraLarge(
            $(this).attr("href"),
            { id: $(this).data("id") },
            "Ubah Data",
            "get"
        );
    });

    body.on("click", ".btn-approval", function (e) {
        e.preventDefault();

        showModalFormExtraLarge(
            $(this).attr("href"),
            { id: $(this).data("id") },
            "Form Approval",
            "get"
        );
    });

    body.on("click", ".btn-history", function (e) {
        e.preventDefault();

        showModalFormExtraLarge(
            $(this).attr("href"),
            { id: $(this).data("id") },
            "History Pengajuan",
            "get"
        );
    });

    body.on("click", ".btn-confirm-approvel", function (e) {
        e.preventDefault();
        $(".modal").css({
            zIndex: "100",
        });
        
        let transaction_id = $(this).data('transaction_id');
        let setUrl = $(this).data('url');
        let type = $(this).data('type');

        let setInfo = 'Apakah anda yakin ingin ';
        if(type == 'disetujui'){
            setInfo += 'Konfirmasi form pengajuan ini ?';
        }
        if(type == 'ditolak'){
            setInfo += 'Menolak form pengajuan ini ?';
        }
        $('#output_info_approvel').html(setInfo);
        $('#btn_submit_finishapprovel').data('transaction_id', transaction_id);
        $('#btn_submit_finishapprovel').data('url', setUrl);
        $('#btn_submit_finishapprovel').data('type', type);
    });

    // handle btn delete
    function handleDelete(element) {
        basicDeleteConfirmDatatable($(element).data("url"));
    }

    body.on("click", ".btn-delete", function (e) {
        e.preventDefault();
        handleDelete(this);
    });

    function getProducts(id){
        var url_root = $('.url_root').data('url');
        $.ajax({
            url: `${url_root}/transaksi/getProduct/${id}`,
            dataType: 'json',
            type: 'get',
            success: function(data){
                const {result} = data;

                let existingRow = $(`#onLoadTbody .row_data[data-id="${result.id}"]`);
                if (existingRow.length > 0) {
                    // Row already exists, update the quantity
                    let existingQty = parseInt(existingRow.find('.quantity_product').val()) || 0;
                    let newQty = existingQty + 1; // You can modify this based on your requirements
                    existingRow.find('.quantity_product').val(newQty);
                    
                    // Update subtotal based on the new quantity and price
                    let price = parseFloat(existingRow.find('.price_product').val()) || 0;
                    let subtotal = newQty * price;
                    existingRow.find('.subtotal_product').val(subtotal);
                } else {
                    $('#onLoadTbody').append(`
                    <tr class="row_data" data-id="${result.id}">
                        <th class="whitespace-nowrap">${result.code_product}</th>
                        <th class="whitespace-nowrap">${result.name_product}</th>
                        <th class="whitespace-nowrap">${result.capacity_product}</th>
                        <th class="whitespace-nowrap">
                            <input type="text" class="form-control remarks_detail" placeholder="Remarks" name="remarks_detail" />
                        </th>
                        <th class="whitespace-nowrap">
                            <input type="number" class="form-control quantity_product" placeholder="Qty" name="quantity_product" />
                        </th>
                        <th class="whitespace-nowrap">
                            <input type="number" class="form-control price_product" placeholder="Harga Product" name="price_product" />
                        </th>
                        <th class="whitespace-nowrap">
                            <input type="number" class="form-control subtotal_product" placeholder="Sub Total Product" name="subtotal_product" />
                        </th>
                        <th class="text-center whitespace-nowrap">
                            <button type="button" class="btn-delete-row_data btn btn-danger btn-sm" data-id="${result.id}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </th>
                    </tr>
                    `);
                }
            }
        })
    }
    
    body.on('click','.btn-confirm',function(){
        let products_id = $('.products_id option:selected').val();
        getProducts(products_id);
    })
    
    body.on('input','.quantity_product',function(){
        var row_data = $(this).closest('.row_data').data('id');
    
        var qty = $(this).val();
        var price_product = $('.row_data[data-id="'+row_data+'"] .price_product').val();
    
        var error = false;
        if(qty < 0){
            error = true;
            $(this).val(0);
            notifAlert("Warning!", 'Jumlah product tidak boleh kecil dari 0', "error");
        }
        if(price_product < 0){
            error = true;
            $('.row_data[data-id="'+row_data+'"] .price_product').val(0);
            notifAlert("Warning!", 'Harga product tidak boleh kecil dari 0', "error");
        }
    
        var subTotal = 0;
        if(!error){
            subTotal = qty * price_product;
            $('.row_data[data-id="'+row_data+'"] .subtotal_product').val(subTotal);
        }
    
    })
    
    body.on('input','.price_product',function(){
        var row_data = $(this).closest('.row_data').data('id');
    
        var price_product = $(this).val();
        var quantity_product = $('.row_data[data-id="'+row_data+'"] .quantity_product').val();
    
        var error = false;
        if(quantity_product < 0){
            error = true;
            $(this).val(0);
            notifAlert("Warning!", 'Jumlah product tidak boleh kecil dari 0', "error");
        }
        if(price_product < 0){
            error = true;
            $('.row_data[data-id="'+row_data+'"] .price_product').val(0);
            notifAlert("Warning!", 'Harga product tidak boleh kecil dari 0', "error");
        }
    
        var subTotal = 0;
        if(!error){
            subTotal = quantity_product * price_product;
            $('.row_data[data-id="'+row_data+'"] .subtotal_product').val(subTotal);
        }
    })

    body.on('click','#isppn_transaction',function(){
        if($(this).is(":checked")){
            $('input[name="valueppn_transaction"]').attr('readonly',false);
        } else {
            $('input[name="valueppn_transaction"]').attr('readonly',true);
            $('input[name="valueppn_transaction"]').val(0);
        }
    })

    body.on('input','input[name="valueppn_transaction"]', function(){
        if($(this).val() > 100){
            notifAlert("Warning!", 'Persen PPN tidak boleh lebih dari 100%', "error");
            $(this).val(0);
        }
        if($(this).val() < 0){
            notifAlert("Warning!", 'Persen PPN tidak boleh kecil dari 0%', "error");
            $(this).val(0);
        }
    })

    body.on('click', '.btn-delete-row_data', function(e){
        e.preventDefault();
        $(this).closest('.row_data').remove();
    })
});
