$(function () {

//     js outline
    var temp = " ";
    $('.name-video').click(function () {
        event.preventDefault();
        $('html,body').animate({scrollTop: 250}, 500);
        var pre = $(this).attr("id");
        var id = "#" + pre;
        if (temp == " " || temp == pre) {
            $(id).parents(".o-view").addClass("active");
            $(id).parents(".o-view").children(".count").addClass("active");
            temp = pre;
        }
        else if (temp != pre) {
            var temp_id = "#" + temp;
            $(temp_id).parents(".o-view").removeClass("active");
            $(temp_id).parents(".o-view").children(".count").removeClass("active");
            $(id).parents(".o-view").addClass("active");
            $(id).parents(".o-view").children(".count").addClass("active");
            temp = pre;
        }
        $(this).parents(".list-body").children(".div-x").children().addClass("md-check-2");

        var link = $(this).attr("link");
        var src = "https://www.youtube.com/embed/" + link;
        $('.embed-responsive-item').attr("src", src);
        $.ajax({
            url: ROOT_URL + '/index.php?module=default&controller=course&action=setCookieView',
            type: 'POST',
            data: {videoId: pre},
            success: function (data) {
                console.log(data);
            }
        })
    })
    // end js outline


});
