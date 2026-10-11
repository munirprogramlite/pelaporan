<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] == '1') { exit('Akses ditolak'); }
require_once '../config/database.php';

$stmt = $pdo->query("SELECT * FROM laporan ORDER BY id DESC");
$laporan = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
        h2 { text-align: center; }
    </style>
</head>
<body onload="window.print()">
    <h2>Rekapitulasi Kerusakan Barang</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Pelapor</th>
            <th>Keterangan Kerusakan</th>
            <th>Waktu Dilaporkan</th>
        </tr>
        <?php $no=1; foreach($laporan as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['keterangan']) ?></td>
            <td><?= $row['waktu_lapor'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>