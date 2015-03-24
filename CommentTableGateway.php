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

 
 
  public function getCommentsByWineId($wineId) {
     
        $sqlQuery =
                "SELECT c.*, p.wine AS wineName
                 FROM comments c
                 LEFT JOIN wines p ON p.id = c.wineId
                 WHERE c.wineId = :wine_id";

        $params = array(
            "wine_id" => $wineId
        );
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve Wines");
        }

        return $statement;
    }
   

    public function getCommentById($id) {
        // execute a query to get the computer with the specified id
        $sqlQuery =
                "SELECT c.*, p.wine AS wineName
                 FROM comments c
                 LEFT JOIN wines p ON p.id = c.wines_id
                 WHERE c.id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve Comments");
        }

        return $statement;
    }

    public function insertComment($cn, $t, $b, $ds, $ti, $wId) {
        $sqlQuery = "INSERT INTO computers " .
                "(customerName, title, body, dateSubmitted, time, wine_id) " .
                "VALUES (:customerName, :title, :body, :dateSubmitted, :time, :wine_id)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "customerName" => $cn,
            "title" => $t,
            "body" => $b,
            "dateSubmitted" => $ds,
            "time" => $ti,
            "wine_id" => $wId
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not add comment");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteComment($id) {
        $sqlQuery = "DELETE FROM comments WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete comment");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateComment($id, $cn, $t, $b, $ds, $ti, $wId) {
        $sqlQuery =
                "UPDATE comments SET " .
                "customerName = :customerName, " .
                "title = :title, " .
                "body = :body, " .
                "dateSubmitted = :datedateSubmitted, " .
                "time = :time, " .
                "wine_id = :wine_id " .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "customerName" => $cn,
            "title" => $t,
            "body" => $b,
            "dateSubmitted" => $ds,
            "time" => $ti,
            "wine_id" => $wId
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}

