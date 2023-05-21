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
                            echo '<form action="" method="post">';
                            echo '<button class="btn btn-outline-success" type="submit" value="'. $system->id .'" name="showUpdateSystem" title="Edit">';
                            echo '<i class="bi bi-pencil"></i>';
                            echo '</button>';
                            echo '<!-- Button trigger modal -->';
                            echo '<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#systemModal'. $system->id .'">';
                            echo '<i class="bi bi-trash"></i>';
                            echo '</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                            echo '<!-- Modal'. $system->id .' -->
                            <div class="modal fade" id="systemModal'. $system->id .'" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Weet je het zeker?</h1>
                            </div>
                            <div class="modal-body">
                                <p>Weet je het zeker om systeem <b>'. $system->model .'</b> met serie nummer <b>'. $system->sn .'</b> te verwijderen?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="" method="post" class="container-fluid row">
                                <button type="button" class="col-sm align-self-start btn btn-success " data-bs-dismiss="modal">Annuleer</button>
                                <button type="submit" class="col-sm align-self-end btn btn-danger" type="submit" value="'. $system->id .'" name="deleteSystem" title="Remove"><i class="bi bi-trash"></i> Verwijder</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
                        }
?>

            </table>
        </div>
    </div>
</main>
<?php
require_once "templates/footer.php";
?>