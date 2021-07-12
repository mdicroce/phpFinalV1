<?php
namespace Models;

use Models\Client as Client;
use Models\User as User;

class ToRepair
{
    private $id;
    private $state;
    private $name;
    private $tecnico;
    private $client;    

    public function __construct($id,$state,$name,$tecnicoId, $tecnicoName, $tecnicoUsername, $password,$clientId, $clientName, $clientPhone) {
        $this->id = $id;
        $this->state = $state;
        $this->name = $name;
        $this->tecnico = new User($tecnicoId, $tecnicoName, $tecnicoUsername, $password);
        $this->client = new Client($clientId, $clientName, $clientPhone);
    }


    public function getId(){return $this->id;}
    public function getState(){return $this->state;}
    public function getName(){return $this->name;}
    public function getTecnico(){return $this->tecnico;}
    public function getClient(){return $this->client;}

    public function setState($state){$this->state = $state;}
    public function SetId($id){$this->id = $id;}
    public function setName($name){$this->name = $name;}
    public function setTecnico($tecnico){$this->tecnico = $tecnico;}
    public function setRoom($client){$this->client = $client;}
}
?>