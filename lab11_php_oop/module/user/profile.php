<?php
// Cegah akses jika belum login
if (!isset($_SESSION['is_login'])) {
    header('Location: ../user/login');
    exit;
}

$db = new Database();
$message = "";

// Proses ganti password
if ($_POST) {
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi    = $_POST['konfirmasi'];

    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='{$username}' LIMIT 1";
    $result = $db->query($sql);
    $user = $result->fetch_assoc();

    if (!$user || !password_verify($password_lama, $user['password'])) {
        $message = "Password lama salah!";
    } elseif ($password_baru !== $konfirmasi) {
        $message = "Konfirmasi password tidak sesuai!";
    } else {
        $hash = password_hash($password_baru, PASSWORD_DEFAULT);
        $update = "UPDATE users SET password='{$hash}' WHERE username='{$username}'";
        $db->query($update);

        $message = "Password berhasil diubah!";
    }
}
?>

<div class="container mt-5">
    <div class="glass-card p-4">

        <h3 class="gradient-text mb-3">Profil User</h3>

        <?php if ($message): ?>
            <div class="alert alert-info"><?= $message ?></div>
        <?php endif; ?>

        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?= $_SESSION['nama'] ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?= $_SESSION['username'] ?></td>
            </tr>
        </table>

        <hr>
        <h5>Ganti Password</h5>

        <form method="POST">
            <div class="mb-3">
                <label>Password Lama</label>
                <input type="password" name="password_lama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password Baru</label>
                <input type="password" name="password_baru" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="konfirmasi" class="form-control" required>
            </div>

            <button class="btn btn-gradient">Update Password</button>
        </form>

    </div>
</div>
