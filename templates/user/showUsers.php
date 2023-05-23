<?php
require_once "templates/header.php";

?>

<main class="p-5">
    <div class="card" id="system">
        <div class="card-header">
            <div class="row text-center">
                <div class="col-4 justify-content-center">
                <form action="" method="post">
                    <button type="submit" class="btn btn-success border-3" name="showAddUser">Nieuwe Gebruiker</button>
                </form>
                </div>
                <div class="col-4">
                    <h2 class="">Gebruikers</h2>
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered table-responsive" data-bs-target="dark">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                if (empty($result)) {
                    echo '<p>No data to display.</p>';
                } else {
                    foreach ($result as $user) {
                        echo '<tr>';    
                        echo '<td>' . $user->getUname() . ' </td>';
                        echo '<td>' . $user->getRole() . ' </td>';
                        echo '<td>';
                        echo '<form action="" method="post">';
                        echo '<button class="btn btn-outline-success" type="submit" name="editUser" title="Edit" value="'. $user->getID() .'">';
                        echo '<i class="bi bi-pencil"></i>';
                        echo '</button>';
                        echo '<!-- Button trigger modal -->';
                        echo '<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#userModal'. $user->getID() .'">';
                        echo '<i class="bi bi-trash"></i>';
                        echo '</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                        if ($_SESSION['role'] === $user->getRole()){
                            echo '<!-- Modal'. $user->getID() .' -->
                        <div class="modal fade" id="userModal'. $user->getID() .'" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">Dit is niet mogelijk!</h1>
                                    </div>
                                    <div class="modal-body">
                                        <p>U kunt uzelf niet verwijderen. Mocht u dit toch willen dan moet dit via de database zelf!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="" method="post" class="container-fluid row">
                                            <button type="button" class="col-sm align-self-center btn btn-success " data-bs-dismiss="modal">Annuleer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        } else{
                            echo '<!-- Modal'. $user->getID() .' -->
                        <div class="modal fade" id="userModal'. $user->getID() .'" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">Weet je het zeker?</h1>
                                    </div>
                                    <div class="modal-body">
                                        <p>Weet je het zeker om gebruiker <b>'. $user->getUname() .'</b> te verwijderen?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="" method="post" class="container-fluid row">
                                            <button type="button" class="col-sm align-self-start btn btn-success " data-bs-dismiss="modal">Annuleer</button>
                                            <button type="submit" class="col-sm align-self-end btn btn-danger" type="submit" value="'. $user->getID() .'" name="deleteUser" title="Remove"><i class="bi bi-trash"></i> Verwijder</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        }
                        
                    }
                }
                ?>


            </table>
        </div>
    </div>
</main>
<?php
require_once "templates/footer.php";
?>