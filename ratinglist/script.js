$("#name").on("keyup", function (e) {
    //13  means enter button
    if (e.keyCode == 13 && $("#name").val() != "") {
        var name = $("<div class='name'></div>").text($("#name").val());
        var del = $("<i class='fas fa-trash-alt'></i>").click(function () {
            var p = $(this).parent();
            p.fadeOut(function () {
                p.remove();
            });
        });

        var check = $("<i class='fas fa-check'></i>").click(function () {
            var p = $(this).parent();
            p.fadeOut(function(){
            $(".comp").append(p);
            p.fadeIn();
            });
            $(this).remove();
        });

        name.append(del, check);
        $(".judul").append(name);
        //to clear the input
        $("#name").val("");
    }
});

$("#rating").on("keyup", function (e) {
    //13  means enter button
    if (e.keyCode == 13 && $("#rating").val() != "") {
        var rate = $("<div class='rate'></div>").text($("#rating").val());
        var del = $("<i class='fas fa-trash-alt'></i>").click(function () {
            var p = $(this).parent();
            p.fadeOut(function () {
                p.remove();
            });
        });

        var check = $("<i class='fas fa-check'></i>").click(function () {
            var p = $(this).parent();
            p.fadeOut(function(){
            $(".comp").append(p);
            p.fadeIn();
            });
            $(this).remove();
        });

        rate.append(del, check);
        $(".rating").append(rate);
        //to clear the input
        $("#rating").val("");
    }
});











// $(document).ready(function(){
//     $('#name').change(function(){
//         var name = $(this).val();
//         $('#title').append('<th>' + name +'</th>');
//         $(this).val('');
//     });
// });

// $(document).ready(function(){
//     $('#rating').change(function(){
//         var rating = $(this).val();
//         $('#nilai').append('<ul>' + rating + <i class="fas fa-trash-alt"></i> + '<ul>')
//         $(this).val('');
//     });
// });