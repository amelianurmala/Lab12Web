<?php
// module/artikel/ubah.php
$db = new Database();

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Validasi ID
if ($id <= 0) {
    echo "<div class='alert alert-danger'>ID artikel tidak valid.</div>";
    return;
}

// Ambil data artikel
$artikel = $db->get('artikel', "id={$id}");

// Cek apakah artikel ditemukan
if (!$artikel) {
    echo "<div class='alert alert-danger'>Artikel dengan ID {$id} tidak ditemukan.</div>";
    return;
}

// Proses update jika form disubmit
$success_message = '';
$error_message = '';

if ($_POST) {
    $judul = isset($_POST['judul']) ? trim($_POST['judul']) : '';
    $isi = isset($_POST['isi']) ? trim($_POST['isi']) : '';

    // Validasi input
    if (empty($judul) || empty($isi)) {
        $error_message = "Judul dan Isi tidak boleh kosong!";
    } else {
        $data = [
            'judul' => $judul,
            'isi' => $isi
        ];

        $updated = $db->update('artikel', $data, "id={$id}");
        if ($updated) {
            $success_message = "Data artikel berhasil diperbarui.";
            // Reload artikel data
            $artikel = $db->get('artikel', "id={$id}");
        } else {
            $error_message = "Gagal memperbarui data.";
        }
    }
}
?>

<h3 class="mb-4">Ubah Artikel</h3>

<?php if ($success_message): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $success_message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if ($error_message): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $error_message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<form method="post" action="">
    <div class="mb-3">
        <label class="form-label">Judul Artikel <span class="text-danger">*</span></label>
        <input type="text" name="judul" class="form-control" 
               value="<?php echo htmlspecialchars($artikel['judul']); ?>" 
               required>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Isi Artikel <span class="text-danger">*</span></label>
        <textarea name="isi" rows="8" class="form-control" required><?php echo htmlspecialchars($artikel['isi']); ?></textarea>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Informasi:</label>
        <div class="alert alert-info">
            <strong>ID Artikel:</strong> <?php echo $artikel['id']; ?><br>
            <strong>Dibuat:</strong> <?php echo $artikel['tanggal']; ?><br>
            <strong>Terakhir diubah:</strong> <?php echo date('Y-m-d H:i:s'); ?>
        </div>
    </div>
    
    <div class="d-flex gap-2">
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
        <a href="/lab11_php_oop/index.php/artikel/index" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar
        </a>
        <a href="/lab11_php_oop/index.php/artikel/tambah" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Baru
        </a>
    </div>
</form>