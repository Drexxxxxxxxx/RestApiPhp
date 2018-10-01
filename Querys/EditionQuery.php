<?php
class Edition{
 
    // database connection and table name
    private $conn;

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
function read(){
 
    // select all query
    if(isset($_REQUEST['typeKey']))
    {
        $query = "select edition_id AS id, edition_image_anchor_url AS imageAnchorUrl, edition_title AS title, edition_number AS editionNr, edition_date AS date FROM Edition INNER JOIN EditionType ON editiontype_id = edition_editiontype_id AND editiontype_key = '".$_REQUEST['typeKey']."' INNER JOIN Client ON client_key = '" .$_REQUEST['clientKey']. "'";
    }
    else
    {
    $query = "select edition_id AS id, edition_image_anchor_url AS imageAnchorUrl, edition_title AS title, edition_number AS editionNr, edition_date AS date FROM Edition INNER JOIN EditionType ON editiontype_id = edition_editiontype_id INNER JOIN Client ON client_key = '" .$_REQUEST['clientKey']. "' WHERE edition_enabled = 1";
    }
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
}
?>