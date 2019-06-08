<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div id="header"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 align-self-center my-5">
                <h1 class="display-4">LOGIN PAGE</h1>
                <hr class="my-3">
                <form action="home.php" method="POST">
                    <div class="form-group">
                        <label for="username">User name</label>
                        <input type="text" class="form-control" name="username" placeholder="Your account" pattern='^.{5,20}$' required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Your password has 6-30 characters" required pattern='^.{6,20}$'>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div id="else">
                        <?php
                    if(isset($_REQUEST["login"])){
                        if($_REQUEST["login"]=="fail"){
echo("<h4 class='text-danger'>Login fail<h4>");
                        }    
                    }
                    if(isset($_REQUEST["alert"])){
                        if($_REQUEST["alert"]=="sendMailSuccess"){
echo("<h4 class='text-success'>send mail success<h4>");
                        }
                        if($_REQUEST["alert"]=="activeFail"){
echo("<h4 class='text-success'>Activetion fail, you should resend new active<h4>");
                        }
                        if($_REQUEST["alert"]=="activeSuccess"){
echo("<h4 class='text-success'>Activetion success, you can login now<h4>");
                        } 
                    }
                    ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light" id="footer"></div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>