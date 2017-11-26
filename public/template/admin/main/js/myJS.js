$(function () {

    // add form file ajax course
    $('#form-add .submit-form').click(function (event) {
        event.preventDefault();

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
            },
            success: function (data, status) {
                $("#loader").hide();
                $('#modal-add .modal-body').html(data);
            },
            complete: function () {
                // ele = this;
                // id = $(ele).attr('id');
                // if (id = "save-close") {
                //     location.reload();
                // }
            }
        });
    });

    // submit form  ajax
    $('.course .submit-form').click(function (event) {
        event.preventDefault();
        dataForm = {
            'name': $('.edit-modal input[name="name"]').val(),
            'link': $('.edit-modal input[name="link"]').val(),
            'category_id': $('.edit-modal select[name="category_id"]').val(),
            'id': $('.edit-modal input[name="id"]').val(),
        }
        $.ajax({
            type: "POST",
            url: "index.php?module=admin&controller=course&action=ajaxEditCourse",
            data: {form: dataForm, id: dataForm['id']}, // serializes the form's elements.
            success: function (data) {
                $('#modal-category-edit .modal-body').html(data);
            }
        });
    });

    $("button.close span").click(function () {
        location.reload();
    })


    // check All
    $('input[name=checkall-toggle]').change(function () {
        var checkStatus = this.checked;
        console.log(checkStatus);
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
        success: function (data) {
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

// ajaxEdit
function ajaxEdit(url) {
    console.log(url);
    $.get(url, function (data) {
        $('#modal-category-edit .modal-body').html(data);
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

