<?php
error_reporting(0); // Ieu nu dipikabutuh!
require_once '../config/database.php';
require_once '../config/database.php';

// 1. Tangkap data teks dari URL
$username = $_GET['username'] ?? 'Anonim';
$keterangan = $_GET['keterangan'] ?? '';

// 2. Tangkap file foto mentah dari MIT App Inventor
$data_gambar = file_get_contents('php://input'); 

if (empty($data_gambar)) {
    echo "gagal_gambar_kosong"; 
    exit;
}

// 3. Buat nama file unik (berdasarkan waktu) agar tidak bentrok
$nama_file = time() . "_" . $username . ".jpg";
$path_simpan = "../uploads/" . $nama_file; 

// 4. Simpan gambar ke folder uploads dan catat ke database
if (file_put_contents($path_simpan, $data_gambar)) {
    
    $stmt = $pdo->prepare("INSERT INTO laporan (username, keterangan, nama_foto) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $keterangan, $nama_file])) {
        echo "sukses";
    } else {
        echo "gagal_database";
    }

} else {
    echo "gagal_simpan_folder";
}
?>