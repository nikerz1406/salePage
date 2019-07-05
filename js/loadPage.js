// load ajax home page
$(document).ready(function () {
    function loadDoc(page = "product.php", id = "center") {
        $.ajax({
            url: page,
            type: 'POST'
            //,dataType: 'html,script'
        }).done(function (html) {
            $("#" + id).html(html);
            if (id == "header") {
                $.ajax({ url: "js/loadAjax.js" });
            }

        });
    }

    // load ID header
    loadDoc("includes/header.php", "header");

    //load  ID footer
    loadDoc("includes/footer.php", "footer");

    //load  ID center
    loadDoc("product.php?product=%", "center");
});