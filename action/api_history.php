<?php
require_once '../config/database.php';
$username = $_GET['username'] ?? '';

$stmt = $pdo->prepare("SELECT waktu_lapor, keterangan FROM laporan WHERE username = ? ORDER BY id DESC");
$stmt->execute([$username]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$riwayat = [];
foreach($data as $row) {
    // Format teks yang akan muncul di HP: "2026-10-06 10:00:00 | Mouse Rusak"
    $riwayat[] = $row['waktu_lapor'] . " | " . $row['keterangan'];
}

// Format menjadi teks dengan pemisah koma agar langsung dikenali oleh ListView MIT App Inventor
echo implode(",", $riwayat);
?>