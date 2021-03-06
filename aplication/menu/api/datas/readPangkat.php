<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/Pangkat.php';



 
// instantiate database and product object
$database = new Database();

$db = $database->getConnection();
 
// initialize object
$pangkat = new Pangkat($db);

 
// query products
$stmt = $pangkat->read();   
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $pangkat_arr=array();
    $pangkat_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        
        $pangkat_item=array(
            "Id" => $Id,
            "Pangkat" => $Pangkat,
            "Golongan"=> $Golongan
        );
            array_push($pangkat_arr["records"], $pangkat_item);
        }

        echo json_encode($pangkat_arr);
    
}else{
    echo json_encode(
        array("message" => "No Pangkat found")
    );
}
?>