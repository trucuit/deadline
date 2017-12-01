$(function () {
// $('.nameCategory').click(function (event) {
//    // event.preventDefault();
//     console.log('hi');
//
//     var id=$(this).attr("id");
//    $.ajax({
//        url: ROOT_URL + 'default/courses/index',
//        type: 'POST',
//         data :{category_id: id},
//         success: function(data){
//             console.log("ji");
//         }
//
//     });
// });
    $('.name-video').click(function(){
        event.preventDefault();
        console.log("hi");
        var link=$(this).attr("link");
        var src="https://www.youtube.com/embed/" + link;
        $('.embed-responsive-item').attr("src",src);
    })
});