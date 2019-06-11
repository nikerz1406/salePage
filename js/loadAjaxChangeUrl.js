// load ajax home page
$(document).ready(function () {
    function loadPage(page, id = "center") {
        $.ajax({
            url: page,
            method: "POST",
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            cache: false

        }).done(function (html) {
            $("#" + id).html(html);

        });
        //history.pushState({}, "", page);
    }//end loadPage

    // load ID header
    loadPage("includes/header.php", "header");

    //load  ID footer
    loadPage("includes/footer.php", "footer");

    //load  ID center
    loadPage("product.php?product=%", "center");

    function addLoadProduct(id, product) {
        var page = "product.php?product=" + product;
        var home = "home.php/product=" + product;
        $(id).on("click", function () { loadPage(page); history.pushState({}, "", home); });

    };
    addLoadProduct("#menuSub>a:nth-child(1)", "Apple");
    addLoadProduct("#menuSub>a:nth-child(2)", "Hp");
    addLoadProduct("#menuSub>a:nth-child(3)", "Dell");
    addLoadProduct("#menuSub>a:nth-child(4)", "Acer");
    addLoadProduct("#menuSub>a:nth-child(5)", "Asus");
    addLoadProduct("#menuSub>a:nth-child(6)", "Other");
});