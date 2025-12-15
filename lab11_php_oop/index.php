<?php
// ==============================
// (1) MULAI SESSION
// 🔴 DIPINDAH KE PALING ATAS (WAJIB)
// ==============================
session_start();

// ==============================
// Load konfigurasi dan helper
// ==============================
include "config.php";

// VALIDASI: cek apakah config berhasil di-load
if (!isset($config)) {
    die("<div style='color:red; padding:20px;'>
         <h3>Configuration Error</h3>
         config.php file loaded but \$config variable not found.<br>
         Make sure config.php doesn't have any output before &lt;?php tag.
         </div>");
}

// ==============================
// Load class
// ==============================
include "class/Database.php";
include "class/Form.php";

// ==============================
// ROUTING LOGIC (KODE LAMA)
// ==============================
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/home/index';

$segments = explode('/', trim($path, '/'));
$mod  = isset($segments[0]) ? $segments[0] : 'home';
$page = isset($segments[1]) ? $segments[1] : 'index';

// ==============================
// (2) TAMBAHAN PRAKTIKUM 12
// 🔴 CEK LOGIN (JANGAN UBAH KODE LAMA)
// ==============================

// Halaman yang boleh diakses TANPA login
$public_pages = ['home', 'user'];

if (!in_array($mod, $public_pages)) {
    if (!isset($_SESSION['is_login'])) {
        header('Location: user/login');
        exit;
    }
}

// ==============================
// Menentukan path file modul (KODE LAMA)
// ==============================
$file = "module/{$mod}/{$page}.php";

// ==============================
// LOAD TEMPLATE & KONTEN
// ==============================

// Jika halaman login → TANPA header & footer
if ($mod == 'user' && $page == 'login') {

    if (file_exists($file)) {
        include $file;
    } else {
        echo '<div class="alert alert-danger">Modul tidak ditemukan</div>';
    }

} else {

    include "template/header.php";

    if (file_exists($file)) {
        include $file;
    } else {
        echo '<div class="alert alert-danger">
                Modul tidak ditemukan: ' . $mod . '/' . $page . '
              </div>';
    }

    include "template/footer.php";
}
?>
