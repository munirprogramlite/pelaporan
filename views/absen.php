<?php
session_start();
if (!isset($_SESSION['user_id'])) header('Location: ../index.php');
$title = 'Absensi';
include '../includes/header.php';
include '../includes/sidebar.php';
?>
<div class="content">
    <h2>Halaman Absensi</h2>
    <p>Fitur sedang dikembangkan.</p>
</div>
<?php include '../includes/footer.php'; ?>