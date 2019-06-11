<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include ("includes/link.php")?>
</head>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
< script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script> -->
<script src="BootstrapFontawesome/jquery/jquery.js"></script>

<body>

    <div class="container-fluit">
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-5">
            <a class="navbar-brand" href="#">Brand</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php?page=%">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Computer</a>
                    </li>
                    <li class="nav-item dropdown" id="menuMain">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Laptop
                        </a>
                        <div id="menuSub" class="dropdown-menu" style="top: 2.8em" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Apple</a>

                            <a class="dropdown-item" href="#">Hp</a>

                            <a class="dropdown-item" href="#">Dell</a>

                            <a class="dropdown-item" href="#">Acer</a>

                            <a class="dropdown-item" href="#">Asus</a>

                            <a class="dropdown-item" href="#">Other</a>
                        </div>
                    </li>

                    <form class="form-inline my-2 my-lg-0 nav-item dropdown" method="post">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </ul>
                <div>
                    <a class="nav-link text-white btn btn-success" href="" id="addToCart"><i class="fas fa-shopping-cart"></i><span class="badge badge-pill badge-primary">1</span></a>

                </div>
                <div>
                    <a class="nav-link text-dark" href="signup.php?page=sign" id="sign">Sign</a>
                </div>
                <div>
                    <a class="nav-link text-dark" href="admin.php?page=admin" id="log">admin</a>
                </div>
            </div>
        </nav>
    </div>
    <script src="../js/loadProduct.js"></script>

    <div id="center"></div>
    <div id="footer"></div>
</body>
<?php include ("includes/script.php")?>
<script src="js/loadAjaxChangeUrl.js"></script>

</html>