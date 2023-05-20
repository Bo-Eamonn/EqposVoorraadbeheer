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