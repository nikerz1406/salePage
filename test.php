<?php
include ("includes/conn.php");
$pdo = new Database();
$conn = $pdo->open();
echo("haha1324<br>");
try{
        $email = $_POST["Email"];
        $stmt = $conn->prepare("select email,activeCode from user where 1");
        $stmt->execute(array(':email' => $email));
        $colCount = $stmt->rowCount();
        $row=$stmt->fetch();
        echo("activeCode<br>");
        var_dump($row);
        $row=$stmt->nextRowset();
        echo("nexRow<br>");
        
        ///
        $str ="123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
            $activeCode=substr(str_shuffle($str), 0, 8);

var_dump($activeCode);

   
        

       
        // check available email on table user
       

        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

// echo (checkEmail($_POST["email"]));
    $pdo->close();

?>