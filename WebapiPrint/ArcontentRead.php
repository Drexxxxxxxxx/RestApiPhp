<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../Bd/database.php';
include_once '../Querys/ArcontentQuery.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Arcontent($db);

// query products
$stmt = $product->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // products array
    $products_arr=array();
    $products_arr["Arcontent"]=array();
 
    $mediaitem_arr=array();
    $mediaitem_arr["mediaObjects"]=array();

    $arcarditem_arr=array();
    $arcarditem_arr["card"]=array();
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        $productcard = new Arcontent($db);
        $stmtcard = $productcard->readcard($row['id']);
        $numcard = $stmtcard->rowCount();
        $cardarray2 = array();
        if($numcard>0){
            while ($rowcard = $stmtcard->fetch(PDO::FETCH_ASSOC)){
                extract($rowcard);
                $arcarditem=array(
                    "title" => $rowcard['title'],
                    "description" => $rowcard['description'],
                    "Type" => $rowcard['Type'],
                    "Url" => $rowcard['Url'],
                    "Androidstoreurl" => $rowcard['Androidstoreurl'],
                    "IosStoreUrl " => $rowcard['IosStoreUrl']
                );
                array_push($cardarray2, $arcarditem);
            } 
        }

        $productmedia = new Arcontent($db);
        $stmtmedia = $productmedia->readmedia($row['id']);
        $numcardmedia = $stmtmedia->rowCount();
        $mediaarray2 = array();
        if($numcardmedia>0){
            while ($rowmedia = $stmtmedia->fetch(PDO::FETCH_ASSOC)){
                extract($rowmedia);
                $mediaitem=array(
                    "type" => $rowmedia['type'],
                    "resourceUrl" => $rowmedia['resourceUrl'],
                );
                array_push($mediaarray2, $mediaitem);
            } 
        }
          

       /* array_push($mediaitem_arr["mediaObjects"], $mediaitem);

        array_push($arcarditem_arr["card"], $arcarditem);*/


        $product_item=array(
            "id" => $row['id'],
            "name" => $row['name'],
            "imageAnchorUrl" => "http://i9ar.innovagencyhost.com/bo/".$row['imageAnchorUrl'],
            "shareUrl" => $row['shareUrl'],   
            "mediaObjects" => $mediaarray2,
            "card" => $cardarray2
        );
        array_push($products_arr["Arcontent"], $product_item);
    }
 
    echo json_encode($products_arr);
}
 
else{
    echo json_encode(
        array("message" => "No ArContent found.")
    );
}
?>