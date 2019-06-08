<?php
function searchProduct($product="%"){
include ("includes/database.php");
$conn = new Database();
$html ="";
$table = "product";
if($product=="%"){
$condition = "productType like '".$product."'";
}else{
  $condition ="productType ='".$product."'";
}

$field = "Name,Price,CONVERT(Description USING utf8) as Description,photo";

$result = $conn->select($field,$table,$condition);

 foreach($result as $value){
          $html .='
            <div class="col-4 text-center">
              <div class=" my-sm-3">
                <img src="img/'.$value["photo"].'" class="card-img-top px-sm-4 py-sm-4" style="width:20em;height:15em" alt="'.$value["photo"].'">
                <div class="card-body ">
                  <h5 class="card-title">'.$value["Name"].'</h5>
                  <h6 class="card-text">'.number_format($value["Price"]).' VND</h6>
                  <p class="card-text">'.$value["Description"].'</p>
                  <a href="#" class="btn btn-primary my-md-3 addToCart">Add to cart</a>
                </div>
              </div>
            </div>';              
  }
  return $html;
}
?>