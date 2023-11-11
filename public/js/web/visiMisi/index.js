$(document).ready(function () {
    var urlCreateView = $(".url_create").data("url");
    function createView() {
        $.ajax({
            url: urlCreateView,
            type: "get",
            dataType: "text",
            success: function (data) {
                $("#output_visi_misi").html(data);
            },
        });
    }
    createView();
});
