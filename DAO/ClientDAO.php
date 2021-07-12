<?php

namespace DAO;

use Models\Client as Client;
use \Exception as Exception;

class ClientDAO {
    private $connection;
    private $tableName = "contact";
    

    public function add($name, $phone)
    {
        $id = time();
        $query = "INSERT INTO $this->tableName (name,phone) 
                    VALUES (:name,:phone)";           
        $parameters["name"] =$name;
        $parameters["phone"] =$phone;
        try
        {
            $this->connection = Connection::getInstance();
            $this->connection->executeNonQuery($query, $parameters);
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function remove ($id)
    {
        $query = "DELETE FROM $this->tableName WHERE id=$id";  
        try
        {
            $this->connection=Connection::getInstance();
            return $this->connection->executeNonQuery($query);
        }
        catch(Exception $ex){
            throw $ex;
        }
    }

    public function modify($id, $name, $phone){
        $query="UPDATE $this->tableName set name=:name,phone=:phone WHERE id=$id";
        $params["name"]=$name;
        $params["phone"]=$phone;
        try {
            $this->connection=Connection::getInstance();
            return $this->connection->executeNonQuery($query, $params);
        } 
        catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getAll(){
        $query = "SELECT id, name, phone from $this->tableName";
        try {
            $this->connection = Connection::getInstance();
            $results = $this->connection->execute($query);
        }
        catch (Exception $ex){
            throw $ex;
        }
        $clientsArray = array();
        foreach ($results as $row)
        {
            array_push($clientsArray,new Client($row['id'], $row['name'], $row['phone']));
        }
        return $clientsArray;
    }
    
}

?>