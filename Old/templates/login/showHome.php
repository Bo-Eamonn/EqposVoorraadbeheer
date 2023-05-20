<?php
require_once "templates/header.php";
?>
   <main>

   <?php
                echo "<h1>Welkom: " . $_SESSION['username'] . "</h1>";
            ?>

   </main>
<?php
require_once "templates/footer.php";
?>