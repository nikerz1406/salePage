// load ajax home page
$(document).ready(function () {
    function loadPage(page = "%", id = "center") {
        $.ajax({
            url: page,
            type: 'POST'
            //,dataType: 'html,script'
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
    addLoadProduct("#menu1", "Apple");
    addLoadProduct("#menu2", "Hp");
    addLoadProduct("#menu3", "Dell");
    addLoadProduct("#menu4", "Acer");
    addLoadProduct("#menu5", "Asus");
    addLoadProduct("#menu6", "Other");
});