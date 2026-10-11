<?php
$title = 'Registrasi';
include 'includes/header.php';
?>
<div class="register-container">
    <h2>Daftar Akun</h2>
    <form action="action/proses_register.php" method="post">
        <label>Username</label><br>
        <input type="text" name="username" required><br><br>
        <label>Nama Lengkap</label><br>
        <input type="text" name="nama_lengkap" required><br><br>
        <label>Password</label><br>
        <input type="password" name="password" required><br><br>
        <label>Divisi/Kelas</label><br>
        <input type="text" name="divisi_kelas"><br><br>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="index.php">Login</a></p>
</div>
<?php include 'includes/footer.php'; ?>