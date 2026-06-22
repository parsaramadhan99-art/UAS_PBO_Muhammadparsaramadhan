<?php
// Karyawan.php

abstract class Karyawan {
    // Properti terenkapsulasi dengan hak akses protected
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hari_kerja_masuk;
    protected $gaji_dasar_perhari;

    // Constructor untuk menginisialisasi data atribut global
    public function __construct($id, $nama, $dept, $hari, $gaji) {
        $this->id_karyawan = $id;
        $this->nama_karyawan = $nama;
        $this->departemen = $dept;
        $this->hari_kerja_masuk = $hari;
        $this->gaji_dasar_perhari = $gaji;
    }

    // Metode abstrak tanpa isi body (wajib di-override oleh class anak nanti)
    abstract public function hitung_gaji_bersih();
    abstract public function tampilkan_profil_karyawan();
}
?>