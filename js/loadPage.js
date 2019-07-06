// load ajax home page
$(document).ready(function () {
    function loadDoc(page = "product.php", id = "center") {
        $.ajax({
            url: page,
            type: 'POST'
            //,dataType: 'html,script'
        }).done(function (html) {
            $("#" + id).html(html);
            // load js 
            switch (id) {
                case "header":
                default:
                    $.ajax({ url: "js/loadHeader.js" });
                    break;
                case "center":
                    $.ajax({ url: "js/loadCenter.js" });
                    break;
                case "footer":
                    break;
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