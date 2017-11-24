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
                $('#modal-category-edit .modal-body').html(data);

            },
            complete: function () {
                // setTimeout(function () {
                //     location.reload();
                // }, 1000);

            }
        });
    });

    // submit new form fiel ajax
    $('#form-add .submit-add').click(function (event) {
        event.preventDefault();
        var dataForm = {
            'name': $('#form-add input[name="name"]').val(),
            'status': $('#form-add select[name="status"]').val(),


        }
        $.ajax({
            type: "POST",
            url: "index.php?module=admin&controller=category&action=ajaxAdd",
            data: {form: dataForm}, // serializes the form's elements.
            success: function (data) {

                $('#form-add .modal-body').html(data);
            }
        });
    });
    // /.submit form fiel ajax
    //submit close form field ajax
    $('#form-add .submit-close').click(function (event) {
        event.preventDefault();
        var dataForm = {
            'name': $('#form-add input[name="name"]').val(),
            'status': $('#form-add select[name="status"]').val(),


        }
        $.ajax({
            type: "POST",
            url: "index.php?module=admin&controller=category&action=ajaxAdd",
            data: {form: dataForm}, // serializes the form's elements.
            success: function (data) {

                $('#form-add .modal-body').html(data);
                $('.modal-backdrop').remove();
                $('#form-add').hide();
                location.reload();
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
    // /.check All
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
// /.change Status

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
// /.send File Ajax

// ajaxAdd

function ajaxAdd(url) {

    $.get(url, function (data) {
        $('#modal-add .modal-body').html(data);
    })


}
//ajaxActive
function ajaxActive(url) {
    console.log(url);
    $.get(url,function(data){
        console.log(data);
        $('#modal-add .modal-body').html(data);
    })

}
// /.ajaxEdit
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
// /.ajax Delete

