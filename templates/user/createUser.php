<?php require_once "templates/header.php";?>
<div class="container my-5 p-2 border border-2 rounded-5 shadow-sm">
    <form action="" method="post"> <button onclick="" type="submit" class="btn btn-outline-danger rounded-circle"
            name="cancelUser"><i class="fs-3 bi bi-x-circle"></i></button></form>
    <div class="text-center">
        <h1>Voeg een nieuwe gebruiker toe</h1>

    </div>

    <div class="arrow-hr">
        <span class="arrow-icon">
            <i class="bi bi-patch-plus-fill"></i>
        </span>
        <hr class="styled-hr">
        <span class="arrow-icon">
            <i class="bi bi-patch-plus-fill"></i>
        </span>

    </div>

    <form action="" method="POST">
        <input type="hidden" name="id" value='' />
        <input type="hidden" required autocomplete="off" name="role" value='user' />
        <table class="table table-striped table-hover table-responsive" data-bs-target="dark">
            <tr>
                <th><label for="uname">Gebruikersnaam</label></th>
                <th><Label for="pswrd">Wachtwoord</Label></th>
            </tr>
            <tr id="data-row">
                <td><input type="text" class="form-control" required autocomplete="off" name="uname" value='' /></td>
                <td><input type="text" class="form-control" required autocomplete="off" name="pswrd" value='' /></td>

            </tr>
            <tr>
                <td colspan="2">
                    <div class="justify-content-end">
                        <button onclick="" type="submit" class="btn btn-outline-success"
                            name="addNewUser">Toevoegen</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php require_once "templates/footer.php";?>

