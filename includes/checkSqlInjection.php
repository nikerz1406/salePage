<?php
function checkInjection($arrayCheck){
 // check post
try {
    if (empty($_POST)) {
        foreach ($arrayCheck as $value) {
            if (isset($_POST[$value])) {
                $_POST[$value] = getRequestString($_POST[$value]);
            }
        }
    }
} catch (exception $e) {
    //code to handle the exception
}
    // check get
try {
    if (empty($_GET)) {
        foreach ($arrayCheck as $value) {
            if (isset($_GET[$value])) {
                $_GET[$value] = getRequestString($_GET[$value]);
            }
        }
    }
} catch (exception $e) {
    //code to handle the exception
}
    // check request
try {
    if (empty($_REQUEST)) {
        foreach ($arrayCheck as $value) {
            if (isset($_REQUEST[$value])) {
                $_REQUEST[$value] = getRequestString($_REQUEST[$value]);
            }
        }
    }
} catch (exception $e) {
    //code to handle the exception
}
}//end fn checkInjection
?>