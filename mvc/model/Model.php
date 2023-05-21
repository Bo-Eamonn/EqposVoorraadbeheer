<?php

namespace mvc\model;

use PDO;

include_once ('mvc/model/System.php');
include_once ('mvc/model/User.php');
 
class Model
{
    private $db;

    private function connectDb(){
        $this->db = new PDO('mysql:host=localhost;dbname=voorraadbeheer', "root", "");
    }
//Login
public function login($uname, $pswrd) {
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
//logout    
    public function logout(){
        ob_start();    
    session_unset();
    session_destroy();
    header("location: /voorraad_beheer/");
    ob_end_clean();
    exit;
    }

    public function getHome(){
        if(1+1==2) {
        $text = "Last Login ";
        $date = date("F j, Y, g:i a");
        $result = $text.$date;
        return $result;
        }
        return null;
    }


//Create New System
    public function createSystem($model,$sn,$status,$firm,$issue,$ticketed,$notes){
        $this->connectDb();
        if ($model !='' && $sn !='' && $status !='' && $firm !='' && $issue !='' && $ticketed !='' && $notes !='') {
            $query = $this->db->prepare("INSERT INTO `systems` (`id`,`mod,el``sn`,`statu,s``firm`,`issue`,`ticketed`,`notes`) VALUES ('', :model, :sn, :status, :firm, :issue, :ticketed, :notes)");
            $query->bindParam(":model",$model);  
            $query->bindParam(":sn",$sn); 
            $query->bindParam(":status",$status); 
            $query->bindParam(":firm",$firm); 
            $query->bindParam(":issue",$issue); 
            $query->bindParam(":ticketed",$ticketed); 
            $query->bindParam(":notes",$notes); 
            $result = $query->execute();
            return $result;
        }
        return -1;
    }

//Read System
    public function getSystem(){
        $this->connectDb();
        $select = $this->db->query('SELECT * FROM `systems` ');
        if ($select) {
            $result=$select->fetchALL(PDO::FETCH_CLASS,System::class);
            return $result;
        }
        return null;      
    }
    
// Read system stock
    public function getSystemStock(){
        $this->connectDb();
        $select = $this->db->query('SELECT * FROM `systems` WHERE status = "Beschikbaar"');
        if ($select) {
            $stock = $select->fetchAll(PDO::FETCH_CLASS, System::class);
            return $stock;
        }
        echo "Error fetching stock";
        return null;
    }

//Update System
    public function updateSystem($id,$model,$sn,$status,$firm,$issue,$ticketed,$notes){
        $this->connectDb();
        if ($model !='' && $sn !='' && $status !='' && $firm !='' && $issue !='' && $ticketed !='' && $notes !='') {
            $query = $this->db->prepare("UPDATE `systems` SET  `id`=:id, `model`=:model, `sn`=:sn, `status`=:status, `firm`=:firm, `issue`=:issue, `ticketed`=:ticketed, `notes`=:notes WHERE `systems`.`id`=:id");
            $query->bindParam(":id",$id);
            $query->bindParam(":model",$model);  
            $query->bindParam(":sn",$sn); 
            $query->bindParam(":status",$status); 
            $query->bindParam(":firm",$firm); 
            $query->bindParam(":issue",$issue); 
            $query->bindParam(":ticketed",$ticketed); 
            $query->bindParam(":notes",$notes); 
            $result = $query->execute();
            return $result;
        }
    } 
//Delete System    
    public function deleteSystem($id){
        $this->connectDb();
        $select = $this->db->prepare('DELETE FROM `systems` WHERE `systems`.`id`=:id');
        $select->bindParam(":id", $id);
        $result = $select->execute();
        return $result;
    }
//Select System
    public function selectSystem($id){
        $this->connectDb();
        $select = $this->db->prepare("SELECT * FROM `systems` WHERE `systems`.`id`=:id");
        $select->bindParam(":id", $id);
        $result = $select->execute();
        if ($result) {
            $select->setFetchMode(PDO::FETCH_CLASS,system::class);
            $system = $select->fetch();
            return $system;
        }
    return null;
    }    

//Create New User
    public function createUser($uname, $pswrd, $role){
        $this->connectDb();
        if ($uname !='' && $pswrd !='' && $role !='') {
            $query = $this->db->prepare("INSERT INTO `users` (`id`, `uname`, `pswrd`, `role`) VALUES ('', :uname, :pswrd, :role)");
            $query->bindParam(":uname", $uname); 
            $query->bindParam(":pswrd", $pswrd); 
            $query->bindParam(":role", $role); 
            $result = $query->execute();
            return $result;
        }
        return -1;
    }
//Read User
    public function getUsers(){
        $this->connectDb();
        $select = $this->db->query('SELECT * FROM `users` ');
        if ($select) {
            $result=$select->fetchALL(PDO::FETCH_CLASS,User::class);
            return $result;
        }
        return null;
    }
//Update User
    public function updateUser($id, $uname, $pswrd, $role){
        $this->connectDb();
        if ($uname !='' && $pswrd != '' && $role !='') {
            $query = $this->db->prepare("UPDATE `users` SET `name`=:uname, `pswrd`=:pswrd, `role`=:role  WHERE `users`.`id`=:id");
            $query->bindParam(":id", $id);
            $query->bindParam(":uname", $uname); 
            $query->bindParam(":pswrd", $pswrd);  
            $result = $query->execute();
            return $result;
        }
    }
//Delete User
    public function deleteUser($id){
        $this->connectDb();
        $select = $this->db->prepare('DELETE FROM `users` WHERE `users`.`id`=:id');
        $select->bindParam(":id", $id);
        $result = $select->execute();
        return $result;
    }
//Select User
    public function selectUser($id){
        $this->connectDb();
         $select = $this->db->prepare("SELECT * FROM `users` WHERE `users`.`id` :id");
        $select->bindParam(":id", $id);
        $result = $select->execute();
        if ($result) {
            $select->setFetchMode(PDO::FETCH_CLASS,User::class);
            $user = $select->fetch();
            return $user;
        }
    return null;
    }    
}