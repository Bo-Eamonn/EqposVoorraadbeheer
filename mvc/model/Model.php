<?php

namespace mvc\model;

use PDO;

include_once ('mvc/model/System.php');
include_once ('mvc/model/User.php');

class Model
{
    private $db;

    // Establishes database connection
    private function connectDb()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=voorraadbeheer', "root", "");
    }

    // Login function
    // Takes a username and password as parameters
    // Returns true if login is successful, false otherwise
    public function login($uname, $pswrd)
    {
        $this->connectDb();
        $query = $this->db->prepare('SELECT * FROM `users` WHERE `users`.`uname` = :uname');
        $query->bindParam(":uname", $uname);
        $result = $query->execute();

        if ($result) {
            $query->setFetchMode(\PDO::FETCH_CLASS, User::class);
            $user = $query->fetch();
            if ($user) {
                $hasedPassword = strtoupper(hash("sha256", $pswrd));
                if ($user->getPswrd() == $hasedPassword) {
                    $_SESSION['username'] = $user->getUname();
                    $_SESSION['role'] = $user->getRole();
                    return true; // Login successful
                }
            }
        }

        return false; // Login failed
    }

    // Logout function
    // Destroys session and redirects to the homepage
    public function logout()
    {
        ob_start();
        session_unset();
        session_destroy();
        header("location: /voorraad_beheer/");
        ob_end_clean();
        exit;
    }

    // Retrieves the last login date and time
    // Returns the formatted string of the last login date and time
    public function getHome()
    {
        if (1 + 1 == 2) {
            $text = "Last Login ";
            $date = date("F j, Y, g:i a");
            $result = $text . $date;
            return $result;
        }
        return null;
    }

    // Creates a new system entry
    // Takes various system details as parameters
    // Returns true if the system is created successfully, false otherwise
    public function createSystem($model, $sn, $status, $firm, $issue, $ticketed, $notes)
    {
        $this->connectDb();
        if ($model != '' && $sn != '' && $status != '' && $firm != '' && $issue != '' && $ticketed != '' && $notes != '') {
            $query = $this->db->prepare("INSERT INTO `systems` (`id`, `model`, `sn`, `status`, `firm`, `issue`, `ticketed`, `notes`, `date_added`) VALUES (NULL, :model, :sn, :status, :firm, :issue, :ticketed, :notes, :date_added)");
            $query->bindParam(":model", $model);
            $query->bindParam(":sn", $sn);
            $query->bindParam(":status", $status);
            $query->bindParam(":firm", $firm);
            $query->bindParam(":issue", $issue);
            $query->bindParam(":ticketed", $ticketed);
            $query->bindParam(":notes", $notes);
            $query->bindValue(":date_added", date('Y-m-d H:i:s')); // Use the current date and time
            $result = $query->execute();
            return $result;
        }
        return false;
    }

    // Retrieves systems from the database based on the specified sort option
    // Takes the sort option as a parameter (default is 'date_desc')
    // Returns an array of system objects if successful, null otherwise
    public function getSystem($sort = 'date_desc')
    {
        $this->connectDb();

        // Modify the SQL query based on the selected sort option
        if ($sort === 'sn_asc') {
            $orderBy = 'sn ASC';
        } elseif ($sort === 'sn_desc') {
            $orderBy = 'sn DESC';
        } elseif ($sort === 'status_asc') {
            $orderBy = 'status ASC';
        } elseif ($sort === 'status_desc') {
            $orderBy = 'status DESC';
        } elseif ($sort === 'date_asc') {
            $orderBy = 'date_added ASC';
        } elseif ($sort === 'date_desc') {
            $orderBy = 'date_added DESC';
        } else {
            $orderBy = 'date_added DESC'; // Default sort option is 'id_asc'
        }

        $select = $this->db->query('SELECT * FROM `systems` ORDER BY ' . $orderBy);

        if ($select) {
            $result = $select->fetchAll(PDO::FETCH_CLASS, System::class);
            return $result;
        }

        return null;
    }

    // Retrieves system stock from the database
    // Returns an array of system objects if successful, null otherwise
    public function getSystemStock()
    {
        $this->connectDb();
        $select = $this->db->query('SELECT * FROM `systems` WHERE status = "Beschikbaar"');
        if ($select) {
            $stock = $select->fetchAll(PDO::FETCH_CLASS, System::class);
            return $stock;
        }
        echo "Error fetching stock";
        return null;
    }

    // Updates an existing system entry
    // Takes system details and the system ID as parameters
    // Returns true if the system is updated successfully, false otherwise
    public function updateSystem($id, $model, $sn, $status, $firm, $issue, $ticketed, $notes)
    {
        $this->connectDb();
        if ($model != '' && $sn != '' && $status != '' && $firm != '' && $issue != '' && $ticketed != '' && $notes != '') {
            $query = $this->db->prepare("UPDATE `systems` SET  `id`=:id, `model`=:model, `sn`=:sn, `status`=:status, `firm`=:firm, `issue`=:issue, `ticketed`=:ticketed, `notes`=:notes WHERE `systems`.`id`=:id");
            $query->bindParam(":id", $id);
            $query->bindParam(":model", $model);
            $query->bindParam(":sn", $sn);
            $query->bindParam(":status", $status);
            $query->bindParam(":firm", $firm);
            $query->bindParam(":issue", $issue);
            $query->bindParam(":ticketed", $ticketed);
            $query->bindParam(":notes", $notes);
            $result = $query->execute();
            return $result;
        }
    }

    // Deletes a system entry from the database
    // Takes the system ID as a parameter
    // Returns true if the system is deleted successfully, false otherwise
    public function deleteSystem($id)
    {
        $this->connectDb();
        $select = $this->db->prepare('DELETE FROM `systems` WHERE `systems`.`id`=:id');
        $select->bindParam(":id", $id);
        $result = $select->execute();
        return $result;
    }

    // Retrieves a system from the database based on the specified ID
    // Takes the system ID as a parameter
    // Returns the system object if successful, null otherwise
    public function selectSystem($id)
    {
        $this->connectDb();
        $select = $this->db->prepare("SELECT * FROM `systems` WHERE `systems`.`id`=:id");
        $select->bindParam(":id", $id);
        $result = $select->execute();
        if ($result) {
            $select->setFetchMode(PDO::FETCH_CLASS, System::class);
            $system = $select->fetch();
            return $system;
        }
        return null;
    }

    // Creates a new user entry in the database
    // Takes the username, password, and role as parameters
    // Returns true if the user is created successfully, false otherwise
    public function createUser($uname, $pswrd, $role)
    {
        $this->connectDb();
        if ($uname != '' && $pswrd != '' && $role != '') {
            $query = $this->db->prepare("INSERT INTO `users` (`id`, `uname`, `pswrd`, `role`) VALUES ('', :uname, :pswrd, :role)");
            $query->bindParam(":uname", $uname);
            $query->bindParam(":pswrd", $pswrd);
            $query->bindParam(":role", $role);
            $result = $query->execute();
            return $result;
        }
        return false;
    }

    // Retrieves all users from the database
    // Returns an array of user objects if successful, null otherwise
    public function getUsers()
    {
        $this->connectDb();
        $select = $this->db->query('SELECT * FROM `users` ');
        if ($select) {
            $result = $select->fetchAll(PDO::FETCH_CLASS, User::class);
            return $result;
        }
        return null;
    }

    // Updates an existing user entry
    // Takes the user ID, username, password, and role as parameters
    // Returns true if the user is updated successfully, false otherwise
    public function updateUser($id, $uname, $pswrd, $role)
    {
        $this->connectDb();
        if ($uname != '' && $pswrd != '' && $role != '') {
            $query = $this->db->prepare("UPDATE `users` SET `name`=:uname, `pswrd`=:pswrd, `role`=:role  WHERE `users`.`id`=:id");
            $query->bindParam(":id", $id);
            $query->bindParam(":uname", $uname);
            $query->bindParam(":pswrd", $pswrd);
            $result = $query->execute();
            return $result;
        }
        return false;
    }

    // Deletes a user entry from the database
    // Takes the user ID as a parameter
    // Returns true if the user is deleted successfully, false otherwise
    public function deleteUser($id)
    {
        $this->connectDb();
        $select = $this->db->prepare('DELETE FROM `users` WHERE `users`.`id`=:id');
        $select->bindParam(":id", $id);
        $result = $select->execute();
        return $result;
    }

    // Retrieves a user from the database based on the specified ID
    // Takes the user ID as a parameter
    // Returns the user object if successful, null otherwise
    public function selectUser($id)
    {
        $this->connectDb();
        $select = $this->db->prepare("SELECT * FROM `users` WHERE `users`.`id`=:id");
        $select->bindParam(":id", $id);
        $result = $select->execute();
        if ($result) {
            $select->setFetchMode(PDO::FETCH_CLASS, User::class);
            $user = $select->fetch();
            return $user;
        }
        return null;
    }
}
