<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthOne | Show Medicijnen</title>
    <link rel="stylesheet" href="/HealthOne_MVC/assets/css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<?php
require_once "templates/header.php";
require_once "templates/nav.php";
?>
<main>
<main class="p-5">
        <div class="card" id="system">
            <div class="card-header">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <h2 class="">Kassasystemen Jassway</h2>
                    </div>
                    <div class="col-4">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Sorteer
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <button class="dropdown-item" type="button">S/N
                                        <i class="bi bi-arrow-up"></i>
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="button">S/N
                                        <i class="bi bi-arrow-down"></i>
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="button">Status
                                        <i class="bi bi-arrow-up"></i>
                                    </button>
                                </li>
                                <li>
                                    <button class="dropdown-item" type="button">Status
                                        <i class="bi bi-arrow-down"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-dark table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Model</th>
                            <th>S/N</th>
                            <th>Status</th>
                            <th>Firma</th>
                            <th>Bijzonderheden</th>
                            <th>Ticketed</th>
                            <th>Opmerkingen</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>HADES</td>
                            <td>JWE20220420225</td>
                            <td>Defect Retour</td>
                            <td>Test</td>
                            <td>Geen klanten scherm</td>
                            <td>Ja</td>
                            <td>NULL</td>
                            <td>
                                <button class="btn btn-outline-success" type='submit' title="Edit"><i
                                        class='bi bi-pencil'></i></button>
                                <button class="btn btn-outline-danger" type='submit' title="Remove"><i
                                        class='bi bi-trash'></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>HADES</td>
                            <td>JWE20220420225</td>
                            <td>Beschikbaar</td>
                            <td>Test</td>
                            <td>Geen klanten scherm</td>
                            <td>Ja</td>
                            <td>NULL</td>
                            <td>
                                <button class="btn btn-outline-success" type='submit' title="Edit"><i
                                        class='bi bi-pencil'></i></button>
                                <button class="btn btn-outline-danger" type='submit' title="Remove"><i
                                        class='bi bi-trash'></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>HADES</td>
                            <td>JWE20220420225</td>
                            <td>Beschikbaar</td>
                            <td>Test</td>
                            <td>Geen klanten scherm</td>
                            <td>Ja</td>
                            <td>NULL</td>
                            <td>
                                <button class="btn btn-outline-success" type='submit' title="Edit">
                                    <i class='bi bi-pencil'></i>
                                </button>
                                <button class="btn btn-outline-danger" type='submit' title="Remove">
                                    <i class='bi bi-trash'></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
</main>
<?php
require_once "templates/footer.php";
?>
