<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/Profil.php';
include_once '../objects/KegiatanKantor.php';
include_once '../objects/Pegawai.php';
include_once '../objects/RiwayatJabatan.php';

 
// instantiate database and product object
$database = new Database();

$db = $database->getConnection();
 
// initialize object
$profil = new Profil($db);

$kegiatankantor = new KegiatanKantor($db);

$pegawai = new Pegawai($db);

$jabatan = new RiwayatJabatan($db);
// query products
$stmt = $profil->read();   
$num = $stmt->rowCount();
$profil_arr=array();
$profil_arr["records"]=array();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        
        $profile_item=array(
            "Id" => $Id,
            "Visi_Misi" => $Visi_Misi,
            "Geografis"=> $Geografis,
            "Pimpinan"=>$Pimpinan,
            "Kontak"=>$Kontak,
            "Kegiatan"=>array(),
            "Pegawai"=>array()
        );

        $stmtkk = $kegiatankantor->read();
        while ($rowkk = $stmtkk->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($rowkk);
            $kegiatan_item=array(
                "Id"=>$Id,
                "Nama_Kegiatan"=>$Nama_Kegiatan,
                "Tgl_Mulai"=>$Tgl_Mulai,
                "Tgl_Selesai"=>$Tgl_Selesai,
                "Tempat"=>$Tempat,
                "Hasil"=>$Hasil,
                "Peserta"=>$Peserta,
                "Keterangan"=>$Keterangan
            );
            array_push($profile_item["Kegiatan"],$kegiatan_item);
        }

        $stmtpegawai = $pegawai->read();
        while ($rowpegawai = $stmtpegawai->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($rowpegawai);

            $jabatan->Nip = $Nip;
            $stmtjabatan = $jabatan->readByNipp();
            //$numjabatan = $stmtjabatan->rowCount();

            $pagawai_item=array(
                "Nip"=>$Nip,
                "Nama"=>$Nama,
                "Sex"=>$Sex,
                "Tempat_Lahir"=>$Tempat_Lahir,
                "Tgl_Lahir"=>$Tgl_Lahir,
                "Agama"=>$Agama,
                "Status_Perkawinan"=>$Status_Perkawinan,
                "Tgl_Masuk"=>$Tgl_Masuk,
                "Jenis_Pegawai"=>$Jenis_Pegawai,
                "Status"=>$Status,
                "Photo"=>$Photo,
                "Jabatan"=>$jabatan->Jabatan
            );

            
            array_push($profile_item["Pegawai"], $pagawai_item);
        }
        array_push($profil_arr["records"], $profile_item);
    }

        echo json_encode($profil_arr);
    
}else{
    echo json_encode(
        array("message" => "No Pangkat found")
    );
}
?>