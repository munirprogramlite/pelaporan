<div class="sidebar">
    <h3>Menu Utama</h3>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        
        <?php if ($_SESSION['role'] == '1'): ?>
            <!-- Menu Khusus Siswa / Pelapor -->
            <li><a href="laporan.php">Buat Laporan Baru</a></li>
            <li><a href="history.php">Riwayat Laporan Saya</a></li>
        <?php endif; ?>

        <?php if ($_SESSION['role'] == '2' || $_SESSION['role'] == '3'): ?>
            <!-- Menu Khusus Pengawas & Admin -->
            <li><a href="admin_panel.php">Kelola Semua Laporan</a></li>
            <li><a href="cetak_print.php" target="_blank">Cetak / Rekap Laporan</a></li>
        <?php endif; ?>
        
        <li><a href="../logout.php" onclick="return confirm('Yakin ingin keluar?');">Logout</a></li>
    </ul>
</div>