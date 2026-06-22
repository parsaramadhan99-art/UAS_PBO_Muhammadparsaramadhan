<?php
// koneksi_database.php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    // DISAMAKAN PERSIS dengan instruksi nomor 1 di gambar
    private $database = "DB_SIMULASI_PBO_TI1C_MuhammadParsaRamadhan"; 
    
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }
}
?>