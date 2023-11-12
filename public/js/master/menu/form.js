// Define
select2Standard(".select2", "#modal_large");
function getListTableMenu() {
    var url_datatable = $(".url_datatable").data("url");
    var dataTableValue = $(".data_datatable").data("table");
    if (dataTableValue != "" && dataTableValue != null) {
        var data_datatable = JSON.parse(dataTableValue);
        data_datatable = data_datatable.split(",");

        if (data_datatable != null) {
            if (data_datatable.length > 0) {
                for (let i = 0; i < data_datatable.length; i++) {
                    var element = parseInt(data_datatable[i]);
                    check_input.push(element);
                }
            }
        }
    }

    $.ajax({
        url: url_datatable,
        dataType: "json",
        type: "get",
        success: function (data) {
            let output = `
            <tr>
              <td colspan="5">
                <div class="text-center">
                  <strong>Tidak ada data</strong>
                </div> 
              </td>
            </tr>
          `;
            if (data.length > 0) {
                output = ``;

                var setDataTable = [];
                setDataTable = data.map((item, index) => [
                    index + 1,
                    item.nama_menu,
                    item.icon_menu,
                    item.link_menu,
                    `
                    <div class="form-check">
                        <input class="form-check-input check-input-datatable" type="checkbox" value="${
                            item.id
                        }" id="id_${item.id}" data-id="${
                        item.id
                    }" data-url="{{ url('master/menu/chooseMenu') }}"
                        ${check_input.includes(item.id) ? "checked" : ""}
                        >
                        <label class="form-check-label" for="id_${item.id}">
                        </label>
                    </div>
                    `,
                ]);
                dataTable.clear().draw();
                dataTable.rows.add(setDataTable).draw();
            }
        },
    });
}
getListTableMenu();

$(document).on("click", ".check-input-datatable", function () {
    let id = $(this).data("id");

    if ($(this).is(":checked")) {
        if (!check_input.includes(id)) {
            check_input.push(id);
        }
    } else {
        if (check_input.includes(id)) {
            check_input = check_input.filter((v, i) => v != id);
        }
    }
});

var dataTable = $("#tableListMenu").DataTable();
var form = $("#form-submit");
var submitButton = document.getElementById("btn_submit");

// Submit button handler
submitButton.addEventListener("click", function (e) {
    e.preventDefault();
    submitData();
});

form.submit(function (e) {
    e.preventDefault();
    submitData();
});

$(document).on("click", 'input[name="is_node"]', function () {
    if ($(this).is(":checked")) {
        value = 1;
    } else {
        value = 0;
    }

    if (value == 1) {
        $('input[name="is_children"]').prop("checked", false);

        $("#form-menu_children_id").removeClass("hidden");
        $("#form-menu_root_id").addClass("hidden");
    }
});

$(document).on("click", 'input[name="is_children"]', function () {
    if ($(this).is(":checked")) {
        value = 1;
    } else {
        value = 0;
    }

    if (value == 1) {
        $('input[name="is_node"]').prop("checked", false);

        $("#form-menu_children_id").addClass("hidden");
        $("#form-menu_root_id").removeClass("hidden");
    }
});

function submitData() {
    var formData = $(form)[0];
    var data = new FormData(formData);
    data.delete("is_node");
    data.delete("is_children");
    data.delete("tableListMenu_length");
    data.delete("menu_root");

    var is_node = $('input[name="is_node"]:checked').val();
    var is_children = $('input[name="is_children"]:checked').val();
    var menu_root = $('select[name="menu_root"] option:selected').val();
    var link_menu = $('input[name="link_menu"]').val();

    var input_check = check_input.filter(
        (value, index, self) => self.indexOf(value) === index
    );

    if (is_node == null) {
        is_node = 0;
    }

    if (is_children == null) {
        is_children = 0;
    }

    if (input_check.length > 0) {
        is_node = 1;
        is_children = 0;
    }

    if (menu_root != null && menu_root != "") {
        is_node = 0;
        is_children = 1;
    }

    if (link_menu == "#") {
        is_node = 1;
        is_children = 0;
    }

    if (is_node == 1) {
        is_node = 1;
        is_children = 0;
    }

    input_check = JSON.stringify(input_check);

    data.append("is_node", is_node);
    data.append("is_children", is_children);
    data.append("children_menu", input_check);
    data.append("menu_root", menu_root);

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
            modal_large_js.hide();
        },
        error: function (jqXHR, exception) {
            // Enable button
            submitButton.disabled = false;
            ajaxErrorMessage(jqXHR, exception);
        },
        complete: function () {
            submitButton.disabled = false;
            submitButton.innerHTML = enableButton;
            loadNested();
        },
    });
}
