<?php
// module/artikel/detail.php
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
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Detail Artikel</h3>
    <div class="btn-group">
        <a href="/lab11_php_oop/index.php/artikel/index" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <a href="/lab11_php_oop/index.php/artikel/ubah?id=<?php echo $artikel['id']; ?>" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0"><?php echo htmlspecialchars($artikel['judul']); ?></h4>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <p><strong>ID Artikel:</strong> <?php echo $artikel['id']; ?></p>
                <p><strong>Dibuat Pada:</strong> <?php echo $artikel['tanggal']; ?></p>
            </div>
            <div class="col-md-6 text-end">
                <span class="badge bg-success fs-6">Status: Aktif</span>
            </div>
        </div>
        
        <hr>
        
        <div class="mb-4">
            <h5>Isi Artikel:</h5>
            <div class="border p-3 bg-light rounded">
                <?php echo nl2br(htmlspecialchars($artikel['isi'])); ?>
            </div>
        </div>
        
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> 
            Artikel ini memiliki <?php echo strlen($artikel['isi']); ?> karakter.
        </div>
    </div>
    <div class="card-footer text-muted text-center">
        <small>Terakhir dilihat: <?php echo date('Y-m-d H:i:s'); ?></small>
    </div>
</div>