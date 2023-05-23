<?php

use mvc\controller\Controller;

include_once "mvc/controller/Controller.php"; 
$controller = new Controller();

    session_start();
// ADMIN LOGIN    
    if (isset($_SESSION['role']) && $_SESSION['role']=="admin") {
        $controller->showStockNav();
        if (isset($_POST['logout'])){
            $controller->logoutAction();
        }
//CRUD USER
        elseif (isset($_POST['users']) || isset($_POST['cancelUser'])) {
            $controller->showUserAction();
        }elseif (isset($_POST['showAddUser'])) {
            $controller->addUserAction();
        }elseif (isset($_POST['addNewUser'])) {
            $controller->saveUser();
        } elseif(isset($_POST['deleteUser'])) {
            $controller->deleteUser();
        } elseif(isset($_POST['editUser'])) {
            $controller->editUser();
        }
//CRUD Systems 
elseif (isset($_POST['system']) || isset($_POST['cancelSystem'])) {
    $controller->showSystemAction();
} elseif (isset($_POST['showAddSystem'])) {
    $controller->addSystemAction();
} elseif (isset($_POST['addNewSystem'])) {
    $controller->saveSystem();
} elseif (isset($_POST['deleteSystem'])) {
    $controller->deleteSystem();
} elseif (isset($_POST['showUpdateSystem'])) {
    $controller->showUpdateSystem();
} elseif (isset($_POST['updateSystem'])) {
    $controller->updateSystem();
} elseif (isset($_POST['sort'])) { // Handle the sort option
    $controller->showSystemAction();
}

//CRUD pin
        elseif (isset($_POST['pin']) || isset($_POST['cancelPin'])) {
            $controller->showPinAction();
        }
        
//CRUD handheld
        elseif (isset($_POST['handheld']) || isset($_POST['cancelHandheld'])) {
            $controller->showHandheldAction();
        }
        
//CRUD flip
        elseif (isset($_POST['flip']) || isset($_POST['cancelFlip'])) {
            $controller->showFlipAction();
        }
        
//CRUD drawer
        elseif (isset($_POST['drawer']) || isset($_POST['cancelDrawer'])) {
            $controller->showDrawerAction();
        }
        
//CRUD pc
        elseif (isset($_POST['pc']) || isset($_POST['cancelPc'])) {
            $controller->showPcAction();
        }
        
//CRUD printer
        elseif (isset($_POST['printer']) || isset($_POST['cancelPrinter'])) {
            $controller->showPrinterAction();
        }
        

//DEFAULT PAGE
        elseif (isset($_POST['home'])) {
            $controller->showHomeAction();
        }else {
            $controller->showHomeAction();
        }
    }
//LOGIN GEBRUIKER
    elseif (isset($_SESSION['role']) && $_SESSION['role']=="user"){
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
        }elseif(isset($_POST['showUpdateSystem'])) {
            $controller->showUpdateSystem($id);
        }elseif (isset($_POST['updateSystem'])) {
            $controller->updateSystem();
        }


//CRUD pin
        elseif (isset($_POST['pin']) || isset($_POST['cancelPin'])) {
            $controller->showPinAction();
        }
        
//CRUD handheld
        elseif (isset($_POST['handheld']) || isset($_POST['cancelHandheld'])) {
            $controller->showHandheldAction();
        }
        
//CRUD flip
        elseif (isset($_POST['flip']) || isset($_POST['cancelFlip'])) {
            $controller->showFlipAction();
        }
        
//CRUD drawer
        elseif (isset($_POST['drawer']) || isset($_POST['cancelDrawer'])) {
            $controller->showDrawerAction();
        }
        
//CRUD pc
        elseif (isset($_POST['pc']) || isset($_POST['cancelPc'])) {
            $controller->showPcAction();
        }
        
//CRUD printer
        elseif (isset($_POST['printer']) || isset($_POST['cancelPrinter'])) {
            $controller->showPrinterAction();
        }  
              
        
        
// DEFAULT PAGE
        elseif (isset($_POST['home'])) {
            $controller->showHomeAction();
        } else {
            $controller->showHomeAction();
        }

    }else $controller->loginAction();
?>