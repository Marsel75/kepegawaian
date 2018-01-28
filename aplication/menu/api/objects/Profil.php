<?php
class Profil{
    // database connection and table name
    private $conn;
    private $table_name = "profil";
 
    // object properties
    public $Id;
    public $Visi_Misi;
    public $Geografis;
    public $Pimpinan;
    public $Kontak;
 
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