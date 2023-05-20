<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#712cf9">

    <link rel="stylesheet" href="styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

        <script src="assets/js/pswrdToggle.js" defer></script>
        <script src="assets/js/colorTheme.js" defer></script>

    <title>Eqpos Voorraad Beheer inloggen</title>
</head>

<body class="text-center">

    <main class="position-absolute top-50 start-50 translate-middle justify-content-center">
        <form action="" method="POST" class="border border-3 rounded-4 p-5 shadow-lg">
            <img class="mb-4" src="assets/images/logoblack.png" id="logo" alt="" width="auto" height="75">
            <h1 class="h3 mb-3 fw-normal">Voorraad Beheer</h1>

            <div class="mb-3 ">
                <input type="text" placeholder="Gebruikersnaam" autocomplete="off" name="uname" required="required"
                id="uname" class="form-control border border-1 rounded-1 border-black">
            </div>
            <div class="mb-3 input-group">
                <input type="password" placeholder="Wachtwoord" autocomplete="off" name="pswrd" required="required"
                    id="pswrd" class="form-control border border-end-0 border-1 rounded-start-1 border-black">
                    <i class="bi bi-eye input-group-text border border-start-0 border-1 rounded-end-1 border-black" id="pswrdToggle"></i>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="inloggen" type="submit">Sign in</button>
        </form>


        
    </main>
    <button class="btn btn-dark shadow position-absolute bottom-0 end-0" id="btnSwitch">Toggle Mode</button>
    

</body>

</html>