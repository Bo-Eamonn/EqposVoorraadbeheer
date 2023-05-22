<?php

namespace mvc\view;
include_once ('mvc/model/Model.php');
include_once ('mvc/model/User.php');
include_once ('mvc/model/System.php');

class View{

    private $model;
    public function __construct($model){
        $this->model = $model;
    }
    
// CRUD view System
public function addSystem() {
    require ('templates/system/addSystem.php');
}

public function createSystem($result) {
    require ('templates/system/addSystem.php');
}

public function showUpdateSystem($system, $id = NULL) {
    require ('templates/system/updateSystem.php');
}

public function showSystem($result, $sort = 'id_asc') {
    require ('templates/system/showSystem.php');
}


    
    

// Global Views
    // Show Login
    public function showLogin($errorMessage = ""){
        require ('templates/login/login.php');
    }
    // Show stock in nav
    // variables , $stockPins, $stockHandhelds, $stockFliptops, $stockDrawers, $StockPcs, $stockPrinters
    public function renderNavStock($stockSystems) {
        require('templates/header.php');
    }
    // Show Homepage
    public function showHome($stockSystems){ 
        require ('templates/login/showHome.php');
    }    
}