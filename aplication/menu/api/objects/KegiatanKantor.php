<?php
class KegiatanKantor{
    private $conn;
    private $table_name = "kegiatan_kantor";
 
    // object properties
    public $Id;
    public $Nama_Kegiatan;
    public $Tgl_Mulai;
    public $Tgl_Selesai;
    public $Tempat;
    public $Hasil;
    public $Peserta;
    public $Keterangan;
    public $Status;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // read products
    function read(){
    
       // select all query
       $query = "SELECT * from " . $this->table_name . "";
    
       // prepare query statement
       $stmt = $this->conn->prepare($query);
    
       // execute query
       $stmt->execute();
    
       return $stmt;
    }
}
?>