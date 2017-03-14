$(function () {
    $(".translate").click(function () {
        var text = $(this).closest('div').find("p.messages").html();
        var trans = $(this).closest('div').find("small.trans_string");
        //alert(text);

        $.post("translator.php", {'text' : text}, function (result) {
            $(trans).html(result);
        })
    })
})
