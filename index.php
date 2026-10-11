<?php
$title = 'Login';
require_once 'config/constants.php';
include 'includes/header.php';
?>
<div class="login-container">
    <h2>Form Login</h2>
    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;"><?= htmlspecialchars($_GET['error']) ?></p>
    <?php endif; ?>
    <form action="action/proses_login.php" method="post">
        <label>Username</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Daftar</a></p>
</div>
<?php include 'includes/footer.php'; ?>