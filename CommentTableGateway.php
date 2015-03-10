<?php

Class CommentTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getComments() {
        $sqlQuery = 
                "SELECT c.*, w.wine FROM comments c
                 LEFT JOIN wines w ON c.wineId = w.id ";
        
         $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve computers");
    }
    
    return $statement;
   }

   
   
}
