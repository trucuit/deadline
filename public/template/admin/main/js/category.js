$(function () {

//reload khi close
    $("button.close span").click(function () {
        location.reload();
    })
    // ajaxEdit
    // $('.name-edit').click(function (e) {
    //     var value = $(this).attr("value");
    //     e.preventDefault();
    //     $.ajax({
    //         // url: 'index.php?module=admin&controller=category&action=ajaxEditCategory',
    //         url: ROOT_URL + 'admin/category/ajaxEditCategory',
    //         data: {id: value},
    //         success: function (data) {
    //             $('#modal-category-edit .modal-body').html(data);
    //         }
    //     })
    // })

    // submit form ajax
    $('#form-add .submit-form').click(function (event) {
        event.preventDefault();
        status = $('#form-add #status')[0].checked;
        var dataForm = {
            'name': $('#form-add input[name="name"]').val(),
            'status': (status == 'true') ? 1 : 0
        }
        id = this.id;
        $.ajax({
            type: "POST",
            // url: "index.php?module=admin&controller=category&action=ajaxAdd",
            url: ROOT_URL + "admin/category/ajaxAdd",
            data: {form: dataForm},
            beforeSend: function () {
                $('.alert-course').hide();
                $("#loader").show();
                $("#xoay").addClass('xoay');
            },
            success: function (data, status) {
                $("#loader").hide();
                $("#xoay").removeClass('xoay');
                $('#form-add .modal-body').html(data);
            },
            complete: function () {
                if (id == "save-close") {
                    if ($("#form-add .alert-success").length) {
                        location.reload();
                    }
                }
            }
        });
    });

    $('#form-edit .submit-form').click(function (event) {
        event.preventDefault();
        status = $('#form-edit #status')[0].checked;
        var dataForm = {
            'name': $('#form-edit input[name="name"]').val(),
            'status': (status == 'true') ? 1 : 0
        }
        id = $('#form-edit input[name="name"]').attr("id")
        $.ajax({
            type: "POST",
            // url: "index.php?module=admin&controller=category&action=ajaxEditCategory",
            url: ROOT_URL + "admin/category/ajaxEditCategory",
            data: {form: dataForm, id: id}, // serializes the form's elements.
            beforeSend: function () {
                $('#form-edit .alert-course').hide();
                $("#form-edit #loader").show();
                $("#form-edit #xoay").addClass('xoay');
            },
            success: function (data) {
                $("#form-edit #loader").hide();
                $("#form-edit #xoay").removeClass('xoay');
                $('#modal-category-edit .modal-body').html(data);
            }
        });
    });
    //ajaxEdit end

// ajaxActive

    $('.btn-active,.btn-inactive,.btn-delete').click(function (event) {
        event.preventDefault();
        var a = [];
        $('#adminForm').find(':checkbox').each(function () {
            if (this.checked == true) {
                a.push($(this).val());
            }
        })
        for (var i = 0; i < a.length; i++) {
            if (a[i] == 'on') {
                var indexRemove = a.indexOf('on');
                a.splice(indexRemove, 1);
            }
        }
        var checkButton = $(this).text().trim();
        if (checkButton === 'Active') {
            var url = ROOT_URL + 'admin/category/ajaxActive';
        }
        else if (checkButton === 'Inactive') {
            var url = ROOT_URL + '/admin/category/ajaxInactive';
        }
        else if (checkButton === 'Delete') {
            var url = ROOT_URL + '/admin/category/ajaxDelete';
        }
        id = this.id;
        $.ajax({
            url: url,
            type: 'POST',
            data: {cid: a},
            beforeSend: function () {
                $('.alert-course').hide();
                $("#loader").show();
                $("#xoay").addClass('xoay');

            },
            success: function (data) {
                $('#modal-action .modal-body').html(data);
                $('.close-active').click(function () {
                    location.reload();
                })
            },
            complete: function () {
                if (id == "save-close") {
                    if ($("#form-add .alert-success").length) {
                        location.reload();
                    }
                }
            }
        })
    });
    //end ajaxACtive
    $('.category .submit-form').click(function (event) {
        event.preventDefault();

        category = $('.edit-modal input[name="category"]').val();
        image = $('.category input[name="image"]').prop('files')[0];
        id = $('.edit-modal input[name="id"]').val();
        var form_data = new FormData();
        form_data.append('file', image);
        form_data.append('category', category);
        form_data.append('id', id);
        $.ajax({
            url: ROOT_URL + 'admin/category/ajaxEditCategory',
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            beforeSend: function () {
                $('.alert-course').hide();
                $("#loader").show();
                $("#xoay").addClass('xoay');

            },
            success: function (data, status) {
                $('#modal-category-edit .modal-body').html(data);

            },
            complete: function () {
                if (id == "save-close") {
                    if ($("#form-add .alert-success").length) {
                        location.reload();
                    }
                }
            }
        });
    });


    // check All
    $('input[name="checkall-toggle"]').change(function () {
        var checkStatus = this.checked;
        $('#adminForm').find(':checkbox').each(function () {
            this.checked = checkStatus;
        });
    })
})

// change Status
function ajaxStatus(url) {
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function (data, status) {
            var element = ".status i#status-" + data['id'];
            if (data['status'] == 0) {
                $(element).attr({
                    onclick: "javascript:ajaxStatus('" + data['link'] + "')"
                }).text('off');
            }
            else {
                $(element).attr({
                    onclick: "javascript:ajaxStatus('" + data['link'] + "')"
                }).text('on');
            }
        }
    });
}

// send File Ajax
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// ajaxAdd
function ajaxAdd(url) {

    $.get(url, function (data) {
        $('#modal-add .modal-body').html(data);
    })
}

//ajaxActive
function ajaxActive(url) {
    console.log(url);
    $.get(url, function (data) {
        console.log(data);
        $('#modal-add .modal-body').html(data);
    })
}

function ajaxEdit(url) {
    console.log(url);
    $.get(url, function (data) {
        $('#modal-category-edit .modal-body').html(data);
    })
}

// ajax Delete
function ajaxDelete(url) {
    $.get(url, function (data) {
        $(".category .success").html(data);
    });
}


