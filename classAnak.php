<?php
// classAnak.php

require_once 'Karyawan.php';

// SUBCLASS KARYAWAN KONTRAK (Tahap 4 & 5)
class KaryawanKontrak extends Karyawan {
    protected $durasi_kontrak_bulanan;
    protected $agensi_penyalur;

    public function __construct($id, $nama, $dept, $hari, $gaji, $durasi, $agensi) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->durasi_kontrak_bulanan = $durasi;
        $this->agensi_penyalur = $agensi;
    }

    // Overriding Perhitungan Gaji Kontrak
    public function hitung_gaji_bersih() {
        return $this->hari_kerja_masuk * $this->gaji_dasar_perhari;
    }

    public function tampilkan_profil_karyawan() {
        return "ID: $this->id_karyawan | Nama: $this->nama_karyawan";
    }
}

// SUBCLASS KARYAWAN TETAP (Tahap 4 & 5)
class KaryawanTetap extends Karyawan {
    protected $tunjangan_kesehatan;
    protected $opsi_saham_td;

    public function __construct($id, $nama, $dept, $hari, $gaji, $tunjangan, $opsiSaham) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->tunjangan_kesehatan = $tunjangan;
        $this->opsi_saham_td = $opsiSaham;
    }

    // Overriding Perhitungan Gaji Tetap + Tunjangan
    public function hitung_gaji_bersih() {
        return ($this->hari_kerja_masuk * $this->gaji_dasar_perhari) + $this->tunjangan_kesehatan;
    }

    public function tampilkan_profil_karyawan() {
        return "ID: $this->id_karyawan | Nama: $this->nama_karyawan";
    }
}

// SUBCLASS KARYAWAN MAGANG (Tahap 4 & 5)
class KaryawanMagang extends Karyawan {
    protected $uang_saku_bulanan;
    protected $sertifikat_kampus_merdeka;

    public function __construct($id, $nama, $dept, $hari, $gaji, $uangSaku, $sertifikat) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->uang_saku_bulanan = $uangSaku;
        $this->sertifikat_kampus_merdeka = $sertifikat;
    }

    // Overriding Perhitungan Gaji Magang (Potongan 20% / Sisa 80%)
    public function hitung_gaji_bersih() {
        return ($this->hari_kerja_masuk * $this->gaji_dasar_perhari) * 0.80;
    }

    public function tampilkan_profil_karyawan() {
        return "ID: $this->id_karyawan | Nama: $this->nama_karyawan";
    }
}
?>