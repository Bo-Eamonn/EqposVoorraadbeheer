<?php
include_once ('mvc/model/Model.php');

$model = new \mvc\model\Model();
$stockCountSystem = $model->getSystemStock();

echo $stockCountSystem;
?>
