<?php
include "includes/session.php";

// you can insert more value you when check when you update system
$arrayCheck = array(
    'firstName',
    'lastName',
    'email',
    'password'
);
// check sql injection
require "includes/checkSqlInjection.php";
checkInjection($arrayCheck);

// check email
if (isset($_POST["submit"])) {
    // recaptcha check
    if (isset($_POST["g-recaptcha-response"])) {
        function getCaptcha($SerectKey)
        {
            $Response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LftnKcUAAAAAFXckd-JOyEqlQMATzJZCYLK-IhI&response=' . $SerectKey);
            $return   = json_decode($Response);
            return $return;
        }
        $return = getCaptcha($_POST["g-recaptcha-response"]);
        
        if ($return->success == true && $return->score > 0.5) {
            $email      = $_POST["email"];
            $password   = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $firstName  = $_POST["firstName"];
            $lastName   = $_POST["lastName"];
            $str        = str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
            $activeCode = substr($str, 0, 8);
            
            $conn = new Database();
            try {
                // check exist email
                $field     = "statusId";
                $table     = "user";
                $condition = array(
                    "email" => $email
                );
                $result    = $conn->select($field, $table, $condition);
                // save data
                if (empty($result)) {
                    $data = array(
                        'id' => null,
                        'firstName' => $firstName,
                        'lastName' => $lastName,
                        'email' => $email,
                        'password' => $password,
                        'activeCode' => $activeCode,
                        'statusId' => 0,
                        'roll' => 1
                    );
                    $view = $conn->insert($table, $data, 1);
                    $id   = $view[0]['id'];
                    // send mail
                    include "includes/sendMail.php";
                    $name     = $firstName . " " . $lastName;
                    $sendMail = sendMailPhpmailer($id, $activeCode, $email, $name);
                    if ($sendMail) {
                        header('Location: http://localhost/salePage/login.php?alert=sendMailSuccess');
                    } else {
                        header('Location: http://localhost/salePage/signup.php?alert=sendMailFail');
                        
                    }
                    
                } else {
                    if ($result[0]['statusId'] == 1) {
                        header('Location: http://localhost/salePage/signup.php?error=beenUsed');
                        
                    } else {
                        header('Location: http://localhost/salePage/signup.php?error=notActivated');
                    }
                    
                }
                ; //end check mail exist
                
            }
            catch (PDOException $e) {
                echo ("loi query " . $e->getMessage() . " " . $e->getCode());
            }
            
        } else {
            header('Location: http://localhost/salePage/signup.php?error=failCaptCha');
            //var_dump($return);
        }
    } //end check recaptcha
    
} //end check submit

//activeCode
if (isset($_GET["id"]) && isset($_GET["activeCode"])) {
    $id         = $_GET["id"];
    $activeCode = $_GET["activeCode"];
    $conn       = new Database();
    try {
        // check id and activeCode
        $field     = "id,activeCode";
        $table     = "user";
        $condition = "id =" . $id;
        $result    = $conn->select($field, $table, $condition);
        if (!empty($result)) {
            if ($result[0]["activeCode"] == $activeCode) {
                // update statusid
                $data      = array(
                    'activeCode' => '',
                    'statusId' => 1,
                    'id' => $id
                );
                $condition = array(
                    'id' => $id
                );
                $conn->update($table, $data, $condition);
                //alert success active
                header('Location: http://localhost/salePage/login.php?alert=activeSuccess');
            } else {
                header('Location: http://localhost/salePage/signup.php?alert=activeFail');
            }
        } else {
            header('Location: http://localhost/salePage/signup.php?alert=activeFail');
        }
        
    }
    catch (PDOException $e) {
        echo ("loi query " . $e->getMessage() . " " . $e->getCode());
    }
    
}