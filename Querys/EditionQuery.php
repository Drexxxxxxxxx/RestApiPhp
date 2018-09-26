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
        $query = "select edition.edition_id AS id, edition_image_anchor_url AS imageAnchorUrl, edition_title AS title, edition_number AS editionNr, edition_date AS date FROM edition, editiontype, client WHERE edition_enabled=1 AND client.client_id = editiontype.editiontype_client_id AND edition.edition_editiontype_id = editiontype.editiontype_id AND client.client_key = '" .$_REQUEST['clientKey']. "' AND editiontype.editiontype_key = '".$_REQUEST['typeKey']."'";
    }
    else
    {
    $query = "select edition.edition_id AS id, edition_image_anchor_url AS imageAnchorUrl, edition_title AS title, edition_number AS editionNr, edition_date AS date FROM edition, editiontype, client WHERE edition_enabled=1 AND client.client_id = editiontype.editiontype_client_id AND edition.edition_editiontype_id = editiontype.editiontype_id AND client.client_key = '" .$_REQUEST['clientKey']. "'";
    }
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
}
?>