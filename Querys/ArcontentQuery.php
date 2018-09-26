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
        $query = "select arcontent.arcontent_id AS id, arcontent.arcontent_name AS name, arcontent.arcontent_image_anchor_url AS imageAnchorUrl, arcontent.arcontent_share_url AS shareUrl FROM arcontent WHERE arcontent.arcontent_edition_id = 1";
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
        $query = "select arcontentcard.arcontentcard_title AS title, arcontentcard.arcontentcard_description AS description, arcontentcard.arcontentcard_type AS Type, arcontentcard.arcontentcard_url AS Url, arcontentcard.arcontentcard_android_store_url AS Androidstoreurl, arcontentcard.arcontentcard_ios_store_url AS IosStoreUrl FROM arcontentcard WHERE arcontentcard.arcontentcard_arcontent_id = '" .$id. "'";
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
        $query = "select armedia.armedia_type AS type, armedia.armedia_url AS resourceUrl FROM armedia WHERE armedia_arcontent_id = '" .$id. "'";
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