$(document).ready(function () {
    var urlRoots = $(".url_roots").data("url");
    urlRoots += "/blogs";

    var render_blogs_text = $(".render_blogs").data("url");

    loadPages();
    function loadPages(pages = "page=1") {
        $.ajax({
            url: `${render_blogs_text}?${pages}`,
            type: "get",
            dataType: "text",
            beforeSend: function () {
                $(".loading-svg").removeClass("d-none");
                $(".preloader").addClass("d-none");
            },
            success: function (data) {
                $("#output_berita").html(data);
            },
            complete: function () {
                var target = $("#section_blogs");
                if (target.length) {
                    var top = target.offset().top - 150;
                    $("html,body").animate(
                        {
                            scrollTop: top,
                        },
                        1000
                    );
                }
                $(".loading-svg").addClass("d-none");
            },
        });
    }

    $(document).on("click", "a.page-numbers", function (e) {
        e.preventDefault();

        let getHref = $(this).attr("href");
        getHref = getHref.split("?");
        loadPages(getHref[1]);
    });

    function getBeritaDetail(setUrl, isDetail = true) {
        var classDetail = isDetail ? "isi_berita_sedikit" : "isi_berita_detail";
        var textDetail = isDetail ? "Lihat Sedikit" : "Lihat Detail";

        $.ajax({
            url: setUrl,
            dataType: "json",
            type: "get",
            success: function (data) {
                var pesan_berita = data.isi_berita;
                if (classDetail == "isi_berita_detail") {
                    pesan_berita = limitWord(pesan_berita, 500);
                }
                $('.isi_berita[data-id="' + data.id + '"]').html(
                    pesan_berita +
                        ` <a href="${urlRoots}/${data.id}/edit" class="${classDetail} text-info font-weight-bold" data-id="${data.id}">${textDetail}</a>`
                );
            },
        });
    }

    $(document).on("click", ".isi_berita_detail", function (e) {
        e.preventDefault();
        let setUrl = $(this).attr("href");
        getBeritaDetail(setUrl, true);
    });

    $(document).on("click", ".isi_berita_sedikit", function (e) {
        e.preventDefault();
        let setUrl = $(this).attr("href");
        getBeritaDetail(setUrl, false);
    });

    function limitWord(text, limit) {
        if (text.length > limit) {
            text = text.substring(0, limit);
            text += "...";
        }

        return text;
    }
});
