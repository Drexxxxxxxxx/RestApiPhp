<?php
class Arcontent{
 
    // database connection and table name
    private $conn;

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
function read(){
 
    // select all query
   /* if(isset($_REQUEST['typeKey']))
    {*/
        $query = "select arcontent_id AS id, arcontent_name AS name, arcontent_image_anchor_url AS imageAnchorUrl, arcontent_share_url AS shareUrl FROM ARContent WHERE arcontent_edition_id = '" .$_REQUEST['id']. "'";
   /* }
    else
    {
    $query = "select edition.edition_id AS id, edition_image_anchor_url AS imageAnchorUrl, edition_title AS title, edition_number AS editionNr, edition_date AS date FROM edition, editiontype, client WHERE edition_enabled=1 AND client.client_id = editiontype.editiontype_client_id AND edition.edition_editiontype_id = editiontype.editiontype_id AND client.client_key = '" .$_REQUEST['clientKey']. "'";
    }*/
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

function readcard($id){
 
    // select all query
   /* if(isset($_REQUEST['typeKey']))
    {*/
        $query = "select arcontentcard_title AS title, arcontentcard_description AS description, arcontentcard_type AS Type, arcontentcard_url AS Url, arcontentcard_android_store_url AS Androidstoreurl, arcontentcard_ios_store_url AS IosStoreUrl FROM Arcontentcard WHERE arcontentcard_arcontent_id = '" .$id. "'";
   /* }
    else
    {
    $query = "select edition.edition_id AS id, edition_image_anchor_url AS imageAnchorUrl, edition_title AS title, edition_number AS editionNr, edition_date AS date FROM edition, editiontype, client WHERE edition_enabled=1 AND client.client_id = editiontype.editiontype_client_id AND edition.edition_editiontype_id = editiontype.editiontype_id AND client.client_key = '" .$_REQUEST['clientKey']. "'";
    }*/
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

function readmedia($id){
 
    // select all query
   /* if(isset($_REQUEST['typeKey']))
    {*/
        $query = "select armedia_type AS type, armedia_url AS resourceUrl FROM Armedia WHERE armedia_arcontent_id = '" .$id. "'";
   /* }
    else
    {
    $query = "select edition.edition_id AS id, edition_image_anchor_url AS imageAnchorUrl, edition_title AS title, edition_number AS editionNr, edition_date AS date FROM edition, editiontype, client WHERE edition_enabled=1 AND client.client_id = editiontype.editiontype_client_id AND edition.edition_editiontype_id = editiontype.editiontype_id AND client.client_key = '" .$_REQUEST['clientKey']. "'";
    }*/
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
}
?>