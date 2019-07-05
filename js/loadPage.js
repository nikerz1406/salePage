// load ajax home page
$(document).ready(function () {
    function loadDoc(page = "%", id = "center") {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(id).innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", page, true);
        xhttp.send();
    }

    // load ID header
    loadDoc("includes/header.php", "header");

    //load  ID footer
    loadDoc("includes/footer.php", "footer");

    //load  ID center


    //get cookie by name
    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }

    // //rounter 
    var page = getCookie("page");

    switch (page) {
        case "signup":
            loadDoc("signup.php", "center");
            break;
        case "login":
            // loadDoc("login.php", "center");
            break;
        case "admin":
            loadDoc("productAdmin.php", "center");
            break;
        case "Apple":
            loadDoc("product.php?product=Apple", "center");
            break;
        case "Hp":
            loadDoc("product.php?product=Hp", "center");
            break;
        case "Asus":
            loadDoc("product.php?product=Asus", "center");
            break;
        case "Acer":
            loadDoc("product.php?product=Acer", "center");
            break;
        case "Other":
            loadDoc("product.php?product=Other", "center");
            break;
        case "Dell":
            loadDoc("product.php?product=Dell", "center");
            break;
        default:
            loadDoc("product.php", "center");
            break;
    }

});