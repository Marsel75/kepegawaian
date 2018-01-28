<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/Pegawai.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$pegawai = new Pegawai($db);
 
// query products
$data =json_decode(file_get_contents("php://input"));

$pegawai->Nip = $data->Nip;
$pegawai->Nama = $data->Nama;
$pegawai->Sex = $data->Sex;
$pegawai->Tempat_Lahir = $data->Tempat_Lahir;
$pegawai->Tgl_Lahir = $data->Tgl_Lahir;
$pegawai->Agama = $data->Agama;
$pegawai->Status_Perkawinan = $data->Status_Perkawinan;
$pegawai->Tgl_Masuk = $data->Tgl_Masuk;
$pegawai->Jenis_Pegawai = $data->Jenis_Pegawai;
$pegawai->Status = $data->Status;
if($pegawai->update())
{
    echo json_encode(
        array("message" => "Employees successfully changed")
    );
}
 
else{
    echo json_encode(
        array("message" => "No Pegawai found")
    );
}
?>