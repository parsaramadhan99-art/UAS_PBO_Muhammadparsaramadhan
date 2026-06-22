<?php
// classAnak.php

// Hubungkan terlebih dahulu dengan file abstract class induknya
require_once 'Karyawan.php';

// ==========================================
// 1. SUBCLASS KARYAWAN KONTRAK
// ==========================================
class KaryawanKontrak extends Karyawan {
    protected $durasi_kontrak_bulanan;
    protected $agensi_penyalur;

    public function __construct($id, $nama, $dept, $hari, $gaji, $durasi, $agensi) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->durasi_kontrak_bulanan = $durasi;
        $this->agensi_penyalur = $agensi;
    }

    // OVERRIDING: Gaji Bersih Karyawan Kontrak
    public function hitung_gaji_bersih() {
        return $this->hari_kerja_masuk * $this->gaji_dasar_perhari;
    }

    public function tampilkan_profil_karyawan() {
        return "ID: $this->id_karyawan | Nama: $this->nama_karyawan | Dept: $this->departemen | Status: Kontrak (Agensi: $this->agensi_penyalur)";
    }
}

// ==========================================
// 2. SUBCLASS KARYAWAN TETAP
// ==========================================
class KaryawanTetap extends Karyawan {
    protected $tunjangan_kesehatan;
    protected $opsi_saham_td;

    public function __construct($id, $nama, $dept, $hari, $gaji, $tunjangan, $opsiSaham) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->tunjangan_kesehatan = $tunjangan;
        $this->opsi_saham_td = $opsiSaham;
    }

    // OVERRIDING: Gaji Bersih Karyawan Tetap + Tunjangan Kesehatan
    public function hitung_gaji_bersih() {
        return ($this->hari_kerja_masuk * $this->gaji_dasar_perhari) + $this->tunjangan_kesehatan;
    }

    public function tampilkan_profil_karyawan() {
        return "ID: $this->id_karyawan | Nama: $this->nama_karyawan | Dept: $this->departemen | Status: Tetap (Saham: $this->opsi_saham_td)";
    }
}

// ==========================================
// 3. SUBCLASS KARYAWAN MAGANG
// ==========================================
class KaryawanMagang extends Karyawan {
    protected $uang_saku_bulanan;
    protected $sertifikat_kampus_merdeka;

    public function __construct($id, $nama, $dept, $hari, $gaji, $uangSaku, $sertifikat) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->uang_saku_bulanan = $uangSaku;
        $this->sertifikat_kampus_merdeka = $sertifikat;
    }

    // OVERRIDING: Gaji Bersih Karyawan Magang (Potongan upah 20% / sisa 80%)
    public function hitung_gaji_bersih() {
        return ($this->hari_kerja_masuk * $this->gaji_dasar_perhari) * 0.80;
    }

    public function tampilkan_profil_karyawan() {
        return "ID: $this->id_karyawan | Nama: $this->nama_karyawan | Dept: $this->departemen | Status: Magang (Program: $this->sertifikat_kampus_merdeka)";
    }
}
?>