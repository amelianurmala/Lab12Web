<?php
// module/artikel/hapus.php
$db = new Database();

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: /lab11_php_oop/index.php/artikel/index?error=ID+tidak+valid");
    exit;
}

// Hapus data
$deleted = $db->query("DELETE FROM artikel WHERE id = {$id}");

if ($deleted) {
    header("Location: /lab11_php_oop/index.php/artikel/index?success=Artikel+berhasil+dihapus");
} else {
    header("Location: /lab11_php_oop/index.php/artikel/index?error=Gagal+menghapus+artikel");
}
exit;
?>