<?php
// index.php

// Memanggil nama file database.php Anda yang benar agar tidak fatal error
require_once 'database.php'; 
require_once 'classAnak.php';

$db = new Database();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Penggajian Karyawan - TRPL1A</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; }
        h1 { text-align: center; color: #333; }
        h2 { color: #2c3e50; border-bottom: 2px solid #2c3e50; padding-bottom: 5px; margin-top: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; background-color: #fff; }
        th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #2c3e50; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .gaji { font-weight: bold; color: #27ae60; }
    </style>
</head>
<body>

    <h1>Daftar Slip Gaji & Informasi Karyawan (Dinamis)</h1>

    <h2>Kategori: Karyawan Tetap</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Hari Masuk</th>
                <th>Gaji / Hari</th>
                <th>Tunjangan Kesehatan</th>
                <th>Opsi Saham</th>
                <th>Gaji Bersih</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataTetap = $db->ambilDataKaryawanBerdasarkanStatus('Tetap');
            while ($row = $dataTetap->fetch_assoc()) {
                $karyawan = new KaryawanTetap(
                    $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                    $row['hari_kerja_masuk'], $row['gaji_dasar_perhari'],
                    $row['tunjangan_kesehatan'], $row['opsi_saham_td']
                );
                echo "<tr>";
                echo "<td>{$row['id_karyawan']}</td>";
                echo "<td>{$row['nama_karyawan']}</td>";
                echo "<td>{$row['departemen']}</td>";
                echo "<td>{$row['hari_kerja_masuk']} hari</td>";
                echo "<td>Rp " . number_format($row['gaji_dasar_perhari'], 0, ',', '.') . "</td>";
                echo "<td>Rp " . number_format($row['tunjangan_kesehatan'], 0, ',', '.') . "</td>";
                echo "<td>{$row['opsi_saham_td']}</td>";
                echo "<td class='gaji'>Rp " . number_format($karyawan->hitung_gaji_bersih(), 0, ',', '.') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Kategori: Karyawan Kontrak</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Hari Masuk</th>
                <th>Gaji / Hari</th>
                <th>Durasi Kontrak</th>
                <th>Agensi Penyalur</th>
                <th>Gaji Bersih</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataKontrak = $db->ambilDataKaryawanBerdasarkanStatus('Kontrak');
            while ($row = $dataKontrak->fetch_assoc()) {
                $karyawan = new KaryawanKontrak(
                    $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                    $row['hari_kerja_masuk'], $row['gaji_dasar_perhari'],
                    $row['durasi_kontrak_bulanan'], $row['agensi_penyalur']
                );
                echo "<tr>";
                echo "<td>{$row['id_karyawan']}</td>";
                echo "<td>{$row['nama_karyawan']}</td>";
                echo "<td>{$row['departemen']}</td>";
                echo "<td>{$row['hari_kerja_masuk']} hari</td>";
                echo "<td>Rp " . number_format($row['gaji_dasar_perhari'], 0, ',', '.') . "</td>";
                echo "<td>{$row['durasi_kontrak_bulanan']} Bulan</td>";
                echo "<td>{$row['agensi_penyalur']}</td>";
                echo "<td class='gaji'>Rp " . number_format($karyawan->hitung_gaji_bersih(), 0, ',', '.') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Kategori: Karyawan Magang</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Hari Masuk</th>
                <th>Gaji / Hari</th>
                <th>Uang Saku</th>
                <th>Sertifikat</th>
                <th>Gaji Bersih (Potongan 20%)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataMagang = $db->ambilDataKaryawanBerdasarkanStatus('Magang');
            while ($row = $dataMagang->fetch_assoc()) {
                $karyawan = new KaryawanMagang(
                    $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                    $row['hari_kerja_masuk'], $row['gaji_dasar_perhari'],
                    $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']
                );
                echo "<tr>";
                echo "<td>{$row['id_karyawan']}</td>";
                echo "<td>{$row['nama_karyawan']}</td>";
                echo "<td>{$row['departemen']}</td>";
                echo "<td>{$row['hari_kerja_masuk']} hari</td>";
                echo "<td>Rp " . number_format($row['gaji_dasar_perhari'], 0, ',', '.') . "</td>";
                echo "<td>Rp " . number_format($row['uang_saku_bulanan'], 0, ',', '.') . "</td>";
                echo "<td>{$row['sertifikat_kampus_merdeka']}</td>";
                echo "<td class='gaji'>Rp " . number_format($karyawan->hitung_gaji_bersih(), 0, ',', '.') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>