<?php

namespace DAO;

use Models\ToRepair as ToRepair;

use \Exception as Exception;
use NumberFormatter;

class ToRepairDAO
{
    private $connection;
    private $tableName = "toRepair";


    public function add($state,$name,$id_tecnico,$id_contact)
    {
        $query = "INSERT INTO $this->tableName (state,NAME,id_contact,id_tecnico) 
                        VALUES (:state,:name,:id_contact,:id_tecnico);";
        $parameters["state"] = $state;
        $parameters["name"] = $name;
        $parameters["id_contact"] = (int) $id_contact;
        $parameters["id_tecnico"] = (int)$id_tecnico;
        try {
            $this->connection = Connection::getInstance();
            $this->connection->executeNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function remove($id)
    {
        $query = "DELETE FROM $this->tableName 
                WHERE id=$id";
        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * devuelve todo el array de funciones futuras de una sala 
     * 
     */
    public function getAll()
    {
        $query = "SELECT p.id,p.state,p.name,m.id as id_user,m.name as name_user,m.username,m.password,n.id as id_contact,n.name as name_contact,n.phone 
                from $this->tableName p
                inner join tecnico m on m.id=p.id_tecnico
                inner join contact n on n.id=p.id_contact";
        try {
            $this->connection = Connection::getInstance();
            $results = $this->connection->execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
        $toRepairArray = array();
        foreach($results as $row)
        {
            array_push($toRepairArray, new ToRepair($row['id'], $row['state'], $row['name'], $row['id_user'], $row['name_user'], $row['username'], $row['password'], $row['id_contact'], $row['name_contact'], $row['phone']));
        }
        return $toRepairArray;
    }
    public function getWorkFrom ($idOfClient= "", $idOfUser = "")
    {
        $query = "SELECT t.id, t.name, t.state, u.id as id_user, u.name as name_user, u.username, u.password, c.id as id_contact, c.name as name_contact, c.phone
        from $this->tableName t
        inner join tecnico u on u.id = t.id_tecnico
        inner join contact c on c.id = t.id_contact
        where t.id_contact like  '%$idOfClient' and
        t.id_tecnico like '%$idOfUser'";
        try{
            $this->connection = Connection::getInstance();
            $results = $this->connection->execute($query);
        } catch (Exception $ex){
            throw $ex;
        }
        $toRepairArray = array();
        foreach($results as $row)
        {
            array_push($toRepairArray, new ToRepair($row['id'], $row['state'], $row['name'], $row['id_user'], $row['name_user'], $row['username'], $row['password'], $row['id_contact'], $row['name_contact'], $row['phone']));
        }

        return $toRepairArray;
    }
    

    public function modify($id, $name, $state)
    {
        $query = "UPDATE $this->tableName set name=:name, state=:state; where id = $id";
        
        $params["name"] = $name;
        $params["state"] = $state;
        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($query, $params);
        } catch (Exception $ex) {
            throw $ex;
        }
    }


}
?>