<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#712cf9">

    <!-- <link rel="stylesheet" href="styles.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <title>Document</title>
</head>
<body class="<?php echo $_SESSION['role']?>">
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navToggle"
                aria-controls="navToggle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex" id="navToggle">
                <h1 class="navbar-brand col-lg-3 me-0" href="/">Eqpos Voorraad</h1>
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            Kies Voorraad Soort</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#system">Kassasystemen</a></li>
                            <li><a class="dropdown-item" href="#pin">Pinautomaten</a></li>
                            <li>
                                <a class="dropdown-item position-relative" href="#mobile">
                                    Handhelds
                                    <!-- <span class="position-absolute top-50 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span> -->
                                </a>

                            </li>
                            <li><a class="dropdown-item" href="#flip">Fliptops</a></li>
                            <li><a class="dropdown-item" href="#drawer">Cash Drawer</a></li>
                            <li><a class="dropdown-item" href="#pc">pc</a></li>
                            <li><a class="dropdown-item" href="#pritner">Printers</a></li>
                        </ul>
                    </li>
                    </li>
                </ul>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    <form action="" method="post">
                        <input type="hidden" name="logout" value="0">
                        <input type="submit" id="logout" value="Uitloggen" class="btn btn-outline-danger">
                    </form>
                </div>
            </div>
        </div>
    </nav>