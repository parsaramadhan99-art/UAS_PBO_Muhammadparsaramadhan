<?php
// koneksi.php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "DB_LATIHAN_PBO_TRPL1A_MuhammadParsaRamadhan"; 
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    // ===================================================================
    // METODE QUERY SPESIFIK (Ditambahkan untuk memenuhi kriteria Tahap 4)
    // ===================================================================
    public function ambilDataKaryawanBerdasarkanStatus($status) {
        // Menggunakan query SELECT * WHERE untuk memfilter kolom status_karyawan/jenis
        $query = "SELECT * FROM tabel_karyawan WHERE status_karyawan = '$status'";
        $result = $this->conn->query($query);
        return $result;
    }
}
?>