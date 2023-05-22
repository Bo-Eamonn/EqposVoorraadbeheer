<?php echo '<!DOCTYPE html>'; ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="assets/js/colorTheme.js" defer></script>
    <script src="assets/js/createRowInsertForm.js" defer></script>
    <script src="assets/js/stockNotification.js" defer></script>
    <title>Document</title>

    <style>
        .arrow-hr {
            display: flex;
            align-items: center;
        }

        .arrow-icon {
            margin: 0 5px;
            color: #888;
        }

        .styled-hr {
            flex-grow: 1;
            border: none;
            height: 1px;
            background-color: #888;
        }
    </style>
</head>

<body class="<?php echo $_SESSION['role'];?>">
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-3 shadow-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navToggle"
                aria-controls="navToggle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-lg-flex" id="navToggle">
                <h1 class="navbar-brand col-lg-3 me-0" href="/">
                    <img src="assets/images/logowhite.png" id="logo" alt="" width="auto" height="75">
                </h1>
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item">
                        <form action="" method="post"><input type="submit" name="home" value="home"></input></form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            Kies Voorraad Soort</a>
                        <form action="" method="post">
                            <ul class="dropdown-menu">
                                <li class="position-relative">
                                    <input class="dropdown-item position-relative" type="submit" name="system"
                                        value="Kassasysteem">
                                    <?php
                                        if (!empty($stockSystems)) {
                                            $stockCountSystem = count($stockSystems);
                                            if ($stockCountSystem <= 5) {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-warning rounded-pill" title="Momenteel beschikbaar '. $stockCountSystem .'">
                                                      '. $stockCountSystem .'
                                                      </span>';
                                            } else {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-success rounded-pill" title="Momenteel beschikbaar '. $stockCountSystem .'">
                                                      '. $stockCountSystem .'
                                                      </span>';
                                            }
                                        } else {
                                            echo '<span class="position-absolute top-50 start-100 translate-middle p-2 bg-danger rounded-pill" title="Geen data"></span>';
                                        }
                                        ?>

                                    </input>
                                </li>
                                <li class="position-relative">
                                    <input class="dropdown-item" type="submit" name="pin" value="Pinautomaten">
                                    <?php
                                        if (!empty($stockPins)) {
                                            $stockCountPin = count($stockPin);
                                            if ($stockCountPin <= 5) {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-warning rounded-pill" title="Momenteel beschikbaar '. $stockCountPin .'">
                                                      '. $stockCountPin .'
                                                      </span>';
                                            } else {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-success rounded-pill" title="Momenteel beschikbaar '. $stockCountPin .'">
                                                      '. $stockCountPin .'
                                                      </span>';
                                            }
                                        } else {
                                            echo '<span class="position-absolute top-50 start-100 translate-middle p-2 bg-danger rounded-pill" title="Geen data"></span>';
                                        }
                                        ?>
                                    </input>
                                </li>
                                <li class="position-relative">
                                    <input class="dropdown-item" type="submit" name="hanheld" value="Handhelds">
                                    <?php
                                        if (!empty($stockHandHelds)) {
                                            $stockCountHandHeld = count($stockHandHeld);
                                            if ($stockCountHandHeld <= 5) {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-warning rounded-pill" title="Momenteel beschikbaar '. $stockCountHandHeld .'">
                                                      '. $stockCountHandHeld .'
                                                      </span>';
                                            } else {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-success rounded-pill" title="Momenteel beschikbaar '. $stockCountHandHeld .'">
                                                      '. $stockCountHandHeld .'
                                                      </span>';
                                            }
                                        } else {
                                            echo '<span class="position-absolute top-50 start-100 translate-middle p-2 bg-danger rounded-pill" title="Geen data"></span>';
                                        }
                                        ?>
                                    </input>
                                </li>
                                <li class="position-relative">
                                    <input class="dropdown-item" type="submit" name="flip" value="Fliptops">
                                    <?php
                                        if (!empty($stockFlipTops)) {
                                            $stockCountFlipTop = count($stockFlipTop);
                                            if ($stockCountFlipTop <= 5) {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-warning rounded-pill" title="Momenteel beschikbaar '. $stockCountFlipTop .'">
                                                      '. $stockCountFlipTop .'
                                                      </span>';
                                            } else {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-success rounded-pill" title="Momenteel beschikbaar '. $stockCountFlipTop .'">
                                                      '. $stockCountFlipTop .'
                                                      </span>';
                                            }
                                        } else {
                                            echo '<span class="position-absolute top-50 start-100 translate-middle p-2 bg-danger rounded-pill" title="Geen data"></span>';
                                        }
                                        ?>
                                    </input>
                                </li>
                                <li class="position-relative">
                                    <input class="dropdown-item" type="submit" name="drawer" value="Cash Drawer">
                                    <?php
                                        if (!empty($stockDrawers)) {
                                            $stockCountDrawer = count($stockDrawer);
                                            if ($stockCountDrawer <= 5) {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-warning rounded-pill" title="Momenteel beschikbaar '. $stockCountDrawer .'">
                                                      '. $stockCountDrawer .'
                                                      </span>';
                                            } else {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-success rounded-pill" title="Momenteel beschikbaar '. $stockCountDrawer .'">
                                                      '. $stockCountDrawer .'
                                                      </span>';
                                            }
                                        } else {
                                            echo '<span class="position-absolute top-50 start-100 translate-middle p-2 bg-danger rounded-pill" title="Geen data"></span>';
                                        }
                                        ?>
                                    </input>
                                </li>
                                <li class="position-relative">
                                    <input class="dropdown-item " type="submit" name="pc" value="PC">
                                    <?php
                                        if (!empty($stockPcs)) {
                                            $stockCountPc = count($stockPc);
                                            if ($stockCountPc <= 5) {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-warning rounded-pill" title="Momenteel beschikbaar '. $stockCountPc .'">
                                                      '. $stockCountPc .'
                                                      </span>';
                                            } else {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-success rounded-pill" title="Momenteel beschikbaar '. $stockCountPc .'">
                                                      '. $stockCountPc .'
                                                      </span>';
                                            }
                                        } else {
                                            echo '<span class="position-absolute top-50 start-100 translate-middle p-2 bg-danger rounded-pill" title="Geen data"></span>';
                                        }
                                        ?>
                                    </input>
                                </li>
                                <li class="position-relative">
                                    <input class="dropdown-item" type="submit" name="printer" value="Printers">
                                    <?php
                                        if (!empty($stockPrinters)) {
                                            $stockCountPrinter = count($stockPrinter);
                                            if ($stockCountPrinter <= 5) {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-warning rounded-pill" title="Momenteel beschikbaar '. $stockCountPrinter .'">
                                                      '. $stockCountPrinter .'
                                                      </span>';
                                            } else {
                                                echo '<span class="text-dark position-absolute top-50 start-100 translate-middle p-2 bg-success rounded-pill" title="Momenteel beschikbaar '. $stockCountPrinter .'">
                                                      '. $stockCountPrinter .'
                                                      </span>';
                                            }
                                        } else {
                                            echo '<span class="position-absolute top-50 start-100 translate-middle p-2 bg-danger rounded-pill" title="Geen data"></span>';
                                        }
                                        ?>
                                    </input>
                                </li>
                            </ul>
                    </li>
                    </li>

                </ul>
                </form>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    <form action="" method="post">
                        <input type="hidden" name="logout" value="0">
                        <input type="submit" id="logout" value="Uitloggen" class="btn btn-outline-danger">
                    </form>
                    <button class="btn btn-outline-light border border-1 shadow" id="btnSwitch">Switch theme <i
                            class="bi bi-brightness-low"></i></button>
                </div>
            </div>
        </div>
    </nav>