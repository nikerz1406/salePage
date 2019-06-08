<?php
include ("includes/conn.php");

    // check email
    if(isset($_POST["submit"])){
        // recaptcha check
        if(isset($_POST["g-recaptcha-response"])){
    function getCaptcha($SerectKey){
        $Response =file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LftnKcUAAAAAFXckd-JOyEqlQMATzJZCYLK-IhI&response='.$SerectKey);
        $return =json_decode($Response);
        return $return;
    }
    $return =getCaptcha($_POST["g-recaptcha-response"]);

    if($return->success == true&&$return->score >0.5){
        $email=$_POST["email"];
        $password=password_hash($_POST["password"],PASSWORD_DEFAULT);
        $firstName=$_POST["firstName"];
        $lastName=$_POST["lastName"];
        $str=str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
        $activeCode=substr($str,0,8);
        
        $pdo = new Database();
        $conn = $pdo->open();
try{
        // check exist email
        $sql=" select 1 from user where email=:email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $result=$stmt->fetchAll();
        
        if(empty($result)){
        $sql ="INSERT INTO user (id, firstName, lastName, email, password, activeCode,statusId,roll,Create_tb,Update_tb) VALUES (NULL, :firstName, :lastName, :email, :password, :activeCode, '0', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':firstName'=>$firstName,':lastName'=>$lastName,':email'=>$email,':password'=>$password,':activeCode'=>$activeCode));
        $id = $conn->lastInsertId();
        // send mail
        //header('Location: http://localhost/phplearn/includes/sendMail.php?id='.$id.'&activeCode='.$activeCode.'&email='.$email);
        //$id,$activeCode,$email,$lastName,$template
        include("includes/sendMail.php");
        $name=$firstName." ".$lastName;
        $sendMail=sendMailPhpmailer($id,$activeCode,$email,$name);
        if($sendMail){
            header('Location: http://localhost/phplearn/login.php?alert=sendMailSuccess');
        }else{
            header('Location: http://localhost/phplearn/signup.php?alert=sendMailFail');
        }

        }else{
            if($result[0]['statusId']==1){
                header('Location: http://localhost/phplearn/signup.php?error=beenUsed');
            }else{
                header('Location: http://localhost/phplearn/signup.php?error=notActivated');
            }
            
        };//end check mail exist
        
        
    } catch (PDOException $e) {
        echo ("loi query ".$e->getMessage()." ".$e->getCode());
    }
    $pdo->close();
    }else{
        header('Location: http://localhost/phplearn/signup.php?error=failCaptCha');
    }
}//end check recaptcha
    
    }//end check submit

    //activeCode
    if(isset($_GET["id"])&&isset($_GET["activeCode"])){
        $id=$_GET["id"];
        $activeCode=$_GET["activeCode"];
        $pdo = new Database();
        $conn = $pdo->open();
        try{
        // check id and activeCode
        $sql=" select id,activeCode from user where id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $result=$stmt->fetchAll();
        
        if(!empty($result)){
            if($result[0]["activeCode"]==$activeCode){
                // update statusid
                $sql="UPDATE user SET activeCode= :activeCode,statusId= :statusId WHERE id=:id";
                $stmt = $conn->prepare($sql);
                $stmt->execute(array(':activeCode'=>'',':statusId'=>1,':id'=>$id));
                //alert success active
                header('Location: http://localhost/phplearn/login.php?alert=activeSuccess');
            }else{
                header('Location: http://localhost/phplearn/signup.php?alert=activeFail');
            }
        }else{
            header('Location: http://localhost/phplearn/signup.php?alert=activeFail');
        }
        
        
    } catch (PDOException $e) {
        echo ("loi query ".$e->getMessage()." ".$e->getCode());
    }
    $pdo->close();

    }


//header('Location: http://localhost/phplearn/signup.php?page=signup');
?>