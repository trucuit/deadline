$(function () {
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

            success: function (data, status) {
                console.log(data);
                $('#modal-category-edit .modal-body').html(data);

            },
            complete: function () {
                // setTimeout(function () {
                //     location.reload();
                // }, 1000);

            }
        });
    });

    // submit form file ajax
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

    // $("button.close span").click(function () {
    //     location.reload();
    // })


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

function ajaxAdd(url) {
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

