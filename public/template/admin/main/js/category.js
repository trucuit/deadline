$(function () {
    // $(':checkbox').click(function () {
    //    var val= $(this).attr("name");
    //     console.log(val);
    //     $.ajax({
    //         url: 'index.php?module=admin&controller=category&action=ajaxActive',
    //         type: 'POST',
    //         dataType:'html',
    //         data: {value:val},
    //
    //     }).done(function(data) {
    //         		console.log("success");
    //         console.log(data);
    //     })
    // });
    // ajaxEdit
    $('.name-edit').click(function () {
       var value=$(this).attr("value");
        console.log(value);
        $.ajax({
           url:'index.php?module=admin&controller=category&action=ajaxEditCategory',
           data:{id:value},
           success:function(data){
               $('#modal-category-edit .modal-body').html(data);
           }
       })
        $('#form-edit .submit-edit').click(function (event) {
            event.preventDefault();
            var dataForm = {
                'name': $('#form-edit input[name="name"]').val(),
                'status': $('#form-edit select[name="status"]').val(),
                'id':$('#form-edit input[name="name"]').attr("id")
            }

            $.ajax({
                type: "POST",
                url: "index.php?module=admin&controller=category&action=ajaxEditCategory",
                data: {form: dataForm}, // serializes the form's elements.
                success: function (data) {
                    console.log(data);
                    $('#modal-category-edit .modal-body').html(data);
                    location.reload();
                }
            });
        });

    })
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
            var url = 'index.php?module=admin&controller=category&action=ajaxActive';
        }
        else if (checkButton === 'Inactive') {
            var url = 'index.php?module=admin&controller=category&action=ajaxInactive';
        }
        else if (checkButton === 'Delete') {
            var url = 'index.php?module=admin&controller=category&action=ajaxDelete';
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
            url: 'index.php?module=admin&controller=category&action=ajaxEditCategory',
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

    // submit new form file ajax
    $('#form-add .submit-add').click(function (event) {
        event.preventDefault();
        var dataForm = {
            'name': $('#form-add input[name="name"]').val(),
            'status': $('#form-add select[name="status"]').val()
        }
        id = this.id;
        $.ajax({
            type: "POST",
            url: "index.php?module=admin&controller=category&action=ajaxAdd",
            data: {form: dataForm},
            beforeSend: function () {
                $('.alert-course').hide();
                $("#loader").show();
                $("#xoay").addClass('xoay');

            },
            success: function (data) {
                $("#loader").hide();
                $("#xoay").removeClass('xoay');
                $('#form-add .modal-body').html(data);
            },
            complete: function () {
                if (id == "submit-close") {
                    if ($("#form-add .alert-success").length) {
                        location.reload();
                    }
                }
            }
        });
    });

    //submit close form fiel ajax
    $('#form-add .submit-close').click(function (event) {
        event.preventDefault();
        var dataForm = {
            'name': $('#form-add input[name="name"]').val(),
            'status': $('#form-add select[name="status"]').val(),


        }
        id = this.id;
        $.ajax({
            type: "POST",
            url: "index.php?module=admin&controller=category&action=ajaxAdd",
            data: {form: dataForm}, // serializes the form's elements.
            beforeSend: function () {
                $('.alert-course').hide();
                $("#loader").show();
                $("#xoay").addClass('xoay');
            },
            success: function (data) {
                $("#loader").hide();
                $("#xoay").removeClass('xoay');
                $('#form-add .modal-body').html(data);
                // $('.modal-backdrop').remove();
                // $('#form-add').hide();
                // location.reload();
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
        console.log(checkStatus);
        $('#adminForm').find(':checkbox').each(function () {
            this.checked = checkStatus;
        });
    })
})

// change Status
function ajaxStatus(url) {
    $.get(url, function (data) {
        var element = ".content span#status-" + data['id'];
        if (data['status'] == 0) {
            $(element).attr({
                class: "glyphicon glyphicon-remove",
                onclick: "javascript:ajaxStatus('" + data['link'] + "')"
            });
        }
        else {
            $(element).attr({
                class: "glyphicon glyphicon-ok",
                onclick: "javascript:ajaxStatus('" + data['link'] + "')"
            });
        }
    }, 'json');
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

