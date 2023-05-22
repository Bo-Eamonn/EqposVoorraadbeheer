<?php

namespace mvc\controller;
include_once "mvc/view/View.php";
use mvc\view\View;
include_once "mvc/model/System.php";
include_once "mvc/model/User.php";
include_once "mvc/model/Model.php";
use mvc\model\Model;

class Controller{
    private $view;
    private $model;
    public function __construct(){
        $this->model = new Model();
        $this->view = new View($this->model);
    }
//CRUD System
public function showSystemAction(){
    $sort = $_POST['sort'] ?? 'date_desc'; // Retrieve the selected sort option
    $result = $this->model->getSystem($sort);
    $this->view->showSystem($result);
}

public function addSystemAction() {
    $this->view->addSystem();
}

public function saveSystem() {
    if (isset($_POST["addNewSystem"])) {
        $dataRows = $_POST["data_row"];

        foreach ($dataRows as $rowData) {
            $model = $rowData["model"];
            $sn = $rowData["sn"];
            $status = $rowData["status"];
            $firm = $rowData["firm"];
            $issue = $rowData["issue"];
            $ticketed = $rowData["ticketed"];
            $notes = $rowData["note"];

            $result = $this->model->createSystem($model, $sn, $status, $firm, $issue, $ticketed, $notes);

            if (!$result) {
                // Error creating the system
                // You can handle the error in a way that suits your application
                // For example, log the error or display an error message to the user
                echo "Error creating the system";
                return; // Stop execution after displaying the error
            }
        }

        // All systems created successfully
        $this->showSystemAction();
        return; // Stop execution after redirecting
    }

    // Handle the cancelation action
    if (isset($_POST["cancelSystem"])) {
        $this->showSystemAction();
        return; // Stop execution after redirecting
    }
}



public function deleteSystem() {
    $id = $_POST["deleteSystem"];
    $delSystem = $this->model->deleteSystem($id);
    $this->showSystemAction();
}

public function showUpdateSystem($id=null) {
    $system = $this->model->selectSystem($id);
    $this->view->showUpdateSystem($system, $id);
}

public function updateSystem(){
    $id = filter_input(INPUT_POST, 'id');
    $model = $_POST["model"];
    $sn = filter_input(INPUT_POST,'sn');
    $status = $_POST["status"];
    $firm = filter_input(INPUT_POST,'firm');
    $issue = filter_input(INPUT_POST,'issue');
    $ticketed = $_POST["ticketed"];
    $notes = filter_input(INPUT_POST,'note');
    $result = $this->model->updateSystem($id, $model,$sn,$status,$firm,$issue,$ticketed,$notes);
    $this->showSystemAction();
}


// //CRUD pin
//     public function showPinAction(){
//         $result = $this->model->getPin();
//         $this->view->showPin($result);
//     }
// //CRUD handheld
//     public function showHandheldAction(){
//         $result = $this->model->getHandheld();
//         $this->view->showHandheld($result);
//     }
// //CRUD flip
//     public function showFlipAction(){
//         $result = $this->model->getFlip();
//         $this->view->showFlip($result);
//     }
// //CRUD drawer
//     public function showDrawerAction(){
//         $result = $this->model->getDrawer();
//         $this->view->showDrawer($result);
//     }
// //CRUD pc
//     public function showPcAction(){
//         $result = $this->model->getPc();
//         $this->view->showPc($result);
//     }
// //CRUD printer
//     public function showPrinterAction(){
//         $result = $this->model->getPrinter();
//         $this->view->showPrinter($result);
//     }


//CRUD USER
    // Only accesable for Admin
    public function showUserAction(){
        $result = $this->model->getUsers();
        $this->view->showUsers($result);
    }
    public function addUserAction(){
        $result = "";
        $this->view->createUser($result);
    }
    public function saveUser() {
        $uname = filter_input(INPUT_POST, 'uname');
        $pass = filter_input(INPUT_POST, 'pswrd');
        $role = $_POST['role'];
        $pswrdHash = strtoupper(hash("sha256", $pass));
        $pswrd = $pswrdHash;
        $this->model->createUser($uname, $pswrd, $role);
        $this->showUserAction();
    }
    public function deleteUser() {
        $id = $_POST["deleteUser"];
        $delUser = $this->model->deleteUser($id);
        $this->showUserAction();
    }
    public function editUser() {
        $id = $_POST["editUser"];
        $user = $this->model->getUsers($id);
        $this->view->updateUser($user);
    }

// default Fucntions    
    public function loginAction() {
        if (isset($_POST['uname']) && isset($_POST['pswrd'])) {
            $uname = filter_input(INPUT_POST, 'uname');
            $pswrd = filter_input(INPUT_POST, 'pswrd');

            if ($this->model->login($uname, $pswrd)) {
                if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                    $model = new Model();
                    $stockSystems = $model->getSystemStock();
                    $this->model->getHome();
                    $this->view->showHome($stockSystems);
                } else {
                    $this->view->showLogin();
                }
            } else {
                $errorMessage = "Invalid username or password. Please try again.";
                $this->view->showLogin($errorMessage);
            }
        } else {
            $this->view->showLogin();
        }
    }
    // Show Stock in Nav 
    public function showStockNav(){
        $model = new Model();
        $stockSystems = $model->getSystemStock();
        $this->view->renderNavStock($stockSystems);
    }
    //show Homepage and show stock on homepage
    public function showHomeAction(){
        $model = new Model();
        $stockSystems = $model->getSystemStock();
        $this->model->getHome();
        $this->view->showHome($stockSystems);
    }
    //Logout
    public function logoutAction(){
        $this->model->logout();
        $this->view->showLogin();
        
    }



    
}