<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthOne | Show User</title>
    <link rel="stylesheet" href="/HealthOne_MVC/assets/css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<?php
require_once "templates/header.php";
require_once "templates/nav.php";
?>
    <main>
        <div class="content">
            <img src="/healthone_mvc/assets/images/profilePicture/profilePlaceholder.png" alt="Profiel Foto">
            <?php
                echo "<h1>Welkom: " . $_SESSION['username'] . "</h1>";
            ?>
            <div class="container">
            <form action="" method="post">    
            <button class="add" type="submit" name="showAddUser">Toevoegen</button>
        </form>
                <div class="table">
                    <?php
                        
                            echo "<table>";
                            echo "<tr>";     
                                echo "<th>Naam</th>";                       
                                echo "<th>Role</th>";   
                                echo "<th>Edit</th>";   
                            echo "</tr>";                       
                                foreach ($result as $user) {
                                echo "<tr>";    
                                    echo "<td>" . $user->getUname() . " </td>";
                                    echo "<td>" . $user->getRole() . " </td>";
                                    echo "<td><form action='' method='post'>";
                                    echo "<button class='ud' value='" . $user->getId() ."' type='submit' name='editUser' ><i class='fa fa-pen'></i></button>";
                                    echo "<button class='ud' value='" . $user->getId() . "' type='submit' name='deleteUser' ><i class='fa fa-trash'></i></button>";
                                echo "</form> </td>";
                                echo "</tr>";
                            }
                            echo "</table>";     
                    ?>
                </div>
            </div>
        </div>
    </main>

<?php
require_once "templates/footer.php";
?>