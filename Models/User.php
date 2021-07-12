<?php
    namespace Models;


    class User 
    {
        private $id;
        private $username;
        private $name;
        private $password;

        public function __construct($id,$name, $username, $password){
            $this->id = $id;
            $this->name = $name;
            $this->username = $username;
            $this->password = $password; 
            
        }


        //-----------------Getters-----------------
        
        public function getId(){return $this->id;}
        public function getName() {return $this->name;}
        public function getUsername() {return $this->username;}
        public function getPassword() {return $this->password;}

        //----------------Setters-------------------

        public function setId($id){$this->id = $id;}
        public function setName($name) {$this->name = $name;}
        public function setUser($user) {$this->user = $user;}
        public function setPassword($password) {$this->password = $password;} 
    }
?>