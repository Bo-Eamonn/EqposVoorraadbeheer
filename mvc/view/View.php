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
    public function showLogin($errorMessage = ""){
        require ('templates/login/login.php');
    }
// CREATE
    public function addSystem($result){
        require ('templates/system/addSystem.php');
    }
    public function createSystem($result){
        require ('templates/system/addSystem.php');
    }
    
    public function addUser($result){
        require ('templates/user/addUser.php');
    }

    public function createUser($result){
        require ('templates/user/addUser.php');
    }

// READ
    public function showHome($stockSystems){ 
        require ('templates/login/showHome.php');
    }

    public function showSystem($result){
        require ('templates/system/showSystem.php');
    }


    public function showUsers($result){
        require ('templates/user/showUser.php');
    }

// Show stock in nav
// variables , $stockPins, $stockHandhelds, $stockFliptops, $stockDrawers, $StockPcs, $stockPrinters

    public function renderNavStock($stockSystems) {
        require('templates/header.php');

    }


// UPDATE
    public function showUpdateSystem($id=NULL){
            require ('templates/system/updateSystem.php');
    }
    public function updateUser($result){
        require ('templates/patient/updateUser.php');
    }
    
}