<?php

namespace Models;


class Client
{
    private $id;
    private $name;
    private $phone;

    public function __construct($id,$name,$phone) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
    }

    public function getId(){return $this->id;}
    public function getName(){return $this->name;}
    public function getPhone(){return $this->phone;}

    public function setId ($id){$this->id = ($id);}
    public function setCapacity ($name) {$this->capacity = $name;}
    public function setTicketPrice ($phone) {$this->ticketPrice = $phone;}
    
}