<?php
 include ("includes/session.php");
function loadProductTable(){

$pdo = new Database();
// open connect 
    $conn = $pdo->open();

    try{
        // $stmt = $conn->prepare("select Name,Price,CONVERT(Description USING utf8) as Description,photo from product");
        // $stmt->execute();
        $sql = 'select Id,Name,Price,Quantity,CONVERT(Description USING utf8) as Description,photo from product where 1 limit 10';
        $html ="<h1>Product table<h1>";
        foreach($conn->query($sql) as $value){
            
            $html .='
    <tr>
    <th scope="row">'.$value["Id"].'</th>
    <td>'.$value["Name"].'</td>
    <td>'.number_format($value["Price"]).'</td>
    <td>'.$value["Quantity"].'</td>
    <td>'.$value["Description"].'</td>
    </tr>';
           
        }
        
    } catch (PDOException $e) {
        echo "Something wrong!";
    }
    $html='<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Description</th>
            </tr>
        </thead>
    <tbody>
        '.$html.'
        </tbody>
    </table>';
    return $html;
    $pdo->close();
}



// include ("includes/session.php");
// function loadProductTable(){

// $pdo = new Database();
// open connect
// $conn = $pdo->open();

// try{
// $stmt = $conn->prepare("select Name,Price,CONVERT(Description USING utf8) as Description,photo from product");
// $stmt->execute();
// $sql = 'select Id,Name,Price,Quantity,CONVERT(Description USING utf8) as Description,photo from product where 1';
// $html ="";
// foreach($conn->query($sql) as $value){

// $html .='
// <tr>
    // <th scope="row">'.$value["Id"].'</th>
    // <td>'.$value["Name"].'</td>
    // <td>'.$value["Price"].'</td>
    // <td>'.$value["Quantity"].'</td>
    // <td>'.$value["Description"].'</td>

    // </tr>'
// ;

// }

// } catch (PDOException $e) {
// echo "Something wrong!";
// }
// $html='<table class="table">
//     <thead>
//         <tr>
//             <th scope="col">ID</th>
//             <th scope="col">Name</th>
//             <th scope="col">Price</th>
//             <th scope="col">Quantity</th>
//             <th scope="col">Description</th>
//             </tr>
//         </thead>
//     <tbody>
//         '.$html.'
//         </tbody>
//     </table>';
// return $html;
// $pdo->close();
// }
?>