<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
include "includes/captcha.php";
include "includes/link.php";
?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY ?>"></script>
    <script src="js/signup.js"></script>
    <?php
include "includes/saveCookie.php";
?>
    <title>Document</title>
</head>

<body>
    <div id="header"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 align-self-center my-5">
                <h1 class="display-4">SIGN UP</h1>
                <hr class="my-3">
                <?php
if (isset($_REQUEST["error"])) {
    if ($_REQUEST["error"] == "notActivated") {
        echo ('<h6 class="display-10 text-danger">Email is registration, you must activated it</h6>');
    }
    if ($_REQUEST["error"] == "beenUsed") {
        echo ('<h6 class="display-10 text-danger">This email have been used</h6>');
    }
    if ($_REQUEST["error"] == "failCaptCha") {
        echo ('<h6 class="display-10 text-danger">Fail CaptCha</h6>');
    }
    // switch($_REQUEST["error"]){
    //     case "notActivated":
    //     break;
    //     default:
    // }
}
if (isset($_REQUEST["alert"])) {
    if ($_REQUEST["alert"] == "sendMailFail") {
        echo ('<h6 class="display-10 text-danger">Send mail fail</h6>');
    }
}
?>

                <form action="register.php" method="POST" accept-charset="UTF-8">
                    <div class="row">
                        <div class="col form-group">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" name="firstName" placeholder="Invalid special characters" required pattern='^[\w|ạ|ị|ọ|ụ|ẹ|ự|ậ|ặ|ợ|ộ|ệ|ã|ĩ|õ|ũ|ẽ|ữ|ẫ|ẵ|ỡ|ỗ|ễ|||ả|ỉ|ỏ|ủ|ẻ|ử|ẩ|ẳ|ờ|ổ|ể|à|ì|ò|ù|è|ừ|ầ|ằ|ờ|ồ|ề|á|í|ó|ú|é|ứ|ấ|ắ|ớ|ố|ế|ư|â|ă|ơ|ô|ê|đ]{1,32}$'>
                        </div>
                        <div class="col form-group">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" name="lastName" placeholder="Invalid special characters" required pattern='^[\w|ạ|ị|ọ|ụ|ẹ|ự|ậ|ặ|ợ|ộ|ệ|ã|ĩ|õ|ũ|ẽ|ữ|ẫ|ẵ|ỡ|ỗ|ễ|||ả|ỉ|ỏ|ủ|ẻ|ử|ẩ|ẳ|ờ|ổ|ể|à|ì|ò|ù|è|ừ|ầ|ằ|ờ|ồ|ề|á|í|ó|ú|é|ứ|ấ|ắ|ớ|ố|ế|ư|â|ă|ơ|ô|ê|đ]{1,32}$'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="example@gmail.com" pattern='^[\w|\.]{4,32}@\w{2,}(\.\w{2,4}){1,2}$' required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Your password has 6-20 characters" required pattern='^.{6,20}$'>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id='g-recaptcha-response' name='g-recaptcha-response'>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light" id="footer"></div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
< script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity = "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin = "anonymous" >
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/loadPage.js"></script>
<?php
include "includes/script.php";
?>
</script>


</html>