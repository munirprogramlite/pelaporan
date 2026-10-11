<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != '1') { header('Location: dashboard.php'); exit; }
require_once '../config/database.php';

$pesan = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['nama'] ?? $_SESSION['user_id']; // Gunakan ID/Nama session sbg identitas
    
    // Tarik username asli dari database berdasarkan ID
    $stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user_asli = $stmt->fetchColumn();

    $keterangan = $_POST['keterangan'];
    $nama_foto = '';

    // Upload Foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $nama_foto = time() . '_' . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], '../uploads/' . $nama_foto);
    }

    $stmt = $pdo->prepare("INSERT INTO laporan (username, keterangan, nama_foto) VALUES (?, ?, ?)");
    if ($stmt->execute([$user_asli, $keterangan, $nama_foto])) {
        $pesan = "<p style='color:green;'>Laporan berhasil dikirim!</p>";
    } else {
        $pesan = "<p style='color:red;'>Gagal mengirim laporan.</p>";
    }
}

$title = 'Buat Laporan Baru';
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">
    <div class="card">
        <h2>Formulir Laporan Kerusakan</h2>
        <?= $pesan ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Keterangan Kerusakan</label>
                <textarea name="keterangan" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label>Upload Foto Bukti</label>
                <input type="file" name="foto" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn">Kirim Laporan</button>
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>