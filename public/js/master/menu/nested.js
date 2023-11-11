$(".dd").nestable();
$(".dd").on("change", function () {
    var $this = $(this);
    var serializedData = window.JSON.stringify($($this).nestable("serialize"));
    sortingAndNested(serializedData);
});

function sortingAndNested(data) {
    var setUrl = $(".url_sortAndNested").data("url");
    $.ajax({
        url: setUrl,
        dataType: "text",
        type: "get",
        data: {
            nestedTree: data,
        },
        success: function (data) {
            console.log(data);
        },
    });
}
