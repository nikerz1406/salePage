<?php
// site key 6LftnKcUAAAAAPuntM8pMSeZ0yj7hROBtbiVzNdl
// secret key 6LftnKcUAAAAAFXckd-JOyEqlQMATzJZCYLK-IhI
define('SITE_KEY','6LftnKcUAAAAAPuntM8pMSeZ0yj7hROBtbiVzNdl');
define('SECRET_KEY','6LftnKcUAAAAAFXckd-JOyEqlQMATzJZCYLK-IhI');

// if(isset($_POST["g-recaptcha-response"])){
//     function getCaptcha($SerectKey){
//         $_Response =file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret'.SECRET_KEY.'&respone='.$SerectKey);
//         $result =json_decode($_Response);
//         return $result;
//     }
//     $result =getCaptcha($_POST["g-recaptcha-response"]);
// }
?>