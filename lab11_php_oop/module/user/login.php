<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Jika sudah login
if (isset($_SESSION['is_login'])) {
    header('Location: ../home/index');
    exit;
}

$message = "";

if ($_POST) {
    $db = new Database();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='{$username}' LIMIT 1";
    $result = $db->query($sql);
    $data = $result->fetch_assoc();

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];

        header('Location: ../artikel/index');
        exit;
    } else {
        $message = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .glass-card {
            background: rgba(255,255,255,.85);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }
        .btn-gradient {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: #fff;
            border: none;
        }
    </style>
</head>
<body>

<div class="glass-card">
    <h3 class="text-center mb-4">Login User</h3>

    <?php if ($message): ?>
        <div class="alert alert-danger"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-gradient w-100">Login</button>
    </form>
</div>

</body>
</html>
