<link href="BootstrapFontawesome/fontawesome-free-5.9.0-web/css/all.min.css" rel="stylesheet">

<link href="BootstrapFontawesome/fontawesome-free-5.9.0-web/css/fontawesome.min.css" rel="stylesheet">

<link href="BootstrapFontawesome/fontawesome-free-5.9.0-web/css/brands.min.css" rel="stylesheet">

<link href="BootstrapFontawesome/fontawesome-free-5.9.0-web/css/solid.min.css" rel="stylesheet">

<link rel="stylesheet" href="BootstrapFontawesome/bootstrap-4.3.1-dist/css/bootstrap.min.css">

<link rel="stylesheet" href="BootstrapFontawesome/bootstrap-4.3.1-dist/css/bootstrap-grid.min.css">

<link rel="stylesheet" href="BootstrapFontawesome/bootstrap-4.3.1-dist/css/bootstrap-reboot.min.css">

<div id="header" class="container-fluit">
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
                    <div class="dropdown-menu" style="top: 2.8em" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="home.php?page=Apple">Apple</a>

                        <a class="dropdown-item" href="home.php?page=Hp">Hp</a>

                        <a class="dropdown-item" href="home.php?page=Dell">Dell</a>

                        <a class="dropdown-item" href="home.php?page=Acer">Acer</a>

                        <a class="dropdown-item" href="home.php?page=Asus">Asus</a>

                        <a class="dropdown-item" href="home.php?page=Other">Other</a>
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