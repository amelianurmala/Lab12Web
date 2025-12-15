<?php
// Session sudah aktif dari index.php
session_unset();
session_destroy();

// Redirect ke halaman login
header('Location: ../user/login');
exit;
