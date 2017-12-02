$(function () {

    // show - hide back to top
    $(window).scroll(function () {
        if ($("html").scrollTop() > screen.height)
            $(".back-to-top i").show();
        else {
            $(".back-to-top i").hide();
        }
    });

    $(".back-to-top i").click(function () {
        $('html,body').animate({
            scrollTop: 0
        }, 1000);
        return 0;
    })

    // Active Category
    $("#categories-content li.category-" + getUrlVar("id")).addClass("current");
})

//submit Form
function submitForm(url) {
    $('#adminForm').attr('action', url);
    $('#adminForm').submit();
}

//get URL
function getUrlVar(key) {
    var result = new RegExp(key + "=([^&]*)", "i").exec(window.location.href);
    return result && unescape(result[1]) || "";
}

