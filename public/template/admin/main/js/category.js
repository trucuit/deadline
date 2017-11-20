$(function () {

})
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

function ajaxEdit(url) {
    $.get(url,function (data) {
        console.log(url);
       $('#modal-category-edit .modal-body').html(data);
    })
}