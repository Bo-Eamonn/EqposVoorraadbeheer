<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthOne | Toevoegen Medicijnen</title>
    <link rel="stylesheet" href="/HealthOne_MVC/assets/css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<?php
require_once "templates/header.php";
require_once "templates/nav.php";
?>
<div id="medAddModal" class="modal">
    <div class="medModal-container">
        <div>
            <form action="" method="post">
                <button type="submit" name="cancelMed" class="close" title="Sluiten">
                    <i class="fa fa-times-circle"></i>
                </button>
            </form>
            <form action="" method="POST">
                <table>
                    <input type="hidden" name="id" value='' />
                    <tr>
                        <th><label for="name">Medicijn naam</label></th>
                        <th><Label for="cat">Categorie</Label></th>
                        <th><label for="insured">Verzekerd</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" required autocomplete="off" name="name" value='' /></td>
                        <td>
                            <select required name="cat">
                                <option value="" disabled selected>Maak een keuze</option>
                                <option value="ADHD-middelen">ADHD-middelen</option>
                                <option value="Alzheimer-middelen">Alzheimer-middelen</option>
                                <option value="Anti-epileptica">Anti-epileptica</option>
                                <option value="Antidepressiva en lithium">Antidepressiva en lithium</option>
                                <option value="Antihistaminica">Antihistaminica</option>
                                <option value="Antipsychotica">Antipsychotica</option>
                                <option value="Benzodiazepinen">Benzodiazepinen</option>
                                <option value="Hoestmiddelen">Hoestmiddelen</option>
                                <option value="Hoofdpijnmiddelen">Hoofdpijnmiddelen</option>
                                <option value="Incontinentie-middelen">Incontinentie-middelen</option>
                                <option value="Middelen bij kanker">Middelen bij kanker</option>
                                <option value="Ontwenningsmiddelen">Ontwenningsmiddelen</option>
                                <option value="Opioïden">Opioïden</option>
                                <option value="Parkinsonmiddelen">Parkinsonmiddelen</option>
                                <option value="Maagdarmmiddelen">Maagdarmmiddelen</option>
                                <option value="Overig">Overig</option>
                            </select>
                        </td>
                        <td>
                            <label for="insured">Ja</label>
                            <input type="radio" checked name="insured" value="yes">
                            <label for="insured">Nee</label>
                            <input type="radio" name="insured" value="no">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input onclick="" type='submit' name='toevoegenMed' value='opslaan'></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
require_once "templates/footer.php";
?>