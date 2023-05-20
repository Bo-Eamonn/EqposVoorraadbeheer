<?php

use mvc\controller\Controller;

include_once "mvc/controller/Controller.php"; 
$controller = new Controller();

    session_start();
// ADMIN LOGIN    
    if (isset($_SESSION['role']) && $_SESSION['role']=="admin") {
        if (isset($_POST['logout'])){
            $controller->logoutAction();
        }
//CRUD USER
        elseif (isset($_POST['user']) || isset($_POST['cancelUser'])) {
            $controller->showUserAction();
        }elseif (isset($_POST['showAddUser'])) {
            $controller->addUserAction();
        }elseif (isset($_POST['toevoegenUser'])) {
            $controller->saveUser();
        } elseif(isset($_POST['deleteUser'])) {
            $controller->deleteUser();
        } elseif(isset($_POST['editUser'])) {
            $controller->editUser();
        } 
//DEFAULT PAGE
        else {
            $controller->showHomeAction();
        }
    }
//LOGIN GEBRUIKER
    elseif (isset($_SESSION['role']) && $_SESSION['role']=="user") {
        if (isset($_POST['logout'])){
            $controller->logoutAction();
        }
//CRUD system        
        elseif (isset($_POST['system']) || isset($_POST['cancelSystem'])) {
            $controller->showSystemAction();
        }elseif (isset($_POST['showAddSystem'])) {
            $controller->addSystemAction();
        }elseif (isset($_POST['toevoegenSystem'])) {
            $controller->saveSystem();
        } elseif(isset($_POST['deleteSystem'])) {
            $controller->deleteSystem();
        } elseif(isset($_POST['showUpdateSystem'])) {
            $controller->showUpdateSystem($id);
        } elseif (isset($_POST['updateSystem'])) {
            $controller->updateSystem();
        }
//CRUD Pin        
        // elseif (isset($_POST['pin']) || isset($_POST['cancelPin'])) {
        //     $controller->showPinAction();
        // }elseif (isset($_POST['showAddPin'])) {
        //     $controller->addPinAction();
        // }elseif (isset($_POST['toevoegenPin'])) {
        //     $controller->savePin();
        // } elseif(isset($_POST['deletePin'])) {
        //     $controller->deletePin();
        // } elseif(isset($_POST['showUpdatePin'])) {
        //     $controller->showUpdatePin($id);
        // } elseif (isset($_POST['updatePin'])) {
        //     $controller->updatePin();
        // }
//DEFAULT PAGE        
        else {
            $controller->showHomeAction();
        }
    }else $controller->loginAction();
?>