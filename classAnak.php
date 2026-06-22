<?php
// classAnak.php

// Hubungkan terlebih dahulu dengan file abstract class induknya
require_once 'Karyawan.php';

// ==========================================
// 1. SUBCLASS KARYAWAN KONTRAK
// ==========================================
class KaryawanKontrak extends Karyawan {
    // Properti tambahan spesifik
    protected $durasi_kontrak_bulanan;
    protected $agensi_penyalur;

    // Constructor untuk menginisialisasi data global dan spesifik
    public function __construct($id, $nama, $dept, $hari, $gaji, $durasi, $agensi) {
        // Memanggil constructor dari class induk (Karyawan)
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        
        // Mengisi properti tambahan spesifik
        $this->durasi_kontrak_bulanan = $durasi;
        $this->agensi_penyalur = $agensi;
    }

    // Wajib dideklarasikan kosong dulu agar tidak eror (Isi bodinya di-override pada Tahap 5)
    public function hitung_gaji_bersih() {}
    public function tampilkan_profil_karyawan() {}
}

// ==========================================
// 2. SUBCLASS KARYAWAN TETAP
// ==========================================
class KaryawanTetap extends Karyawan {
    // Properti tambahan spesifik
    protected $tunjangan_kesehatan;
    protected $opsi_saham_td;

    public function __construct($id, $nama, $dept, $hari, $gaji, $tunjangan, $opsiSaham) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        
        $this->tunjangan_kesehatan = $tunjangan;
        $this->opsi_saham_td = $opsiSaham;
    }

    public function hitung_gaji_bersih() {}
    public function tampilkan_profil_karyawan() {}
}

// ==========================================
// 3. SUBCLASS KARYAWAN MAGANG
// ==========================================
class KaryawanMagang extends Karyawan {
    // Properti tambahan spesifik
    protected $uang_saku_bulanan;
    protected $sertifikat_kampus_merdeka;

    public function __construct($id, $nama, $dept, $hari, $gaji, $uangSaku, $sertifikat) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        
        $this->uang_saku_bulanan = $uangSaku;
        $this->sertifikat_kampus_merdeka = $sertifikat;
    }

    public function hitung_gaji_bersih() {}
    public function tampilkan_profil_karyawan() {}
}
?>