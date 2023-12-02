getLoadData();
function getLoadData()
{
    var url_data_profile = $('.url_data_profile').data('url');
    $.ajax({
        url: url_data_profile,
        type: 'get',
        dataType: 'text',
        success: function(data){
            $('#output').html(data);
        }
    })
}

// initialize manually with a list of links
var body = $("body");
body.on("click", '[data-gallery="photoviewer"]', function (e) {
    e.preventDefault();
    var items = [],
        options = {
            index: $(".photoviewer").index(this),
        };

    $('[data-gallery="photoviewer"]').each(function () {
        items.push({
            src: $(this).attr("href"),
            title: $(this).attr("data-title"),
        });
    });

    new PhotoViewer(items, options);
});

body.on("click", ".btn-edit", function (e) {
    e.preventDefault();

    showModalFormLarge(
        $(this).data("url"),
        { id: $(this).data("id") },
        "Ubah Data",
        "get"
    );
});