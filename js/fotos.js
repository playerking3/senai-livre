$(document).ready(function() {
    $(".imghover").on("click", function() {
        var img = $(this).data("img");
        $(".imagem").css("background-image", 'url(' + img + ')')
    })
});