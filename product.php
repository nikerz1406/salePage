<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Product page</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <?php
        include ("includes/searchCategories.php");
    ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row mx-sm-4 my-sm-4">
            <?php
    //var_dump($_REQUEST); 
    
    $product = isset($_REQUEST["product"]) ? $_REQUEST["product"] : "%";

    $html = searchProduct($product);

    echo $html;

                ?>
        </div>
    </div>
</body>



</html>

<!--
    <div class="container-fluid">
        <div class="row mx-sm-4 my-sm-4">
            <?php
    // var_dump($_REQUEST); 
    
    // $product = isset($_REQUEST["product"]) ? $_REQUEST["product"] : "%";
    // $html = searchProduct($product);

    // echo $html;

                ?>
        </div>
    </div>
    -->