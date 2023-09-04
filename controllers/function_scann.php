<?php
date_default_timezone_set('ASIA/JAKARTA');
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "root", "presensi");

if (isset($_POST['barcodeData'])) {
    $barcodeData = $_POST['barcodeData'];

    // Query untuk mencari data karyawan berdasarkan barcode
    $query = "SELECT * FROM pegawai WHERE nik = '$barcodeData'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Karyawan ditemukan, catat absensi
        $karyawan = mysqli_fetch_assoc($result);
        $nik = $karyawan['nik'];
        $jam = date("Y-m-d H:i:s"); // Format tanggal dan waktu saat ini
        $timestamp = strtotime($jam); // Mengonversi ke timestamp Unix

        echo $timestamp; // Menampilkan timestamp

        $insertQuery = "INSERT INTO table_absensi (nik, jam,) VALUES ($nik, '$jam')";
        if (mysqli_query($koneksi, $insertQuery)) {
            echo "Absensi berhasil dicatat untuk " . $karyawan['nama_pegawai'];
        } else {
            echo "Gagal mencatat absensi: " . mysqli_error($koneksi);
        }
    } else {
        echo "Karyawan dengan NIK $barcodeData tidak ditemukan.";
    }
} else {
    echo "Tidak ada data barcode yang diterima.";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
