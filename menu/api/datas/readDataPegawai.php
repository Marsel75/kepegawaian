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
include_once '../objects/RiwayatPendidikan.php';
include_once '../objects/Jabatan.php';
include_once '../objects/Pangkat.php';
include_once '../objects/RiwayatJabatan.php';
include_once '../objects/Alamat.php';
include_once '../objects/Kegiatan.php';



 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$pegawai = new Pegawai($db);

$pendidikan = new RiwayatPendidikan($db);

$jabatan = new Jabatan($db);

$pangkat = new Pangkat($db);

$riwayatjabatan = new RiwayatJabatan($db);

$alamat = new Alamat($db);

$kegiatan = new Kegiatan($db);

//$data =json_decode(file_get_contents("php://input"));
session_start();
$DataNip=$_SESSION['DataNip'];
$pegawai->Nip= $DataNip;
// query products
$stmt = $pegawai->readOne();   
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $pegawai_arr=array();
    $pegawai_arr=array(
        "records"=>array(),
        "Nip"=>$DataNip
    );
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        
        $pegawai_item=array(
            "Nip" => $Nip,
            "Nama" => $Nama,
            "Sex"=>$Sex,
            "Tempat_Lahir"=>$Tempat_Lahir,
            "Tgl_Lahir"=>$Tgl_Lahir,
            "Agama"=>$Agama,
            "Status_Perkawinan"=>$Status_Perkawinan,
            "Tgl_Masuk"=>$Tgl_Masuk,
            "Jenis_Pegawai"=>$Jenis_Pegawai,
            "Status"=>$Status,
            "Photo"=>$Photo,
            "JenjangPendidikan"=>array(),
            "RiwayatJabatan"=>array(),
            "Alamat"=>array(),
            "Kegiatan"=>array(),
            "TanggalBuat"=>date('d F Y')
        );

        $pendidikan->Nip=$DataNip;
        $stmtpendidikan = $pendidikan->readByNip();
        $numpendidikan = $stmtpendidikan->rowCount();
        if($numpendidikan>0)
        {
            while ($rowpendidikan = $stmtpendidikan->fetch(PDO::FETCH_ASSOC)){

            // extract row
            // this will make $row['name'] to
            // just $name only
                extract($rowpendidikan);
                $itempendidikan = array(
                    "Id" =>$Id, 
                    "Jenjang_Pendidikan"=> $Jenjang_Pendidikan,
                    "Jurusan"=>$Jurusan,
                    "No_Ijazah"=>$No_Ijazah,
                    "Tgl_Ijazah"=>$Tgl_Ijazah,
                    "Tempat"=>$Tempat,
                    "Ketua"=>$Ketua
                );


                array_push($pegawai_item["JenjangPendidikan"], $itempendidikan);
                }
        }

        $riwayatjabatan->Nip = $DataNip;

        $stmtriwayatjabatan = $riwayatjabatan->readByNip();
        $numriwayatjabatan = $stmtriwayatjabatan->rowCount();
        if($numriwayatjabatan>0)
        {
            while ($rowriwayatjabatan = $stmtriwayatjabatan->fetch(PDO::FETCH_ASSOC)){

            // extract row
            // this will make $row['name'] to
            // just $name only
                extract($rowriwayatjabatan);
                $jabatan->Id=$Jabatan_Id;
                $jabatan->readOne();
                $pangkat->Id = $Pangkat_Id;
                $pangkat->readOne();
                $itemriwayatpangkat = array(
                    "Id" => $Id,
                    "Jabatan_Id"=>$jabatan->Id,
                    "Jabatan"=>$jabatan->Jabatan,
                    "Pangkat_Id"=>$pangkat->Id,
                    "Pangkat"=>$pangkat->Pangkat."/".$pangkat->Golongan,
                    "Tgl_Menjabat"=>$Tgl_Menjabat,
                    "Tgl_Terakhir_Menjabat"=>$Tgl_Terakhir_Menjabat,
                    "Gaji_Pokok"=>$Gaji_Pokok,
                    "No_SK_Jabatan"=>$No_SK_Jabatan,
                    "Tgl_SK"=>$Tgl_SK
                );

                array_push($pegawai_item["RiwayatJabatan"], $itemriwayatpangkat);

                }
        }
        $alamat->Nip=$DataNip;
        $stmtalamat = $alamat->readByNip();
        $numalamat = $stmtalamat->rowCount();
        if($numalamat>0)
        {
            while ($rowalamat = $stmtalamat->fetch(PDO::FETCH_ASSOC)){

            // extract row
            // this will make $row['name'] to
            // just $name only
                extract($rowalamat);
                $itemalamat = array(
                    'Id' => $Id,
                    'Alamat'=>$Alamat,
                    'Provinsi'=>$Provinsi,
                    'Kabupaten'=>$Kabupaten,
                    'Kecamatan'=>$Kecamatan,
                    'Kelurahan'=>$Kelurahan,
                    'Status'=>$Status 
                );
                array_push($pegawai_item["Alamat"], $itemalamat);
            }
        }
        $kegiatan->Nip=$DataNip;
        $stmtkegiatan=$kegiatan->readByNip();
        $numkegiatan = $stmtkegiatan->rowCount();
        if($numkegiatan>0)
        {
            while ($rowkegiatan = $stmtkegiatan->fetch(PDO::FETCH_ASSOC)){

                // extract row
                // this will make $row['name'] to
                // just $name only
                    extract($rowkegiatan);
                    $itemkegiatan = array(
                        'Id' => $Id,
                        'Jenis_Kegiatan'=>$Jenis_Kegiatan,
                        'Nama_Kegiatan'=>$Nama_Kegiatan,
                        'Tgl_Mulai'=>$Tgl_Mulai,
                        'Tgl_Selesai'=>$Tgl_Selesai,
                        'Peran'=>$Peran,
                        'Tempat'=>$Tempat,
                        'Hasil'=>$Hasil 
                    );
                    array_push($pegawai_item["Kegiatan"], $itemkegiatan);
            }            
        }
        echo json_encode($pegawai_item);
 
        //array_push($pegawai_arr["records"], $pegawai_item);
    }
 
    //echo json_encode($pegawai_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Pegawai found")
    );
}
?>