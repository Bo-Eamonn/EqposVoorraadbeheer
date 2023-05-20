<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthOne | Show Patienten</title>
    <link rel="stylesheet" href="/HealthOne_MVC/assets/css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<?php
require_once "templates/header.php";
?>
    <main>
        <div class="content">
            <img src="/healthone_mvc/assets/images/profilePicture/profilePlaceholder.png" alt="Profiel Foto">
            <?php
                echo "<h1>Welkom: " . $_SESSION['username'] . "</h1>";
            ?>
            <div class="container">
                <div class="logs">
                    
                </div>
            </div>
        </div>
    </main>

<?php
require_once "templates/footer.php";
?>