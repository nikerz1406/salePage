$(document).ready(function () {
    function addToCart(event) {
        event.preventDefault();
        var i = $("#addToCart>span").text(); i++;
        $("#addToCart>span").text(i);
    }
    $(".addToCart").each(function () {
        $(this).click(function () { addToCart(event); });
    }
})