<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    define('SITE_KEY','6LftnKcUAAAAAPuntM8pMSeZ0yj7hROBtbiVzNdl');
    define('SECRET_KEY','6LftnKcUAAAAAFXckd-JOyEqlQMATzJZCYLK-IhI');
var_dump($_POST);
if(isset($_POST["g-recaptcha-response"])){
    function getCaptcha($SerectKey){
        $Response =file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.SECRET_KEY.'&response='.$SerectKey);
        $result =json_decode($Response);
        return $result;
    }
    $result =getCaptcha($_POST["g-recaptcha-response"]);
var_dump($result);
    if($result->success==true&&$result->score >0.5){
      echo ("haha");
    }else{
      echo ("haha1");
    }
}
    ?>
    <title>Document</title>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY?>"></script>
    <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LftnKcUAAAAAPuntM8pMSeZ0yj7hROBtbiVzNdl', {
            action: 'homepage'
        }).then(function(token) {
            //console.log(token);
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
    </script>
</head>

<body>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="example@gmail.com" pattern='^[\w|\.]{4,32}@\w{2,}(\.\w{2,4}){1,2}$' required>
        </div>
        <div class="form-group">
            <input type="text" id='g-recaptcha-response' name='g-recaptcha-response'>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</body>

</html>