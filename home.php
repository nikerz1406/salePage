<body>

</body>
<html lang="en">
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Product page</title>
    <?php
        include ("includes/link.php");
        //include ("includes/goToIndex.php");
        include ("includes/session.php");
        include ("includes/saveCookie.php");
    ?>
</head>

<body>
    <div id="header"></div>
    <!-- <?php
    var_dump($_SERVER);
    ECHO "-----";
    var_dump($_REQUEST);
    ?>  -->
    <div class="container-fluid" id="center"></div>
    <div class="container-fluid bg-light" id="footer"></div>

</body>
<?php
include ("includes/script.php");
?>
<script src="BootstrapFontawesome/jquery/jquery.js"></script>

<script src="js/loadPage.js"></script>
<!-- <script src="js/loadAjax.js"></script> -->

</html>