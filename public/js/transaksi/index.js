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
                    data: "status_transaction",
                    name: "status_transaction",
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
                $('#onLoadTbody').append(`
                <tr class="row_data" data-id="${result.id}">
                    <th class="whitespace-nowrap">${result.code_product}</th>
                    <th class="whitespace-nowrap">${result.name_product}</th>
                    <th class="whitespace-nowrap">${result.capacity_product}</th>
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
});
