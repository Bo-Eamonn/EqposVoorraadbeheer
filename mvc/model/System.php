<?php

namespace mvc\model;

class System
{
    private $id;
    private $model;
    private $sn;
    private $status;
    private $firm;
    private $issue;
    private $ticketed;
    private $notes;

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }

}