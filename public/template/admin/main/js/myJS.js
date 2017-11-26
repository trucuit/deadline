$(function () {
    // add form file ajax course
    $('.form-add-course .submit-form').click(function (event) {
        event.preventDefault();
        id = this.id;
        name = $('#modal-add input[name="name"]').val();
        link = $('#modal-add input[name="link"]').val();
        category_id = $('#modal-add select[name="category_id"]').val();
        image = $('#modal-add input[name="image"]').prop('files')[0];
        var form_data = new FormData();
        form_data.append('form[name]', name);
        form_data.append('form[link]', link);
        form_data.append('form[category_id]', category_id);
        form_data.append('image', image);
        $.ajax({
            url: 'index.php?module=admin&controller=course&action=addAjax',
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
                $("#loader").hide();
                $("#xoay").removeClass('xoay');
                $('#modal-add .modal-body').html(data);
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

    // submit form  ajax course
    $('.form-edit-course .submit-form').click(function (event) {
        event.preventDefault();
        name = $('#modal-edit input[name="name"]').val();
        id = $('#modal-edit input[type="hidden"]').val();
        link = $('#modal-edit input[name="link"]').val();
        category_id = $('#modal-edit select[name="category_id"]').val();
        image = $('#modal-edit input[name="image"]').prop('files')[0];
        var form_data = new FormData();
        form_data.append('form[name]', name);
        form_data.append('form[link]', link);
        form_data.append('form[category_id]', category_id);
        form_data.append('image', image);
        form_data.append('id', id);
        $.ajax({
            url: 'index.php?module=admin&controller=course&action=ajaxEdit&id=' + id,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            beforeSend: function () {
                $('.alert-course').hide();
                $("#loader").show();
                $("#xoay").removeClass('xoay');
            },
            success: function (data, status) {
                $("#loader").hide();
                $("#xoay").removeClass('xoay');
                $('#modal-edit .modal-body').html(data);
            },
            complete: function () {
                ele = this;
                id = $(ele).attr('id');
                if (id == "save-close") {
                    if ($("#form-add .alert-success").length)
                        location.reload();
                }
            }
        });
    });

    // add form ajax video
    $('.form-add-video .submit-form').click(function (event) {
        event.preventDefault();
        id = this.id;
        dataForm = {
            'title': $('#form-add input[name="title"]').val(),
            'link': $('#form-add input[name="link"]').val(),
            'course_id': $('#form-add select[name="course_id"]').val(),
        };
        $.ajax({
            type: "POST",
            url: "index.php?module=admin&controller=video&action=addAjax",
            data: {form: dataForm},
            beforeSend: function () {
                $('.alert-course').hide();
                $("#loader").show();
                $("#xoay").addClass('xoay');
            },
            success: function (data) {
                $("#loader").hide();
                $("#xoay").removeClass('xoay');
                $('#modal-add .modal-body').html(data);
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

    // edit form ajax video
    $('.form-edit-video .submit-form').click(function (event) {
        event.preventDefault();
        dataForm = {
            'title': $('#form-edit input[name="title"]').val(),
            'link': $('#form-edit input[name="link"]').val(),
            'course_id': $('#form-edit select[name="course_id"]').val(),

        }
        id = $('#form-edit input[type="hidden"]').val();
        $.ajax({
            type: "POST",
            url: "index.php?module=admin&controller=video&action=editAjax&id=" + id,
            data: {form: dataForm, id: id},
            beforeSend: function () {
                $('.alert-course').hide();
                $("#loader").show();
                $("#xoay").addClass('xoay');
            },
            success: function (data) {
                $("#loader").hide();
                $("#xoay").removeClass('xoay');
                $('#modal-edit .modal-body').html(data);
            },
            complete: function () {
                ele = this;
                id = $(ele).attr('id');
                if (id == "save-close") {
                    if ($("#form-add .alert-success").length)
                        location.reload();
                }
            }
        });
    });

    $("button.close span").click(function () {
        location.reload();
    })

    // check All
    $('input[name=checkall-toggle]').change(function () {
        var checkStatus = this.checked;
        $('#adminForm').find(':checkbox').each(function () {
            this.checked = checkStatus;
            console.log(this.value);
        });
    })
})

//submit Form
function submitForm(url) {
    $('#adminForm').attr('action', url);
    $('#adminForm').submit();
}

function submitFormVideo(url) {
    url = url + "&id=" + getUrlVar("id");
    $('#adminForm').attr('action', url);
    $('#adminForm').submit();
}

function getUrlVar(key) {
    var result = new RegExp(key + "=([^&]*)", "i").exec(window.location.search);
    return result && unescape(result[1]) || "";
}

// change Status
function ajaxStatus(url) {
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data);
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
        }
    });

}

// xem hình ảnh trước khi submit
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

// ajaxEdit
function ajaxEdit(url) {
    console.log(url);
    $.get(url, function (data) {
        $('#modal-edit .modal-body').html(data);
    })
}

//ajaxAdd
function ajaxAdd(url) {
    $.get(url, function (data) {
        $('#modal-add .modal-body').html(data);
    })
}


// ajax Delete
function ajaxDelete(url) {
    $.get(url, function (data) {
        $(".category .success").html(data);
    });
}

