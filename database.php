<?php
// database.php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    // Menyesuaikan dengan nama database UAS Anda di Laragon/phpMyAdmin
    private $database = "db_uas_pbo_ti1c_muhammadparsaramadhan"; 
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    // METODE QUERY SPESIFIK (Tahap 4)
    public function ambilDataKaryawanBerdasarkanStatus($status) {
        // Memfilter data berdasarkan kolom status_karyawan
        $query = "SELECT * FROM tabel_karyawan WHERE status_karyawan = '$status'";
        $result = $this->conn->query($query);
        return $result;
    }
}
?>