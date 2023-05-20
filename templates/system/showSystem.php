<?php
require_once "templates/header.php";

?>

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
                <table class="table table-striped table-hover table-bordered table-responsive" data-bs-target="dark">
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
                        <?php
                        foreach ($result as $system) {
                            echo '<tr>';
                            echo '<td>'. $system->model .'</td>';
                            echo '<td>'. $system->sn. '</td>';
                            echo '<td>'. $system->status .'</td>';
                            echo '<td>'. $system->firm .'</td>';
                            echo '<td>'. $system->issue .'</td>';
                            echo '<td>'. $system->ticketed .'</td>';
                            echo '<td>'. $system->notes .'</td>';
                            echo '<td>';
                            echo '<button class="btn btn-outline-success" type="submit" value="'. $system->id .'" title="Edit">';
                            echo '<i class="bi bi-pencil"></i>';
                            echo '</button>';
                            echo '<button class="btn btn-outline-danger" type="submit" value="'. $system->id .'" title="Remove">';
                            echo '<i class="bi bi-trash"></i>';
                            echo '</button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                                              
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Temp Space -->
        <!-- <br><br><br><br><br>

        <div class="card" id="pin">
            <div class="card-header">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <h2 class="">Pinautomaten</h2>
                    </div>
                    <div class="col-4">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Sorteer
                            </button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">S/N
                                        <i class="bi bi-arrow-up"></i>
                                    </button>
                                </li>
                                <li><button class="dropdown-item" type="button">S/N
                                        <i class="bi bi-arrow-down"></i>
                                    </button>
                                </li>
                                <li><button class="dropdown-item" type="button">Hardware Status
                                        <i class="bi bi-arrow-up"></i>
                                    </button>
                                </li>
                                <li><button class="dropdown-item" type="button">Hardware Status
                                        <i class="bi bi-arrow-down"></i>
                                    </button>
                                </li>
                                <li><button class="dropdown-item" type="button">POI Status
                                        <i class="bi bi-arrow-up"></i>
                                    </button>
                                </li>
                                <li><button class="dropdown-item" type="button">POI Status
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
                            <th>S/N</th>
                            <th>Hardware Status</th>
                            <th>Firma</th>
                            <th>POI Status</th>
                            <th>Xenturion Status</th>
                            <th>Opmerkingen</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>000819430FFB</td>
                            <td>Defect Retour</td>
                            <td>Eqpos</td>
                            <td>Aangevraagd</td>
                            <td>NULL</td>
                            <td>Out of Order</td>
                            <td>
                                <button class="btn btn-outline-success" type='submit' title="Edit"><i
                                        class='bi bi-pencil'></i></button>
                                <button class="btn btn-outline-danger" type='submit' title="Remove"><i
                                        class='bi bi-trash'></i></button>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div> -->

    </main>
<?php
require_once "templates/footer.php";
?>
