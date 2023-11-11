$(document).ready(function () {
    $(document).on("click", ".check-input-roles", function () {
        let id = $(this).data("id");
        let value = null;
        if ($(this).is(":checked")) {
            value = $(this).val();
        }
        let getUrl = $(this).data("url");
        let role_id = $(this).data("role_id");
        $.ajax({
            type: "post",
            url: getUrl,
            data: {
                id,
                value,
                role_id,
            },
            dataType: "json",
        });
    });
});
