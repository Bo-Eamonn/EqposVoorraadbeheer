<?php

namespace mvc\model;

class User
{
    private $id;
    private $uname;
    private $pswrd;
    private $role;
    
    public function getId(){
        return $this->id;
    }
    public function getUname(){
        return $this->uname;
    }
    public function getPswrd(){
        return $this->pswrd;
    }
    public function getRole(){
        return $this->role;
    }
}


