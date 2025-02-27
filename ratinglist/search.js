$(document).ready(function () {
    $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $(".name").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

// $(document).ready(function($){
//     $('.name').each(function(){
//         $(this).attr('searchData', $(this).text().toLowerCase());
//     });
//     $('.boxSearch').on('keyup', function(){
//     var dataList = $(this).val().toLowerCase();
//         $('.name').each(function(){
//             if ($(this).filter('[searchData *= ' + dataList + ']').length > 0 || dataList.length < 1) {
//                 $(this).show();
//             } else {
//                 $(this).hide();
//             }
//         });
//     });
// });