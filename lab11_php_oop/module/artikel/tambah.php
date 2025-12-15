<?php
// module/artikel/tambah.php
$db = new Database();

$success_message = '';
$error_message = '';

// Jika submit
if ($_POST) {
    $judul = isset($_POST['judul']) ? trim($_POST['judul']) : '';
    $isi = isset($_POST['isi']) ? trim($_POST['isi']) : '';
    $tanggal = date('Y-m-d H:i:s');

    // Validasi input
    if (empty($judul) || empty($isi)) {
        $error_message = "Judul dan Isi tidak boleh kosong!";
    } else {
        $data = [
            'judul' => $judul,
            'isi' => $isi,
            'tanggal' => $tanggal
        ];

        $result = $db->insert('artikel', $data);
        if ($result) {
            $success_message = "Data berhasil disimpan! (ID: {$result})";
            
            // Reset form setelah sukses
            $_POST['judul'] = '';
            $_POST['isi'] = '';
        } else {
            $error_message = "Gagal menyimpan data.";
        }
    }
}
?>

<h3 class="mb-4">Tambah Artikel Baru</h3>

<?php if ($success_message): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $success_message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="mt-2">
            <a href="/lab11_php_oop/index.php/artikel/index" class="btn btn-sm btn-primary">Lihat Daftar Artikel</a>
            <a href="/lab11_php_oop/index.php/artikel/tambah" class="btn btn-sm btn-success">Tambah Lagi</a>
        </div>
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
               value="<?php echo isset($_POST['judul']) ? htmlspecialchars($_POST['judul']) : ''; ?>" 
               required>
        <div class="form-text">Masukkan judul artikel yang jelas dan deskriptif.</div>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Isi Artikel <span class="text-danger">*</span></label>
        <textarea name="isi" rows="8" class="form-control" required><?php echo isset($_POST['isi']) ? htmlspecialchars($_POST['isi']) : ''; ?></textarea>
        <div class="form-text">Tulis isi artikel dengan lengkap dan informatif.</div>
    </div>
    
    <div class="d-flex gap-2">
        <button class="btn btn-success" type="submit">
            <i class="fas fa-save"></i> Simpan Artikel
        </button>
        <a href="/lab11_php_oop/index.php/artikel/index" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar
        </a>
        <button type="reset" class="btn btn-outline-secondary">
            <i class="fas fa-redo"></i> Reset Form
        </button>
    </div>
</form>