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
    
    /**
     * Initialize the Controller object
     */
    public function __construct(){
        $this->model = new Model();
        $this->view = new View($this->model);
    }
    
    // CRUD System
    
    /**
     * Show the system page with sorting option
     */
    public function showSystemAction(){
        $sort = $_POST['sort'] ?? 'date_desc'; // Retrieve the selected sort option
        $result = $this->model->getSystem($sort);
        $this->view->showSystem($result);
    }
    
    /**
     * Show the form to add a new system
     */
    public function addSystemAction() {
        $this->view->addSystem();
    }
    
    /**
 * Save the new system to the database
 */
public function saveSystem() {
    if (isset($_POST["addNewSystem"])) {
        // Retrieve the data rows submitted in the form
        $dataRows = $_POST["data_row"];

        foreach ($dataRows as $rowData) {
            // Extract the values for each column from the data row
            $model = $rowData["model"];
            $sn = $rowData["sn"];
            $status = $rowData["status"];
            $firm = $rowData["firm"];
            $issue = $rowData["issue"];
            $ticketed = $rowData["ticketed"];
            $notes = $rowData["note"];

            // Create the system in the database using the extracted values
            $result = $this->model->createSystem($model, $sn, $status, $firm, $issue, $ticketed, $notes);

            if (!$result) {
                // Error creating the system
                echo "Error creating the system";
                return; // Stop execution after displaying the error
            }
        }

        // All systems created successfully
        // Redirect to the system page to show the updated list of systems
        $this->showSystemAction();
        return; // Stop execution after redirecting
    }

    // Handle the cancellation action
    if (isset($_POST["cancelSystem"])) {
        // Redirect to the system page without making any changes
        $this->showSystemAction();
        return; // Stop execution after redirecting
    }
}
    
    /**
     * Delete a system from the database
     */
    public function deleteSystem() {
        $id = $_POST["deleteSystem"];
        $delSystem = $this->model->deleteSystem($id);
        $this->showSystemAction();
    }
    
    /**
     * Show the form to update a system
     */
    public function showUpdateSystem($id=null) {
        $system = $this->model->selectSystem($id);
        $this->view->showUpdateSystem($system, $id);
    }
    
    /**
     * Update a system in the database
     */
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
    
    // CRUD pin
    
    /**
     * Show the pin page
     */
    public function showPinAction(){
        $result = $this->model->getPin();
        $this->view->showPin($result);
    }
    
    // CRUD handheld
    
    /**
     * Show the handheld page
     */
    public function showHandheldAction(){
        $result = $this->model->getHandheld();
        $this->view->showHandheld($result);
    }
    
    // CRUD flip
    
    /**
     * Show the flip page
     */
    public function showFlipAction(){
        $result = $this->model->getFlip();
        $this->view->showFlip($result);
    }
    
    // CRUD drawer
    
    /**
     * Show the drawer page
     */
    public function showDrawerAction(){
        $result = $this->model->getDrawer();
        $this->view->showDrawer($result);
    }
    
    // CRUD pc
    
    /**
     * Show the pc page
     */
    public function showPcAction(){
        $result = $this->model->getPc();
        $this->view->showPc($result);
    }
    
    // CRUD printer
    
    /**
     * Show the printer page
     */
    public function showPrinterAction(){
        $result = $this->model->getPrinter();
        $this->view->showPrinter($result);
    }
    
    // CRUD USER
    
    /**
     * Show the user page (only accessible for admin)
     */
    public function showUserAction(){
        $result = $this->model->getUsers();
        $this->view->showUsers($result);
    }
    
    /**
     * Show the form to add a new user
     */
    public function addUserAction(){
        $result = "";
        $this->view->createUser($result);
    }
    
    /**
     * Save a new user to the database
     */
    public function saveUser() {
        $uname = filter_input(INPUT_POST, 'uname');
        $pass = filter_input(INPUT_POST, 'pswrd');
        $role = $_POST['role'];
        $pswrdHash = strtoupper(hash("sha256", $pass));
        $pswrd = $pswrdHash;
        $this->model->createUser($uname, $pswrd, $role);
        $this->showUserAction();
    }
    
    /**
     * Delete a user from the database
     */
    public function deleteUser() {
        $id = $_POST["deleteUser"];
        $delUser = $this->model->deleteUser($id);
        $this->showUserAction();
    }
    
    /**
     * Show the form to edit a user
     */
    public function editUser() {
        $id = $_POST["editUser"];
        $user = $this->model->getUsers($id);
        $this->view->updateUser($user);
    }
    
    // Default Functions
    
    /**
     * Handle the login action
     */
    public function loginAction() {
        // Check if username and password are submitted
        if (isset($_POST['uname']) && isset($_POST['pswrd'])) {
            $uname = filter_input(INPUT_POST, 'uname');
            $pswrd = filter_input(INPUT_POST, 'pswrd');
    
            // Validate the login credentials
            if ($this->model->login($uname, $pswrd)) {
                // If the user is an admin, show the home page with stock systems
                if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                    $model = new Model();
                    $stockSystems = $model->getSystemStock();
                    $this->model->getHome();
                    $this->view->showHome($stockSystems);
                } else {
                    // If the user is not an admin, show the login page
                    $this->view->showLogin();
                }
            } else {
                // If the login credentials are invalid, show an error message
                $errorMessage = "Invalid username or password. Please try again.";
                $this->view->showLogin($errorMessage);
            }
        } else {
            // If no credentials are submitted, show the login page
            $this->view->showLogin();
        }
    }
    
    /**
     * Show the stock in the navigation
     */
    public function showStockNav(){
        $model = new Model();
        $stockSystems = $model->getSystemStock();
        $this->view->renderNavStock($stockSystems);
    }
    
    /**
     * Show the homepage and display the stock on the homepage
     */
    public function showHomeAction(){
        $model = new Model();
        $stockSystems = $model->getSystemStock();
        $this->model->getHome();
        $this->view->showHome($stockSystems);
    }
    
    /**
     * Handle the logout action
     */
    public function logoutAction(){
        $this->model->logout();
        $this->view->showLogin();
    }
}
