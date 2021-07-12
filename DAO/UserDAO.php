<?php

namespace DAO;


use Models\User;
use DAO\Connection;
use \Exception as Exception;

class UserDAO
{
    private $connection;
    private $tableName = "tecnico";
    public function __construct(){
        $query = "INSERT INTO tecnico (username,name,password) VALUES ('CybeRViiRuZ','Nahuel Flores','123456'),('MatiDios','Matias Di Croce Bernard','654321'),('BadBoy','Facundo Auciello','098745');";
        try{
            $this->connection = Connection::getInstance();
            $this->connection->execute($query);
        }
        catch(Exception $ex)
        {
            
        }
    }

    public function add($name, $username, $password)
    {
        $query = "INSERT INTO $this->tableName (name,username,password) VALUES (:name,:username,:password)";
        $parameters["name"] = $name;
        $parameters["username"] = $username;
        $parameters["password"] = $password;
        try {
            $this->connection = Connection::getInstance();
            $this->connection->executeNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getAll()
    {
        $query = "SELECT id, name, username,password from $this->tableName";
        try {
            $this->connection = Connection::getInstance();
            $results = $this->connection->execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
        $tecnicoList = array();
        foreach ($results as $row) {
            $actualUser = new User($row["id"], $row["name"], $row["username"], $row["password"]);
            $tecnicoList[] = $actualUser;
        }
        return $tecnicoList;
    }

    public function modify($modifiedUser)
    {
        $query = "UPDATE $this->tableName set name=:name, username=:username, password=:password where id=:id;";
        $params["name"] = $modifiedUser->getName();
        $params["username"] = $modifiedUser->getUsername();
        $params["password"] = $modifiedUser->getPassword();
        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($query, $params);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getById($id)
    {
        $query = "SELECT id, name,username,password
            where id=$id";
        try {
            $this->connection = Connection::getInstance();
            $results = $this->connection->execute($query);
            
        } catch (Exception $ex) {
            throw $ex;
        }
        $row = $results[0];
        $user = new User($row["id"],$row["name"], $row["username"], $row["password"]);
        return $user;
    }

    public function remove($id)
    {
        $query = "DELETE FROM $this->tableName WHERE id=$id";
        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
?>
