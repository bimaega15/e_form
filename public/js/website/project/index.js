$(document).ready(function () {
    var dataKategoriPortfolio = $(".btn-kategori-portfolio").data("id");
    dataPortfolio(dataKategoriPortfolio);

    function dataPortfolio(kategori_portfolio_id = dataKategoriPortfolio) {
        $.ajax({
            url: $(".url_data_portfolio").data("url"),
            type: "get",
            dataType: "text",
            data: {
                kategori_portfolio_id,
            },
            success: function (data) {
                $("#output_portfolio").html(data);
            },
        });
    }
    $(document).on("click", ".btn-kategori-portfolio", function (e) {
        e.preventDefault();
        let id = $(this).data("id");

        $(".btn-kategori-portfolio").removeClass("active");
        $(this).addClass("active");

        dataPortfolio(id);
    });
});
