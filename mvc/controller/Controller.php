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
        $result = $this->model->getSystem();
        $this->view->showSystem($result);
    }
    public function addSystemAction(){
        $result = "";
        $this->view->createSystem($result);
    }
    public function saveSystem() {
        $model = $_POST["model"];
        $sn = filter_input(INPUT_POST,'sn');
        $status = $_POST["status"];
        $firm = filter_input(INPUT_POST,'firm');
        $issue = filter_input(INPUT_POST,'issue');
        $ticketed = $_POST["ticketed"];
        $notes = filter_input(INPUT_POST,'notes');
        $this->model->createSystem($model,$sn,$status,$firm,$issue,$ticketed,$notes);
        $this->showSystemAction();
    }
    public function deleteSystem() {
        $id = $_POST["deleteSystem"];
        $delSystem = $this->model->deleteSystem($id);
        $this->showSystemAction();
    }
    public function showUpdateSystem($id=null) {
        $this->view->showUpdateSystem($id);
    }
    public function updateSystem(){
        $id = filter_input(INPUT_POST, 'id');
        $model = $_POST["model"];
        $sn = filter_input(INPUT_POST,'sn');
        $status = $_POST["status"];
        $firm = filter_input(INPUT_POST,'firm');
        $issue = filter_input(INPUT_POST,'issue');
        $ticketed = $_POST["ticketed"];
        $notes = filter_input(INPUT_POST,'notes');
        $result = $this->model->updateSystem($id, $model,$sn,$status,$firm,$issue,$ticketed,$notes);
        $this->view->showSystem($result);
    }


//CRUD pin
    public function showPinAction(){
        $result = $this->model->getPin();
        $this->view->showPin($result);
    }
//CRUD handheld
    public function showHandheldAction(){
        $result = $this->model->getHandheld();
        $this->view->showHandheld($result);
    }
//CRUD flip
    public function showFlipAction(){
        $result = $this->model->getFlip();
        $this->view->showFlip($result);
    }
//CRUD drawer
    public function showDrawerAction(){
        $result = $this->model->getDrawer();
        $this->view->showDrawer($result);
    }
//CRUD pc
    public function showPcAction(){
        $result = $this->model->getPc();
        $this->view->showPc($result);
    }
//CRUD printer
    public function showPrinterAction(){
        $result = $this->model->getPrinter();
        $this->view->showPrinter($result);
    }

//CRUD USER
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
    public function loginAction()
    {
        if (isset($_POST['uname']) && isset($_POST['pswrd'])) {
            $uname = filter_input(INPUT_POST, 'uname');
            $pswrd = filter_input(INPUT_POST, 'pswrd');
            $this->model->login($uname, $pswrd);
        
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                $this->model->getHome();
                $this->view->showHome();
            } else {
                $this->view->showLogin();
            }
        }else {
                $this->view->showLogin();
        }
    }
    
    public function showHomeAction(){
        $this->model->getHome();
        $this->model->getSystem();
        $this->view->showHome();
    }

    public function logoutAction(){
        $this->model->logout();
        $this->view->showLogin();
        
    }
}