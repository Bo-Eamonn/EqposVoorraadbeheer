<?php

namespace mvc\view;

include_once ('mvc/model/Model.php');
include_once ('mvc/model/User.php');
include_once ('mvc/model/System.php');

class View {

    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    // CRUD view System

    /**
     * Show the form to add a new system
     */
    public function addSystem() {
        require ('templates/system/addSystem.php');
    }

    /**
     * Show the form to create a new system
     * 
     * @param mixed $result Result of creating the system
     */
    public function createSystem($result) {
        require ('templates/system/addSystem.php');
    }

    /**
     * Show the form to update a system
     * 
     * @param array|null $system The system to update
     * @param int|null $id The ID of the system
     */
    public function showUpdateSystem($system, $id = null) {
        require ('templates/system/updateSystem.php');
    }

    /**
     * Show the system page with sorting option
     * 
     * @param array $result The systems to display
     * @param string $sort The sorting option
     */
    public function showSystem($result, $sort = 'id_asc') {
        require ('templates/system/showSystem.php');
    }

    // CRUD User

    /**
     * Show the user page
     * 
     * @param array $result The users to display
     */
    public function showUsers($result) {
        require ('templates/user/showUsers.php');
    }

    /**
     * Show the form to create a new user
     */
    public function createUser() {
        require ('templates/user/createUser.php');
    }

    /**
     * Show the form to update a user
     */
    public function updateUser() {
        require ('templates/user/updateUser.php');
    }

    // Global Views

    /**
     * Show the login page
     * 
     * @param string $errorMessage Error message to display (optional)
     */
    public function showLogin($errorMessage = "") {
        require ('templates/login/login.php');
    }

    /**
     * Render the stock in the navigation
     * 
     * @param array $stockSystems Stock systems to display
     */
    public function renderNavStock($stockSystems) {
        require('templates/header.php');
    }

    /**
     * Show the homepage
     * 
     * @param array $stockSystems Stock systems to display
     */
    public function showHome($stockSystems) {
        require ('templates/login/showHome.php');
    }
}
