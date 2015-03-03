<?php

class WineTableGateway {
    
    private $connection;
    
    public function __construct($c){
        $this->connection = $c;
        
    }
    
    public function getWines(){
        
      $sqlQuery = "SELECT * FROM wines";
        
         $statement = $this->connection->prepare($sqlQuery);
         $status = $statement->execute();
        
        if(!$status){
            die("could not retrieve wines");
         
        }
        
        return $statement;
    }
    
    public function getWineById($id){
        
        $sqlQuery = "SELECT * FROM wines WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("could not retrieve wines");
        }
        
        return $statement;
    }
    
    public function insertWine( $w, $d, $y, $te, $t){
        $sqlQuery = "INSERT INTO wines".
                "(wine, description, year, temperature, type)" .
                "VALUES (:wine, :description, :year, :temperature, :type)";
   
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "wine" => $w,
            "description" => $d,
            "year" => $y,
            "temperature" => $te,
            "type" => $t
        );
        
        $status = $statement->execute($params);
        
        if(!status){
            die("could not insert wine");
        }
         
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
    
    public function deletewine ($id){
        $sqlQuery = "DELETE FROM wines WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status){
            die("Could not delete wine");
        }
        
        return ($statement->rowCount() == 1);
    }
   
    public function updateWine($id, $w, $d, $y, $te, $t){
        $sqlQuery=
                "UPDATE wines SET ".
                "wine = :wine,".
                "description = :description,".
                "year = :year,".
                "temperature = :temperature,".
                "type = :type".
                "WHERE id = :id";
        
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
              "id" => $id,
              "wine" => $d,
              "description" => $d,
              "year" => $y,
              "temperature" => $te,
              "type" => $t,        
    );

        $status = $statement->execute($params);
        
        return ($statement->rowCount() == 1);
        
    }
    
    
    
}
