<?php
class Kegiatan{
 
    // database connection and table name
    private $conn;
    private $table_name = "kegiatan";
 
    // object properties
    public $Id;
    public $Nip;
    public $Jenis_Kegiatan;
    public $Nama_Kegiatan;
    public $Tgl_Mulai;
    public $Tgl_Selesai;
    public $Peran;
    public $Tempat;
    public $Hasil;
 
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

    function readByNip(){
        
        // select all query
        $query = "SELECT * from " . $this->table_name . " where Nip=?";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        $this->Nip=htmlspecialchars(strip_tags($this->Nip));

        $stmt->bindParam(1, $this->Nip);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
     }


    function readOne(){
        
           // select all query
           $query = "SELECT * from " . $this->table_name . " where IdBarang=?";
        
           // prepare query statement
           $stmt = $this->conn->prepare($query);

           $this->IdBarang=htmlspecialchars(strip_tags($this->IdBarang));

           $stmt->bindParam(1, $this->IdBarang);
        
           // execute query
           $stmt->execute();
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
           $this->NamaBarang= $row['NamaBarang'];
           $this->Stock=$row['Stock'];
           $this->Keterangan=$row['Keterangan'];
           $this->KategoriId=$row['KategoriId'];
        }

    

   // create product
    function create(){
    
       // query to insert record
       $query = "INSERT INTO
                   " . $this->table_name . "
               SET
                   NamaBarang=:NamaBarang, Stock=:Stock, Keterangan=:Keterangan, KategoriId=:KategoriId";
    
       // prepare query
       $stmt = $this->conn->prepare($query);
    
       // sanitize
       $this->NamaBarang=htmlspecialchars(strip_tags($this->NamaBarang));
       $this->Stock=htmlspecialchars(strip_tags($this->Stock));
       $this->Keterangan=htmlspecialchars(strip_tags($this->Keterangan));
       $this->KategoriId=htmlspecialchars(strip_tags($this->KategoriId));
    
       // bind values
       $stmt->bindParam(":NamaBarang", $this->NamaBarang);
       $stmt->bindParam(":Stock", $this->Stock);
       $stmt->bindParam(":Keterangan", $this->Keterangan);
       $stmt->bindParam(":KategoriId", $this->KategoriId);
    
       // execute query
       if($stmt->execute()){
            $this->IdBarang = $this->conn->lastInsertId();
           return true;
       }else{
           return false;
       }
   }

   // update the product
    function update(){
    
       // update query
       $query = "UPDATE
                   " . $this->table_name . "
               SET
                    Nama=:Nama,
                    Sex=:Sex,
                    Tempat_Lahir=:Tempat_Lahir,
                    Tgl_Lahir=:Tgl_Lahir,
                    Agama=:Agama,
                    Status_Perkawinan=:Status_Perkawinan,
                    Tgl_Masuk=:Tgl_Masuk,
                    Jenis_Pegawai=:Jenis_Pegawai,
                    Status=:Status
               WHERE
                   Nip = :Nip";
    
       // prepare query statement
       $stmt = $this->conn->prepare($query);
    
       // sanitize
       $this->Nama=htmlspecialchars(strip_tags($this->Nama));
       $this->Sex=htmlspecialchars(strip_tags($this->Sex));
       $this->Tempat_Lahir=htmlspecialchars(strip_tags($this->Tempat_Lahir));
       $this->Tgl_Lahir=htmlspecialchars(strip_tags($this->Tgl_Lahir));
       $this->Agama=htmlspecialchars(strip_tags($this->Agama));
       $this->Status_Perkawinan=htmlspecialchars(strip_tags($this->Status_Perkawinan));
       $this->Tgl_Masuk=htmlspecialchars(strip_tags($this->Tgl_Masuk));
       $this->Jenis_Pegawai=htmlspecialchars(strip_tags($this->Jenis_Pegawai));
       $this->Status=htmlspecialchars(strip_tags($this->Status));
       $this->Nip=htmlspecialchars(strip_tags($this->Nip));
    
       // bind new values
       $stmt->bindParam(":Nama", $this->Nama);
       $stmt->bindParam(":Sex", $this->Sex);
       $stmt->bindParam(":Tempat_Lahir", $this->Tempat_Lahir);
       $stmt->bindParam(":Tgl_Lahir", $this->Tgl_Lahir);
       $stmt->bindParam(":Agama", $this->Agama);
       $stmt->bindParam(":Status_Perkawinan", $this->Status_Perkawinan);
       $stmt->bindParam(":Tgl_Masuk", $this->Tgl_Masuk);
       $stmt->bindParam(":Jenis_Pegawai", $this->Jenis_Pegawai);
       $stmt->bindParam(":Status", $this->Status);
       $stmt->bindParam(":Nip", $this->Nip);
    
       // execute the query
       if($stmt->execute()){
           return true;
       }else{
           return false;
       }
   }

   function updateStock($St){
    
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                 Stock=:Stock
            WHERE
                IdBarang = :IdBarang";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $St=htmlspecialchars(strip_tags($St));
    $this->IdBarang=htmlspecialchars(strip_tags($this->IdBarang));
 
    // bind new values
    $stmt->bindParam(":Stock", $St);
    $stmt->bindParam(":IdBarang", $this->IdBarang);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

   // delete the product
    function delete(){
    
       // delete query
       $query = "DELETE FROM " . $this->table_name . " WHERE IdBarang = ?";
    
       // prepare query
       $stmt = $this->conn->prepare($query);
    
       // sanitize
       $this->IdBarang=htmlspecialchars(strip_tags($this->IdBarang));
    
       // bind id of record to delete
       $stmt->bindParam(1, $this->IdBarang);
    
       // execute query
       if($stmt->execute()){
           return true;
       }else
       {
            return false;
       }
   }
}