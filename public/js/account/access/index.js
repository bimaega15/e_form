$(document).ready(function () {
    $(document).on("click", ".check-input-roles", function () {
        let id = $(this).data("id");
        let value = null;
        if ($(this).is(":checked")) {
            value = $(this).val();
        }
        let getUrl = $(this).data("url");
        let users_id = $(this).data("users_id");
        $.ajax({
            type: "post",
            url: getUrl,
            data: {
                id,
                value,
                users_id,
            },
            dataType: "json",
        });
    });
});
