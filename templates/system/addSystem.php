<?php require_once "templates/header.php"; ?>

<div class="container my-5 p-2 border border-2 rounded-5 shadow-sm">
    <div class="text-center">
        <h1>Voeg een systeem toe</h1>
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
        <table class="table table-striped table-hover table-responsive" data-bs-target="dark">
            <tr>
                <th><label for="model">Model</label></th>
                <th><label for="sn">Serienummer</label></th>
                <th><label for="status">Status</label></th>
                <th><label for="firm">Firm</label></th>
                <th><label for="issue">Issue</label></th>
                <th><label for="ticketed">Ticketed</label></th>
                <th><label for="note">Note</label></th>
            </tr>
            <tr id="data-row">
                <input type="hidden" name="id" value="">
                <input type="hidden" required name="date_added" value="<?php echo date('Y-m-d H:i:s'); ?>">
                <td><input type="text" class="form-control" required autocomplete="off" name="model" value=""
                        placeholder="type model" title="Verplicht veld"></td>
                <td><input type="text" class="form-control" required autocomplete="off" name="sn" value=""
                        placeholder="JWE00000000000" title="Verplicht veld"></td>
                <td>
                    <select class="form-control" required name="status" title="Verplicht veld">
                        <option value="" disabled selected>Select Status</option>
                        <option value="Beschikbaar">Beschikbaar</option>
                        <option value="Showroom">Showroom</option>
                        <option value="Geleverd">Geleverd</option>
                        <option value="Gereserveerd">Gereserveerd</option>
                        <option value="Defect bij levering">Defect bij levering</option>
                        <option value="Defect Retour">Defect Retour</option>
                    </select>
                </td>
                <td><input type="text" class="form-control" name="firm" value="" placeholder="Eqpos Kassasystemen"></td>
                <td><input type="text" class="form-control" name="issue" value="" placeholder="Start niet op"></td>
                <td>
                    <select class="form-control" required name="ticketed" title="Verplicht veld">
                        <option value="" disabled selected>Kies</option>
                        <option value="0" selected>Nee</option>
                        <option value="1">Ja</option>
                    </select>
                </td>
                <td><textarea class="form-control" name="note" placeholder="Eventuele opmerkingen"></textarea></td>
            </tr>
            <tr>
                <td colspan="7">
                    <div class="d-flex justify-content-between">
                        <button onclick="" type="submit" class="btn btn-outline-danger" name="cancelSystem">Annuleren</button>
                        <button onclick="insertRow();" type="button" class="btn btn-outline-primary" name="">Rij invoegen</button>
                        <button onclick="" type="submit" class="btn btn-outline-success" name="addNewSystem">Toevoegen</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>

<script>
    function insertRow() {
        var dataRow = document.getElementById("data-row");
        var cloneRow = dataRow.cloneNode(true);

        // Clear input values in the cloned row
        var inputs = cloneRow.querySelectorAll("input[type=text], select, textarea");
        inputs.forEach(function(input) {
            input.value = "";
        });

        dataRow.parentElement.insertBefore(cloneRow, dataRow.nextElementSibling);
    }
</script>



<?php require_once "templates/footer.php"; ?>
