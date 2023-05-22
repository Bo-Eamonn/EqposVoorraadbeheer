<?php
require_once "templates/header.php";

if ($id != null && $id != 0) {
    $system = $this->model->selectSystem($id);
}

var_dump($system);

if (isset($system)) {
    echo 'Het werkt';
    echo 'System ID: ' . $system->id;
} else {
    echo "het werkt niet";
    var_dump($system);
}

require_once "templates/footer.php";
?>