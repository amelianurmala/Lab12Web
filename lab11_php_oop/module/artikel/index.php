<?php
// module/artikel/index.php
$db = new Database();

// Ambil semua artikel
$sql = "SELECT * FROM artikel ORDER BY tanggal DESC";
$result = $db->query($sql);

// Hitung total artikel
$total_artikel = ($result && $result->num_rows > 0) ? $result->num_rows : 0;

// Pesan sukses jika ada dari parameter URL
$success_message = isset($_GET['success']) ? $_GET['success'] : '';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Daftar Artikel</h3>
    <a href="/lab11_php_oop/index.php/artikel/tambah" class="btn btn-success">
        <i class="fas fa-plus"></i> Tambah Artikel Baru
    </a>
</div>

<?php if ($success_message): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo htmlspecialchars($success_message); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="card-title mb-0">Total Artikel: <?php echo $total_artikel; ?></h5>
            </div>
            <div>
                <span class="badge bg-primary">Terbaru di atas</span>
            </div>
        </div>
    </div>
</div>

<?php if ($result && $result->num_rows > 0): ?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th width="5%">ID</th>
                    <th width="40%">Judul Artikel</th>
                    <th width="20%">Tanggal</th>
                    <th width="15%">Status</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): 
                    // Potong judul jika terlalu panjang
                    $judul_pendek = strlen($row['judul']) > 50 ? substr($row['judul'], 0, 50) . '...' : $row['judul'];
                    
                    // Format tanggal
                    $tanggal_format = date('d/m/Y H:i', strtotime($row['tanggal']));
                ?>
                <tr>
                    <td class="text-center"><?php echo $row['id']; ?></td>
                    <td>
                        <strong><?php echo htmlspecialchars($judul_pendek); ?></strong><br>
                        <small class="text-muted"><?php echo substr(strip_tags($row['isi']), 0, 80); ?>...</small>
                    </td>
                    <td>
                        <small class="text-muted"><?php echo $tanggal_format; ?></small>
                    </td>
                    <td>
                        <span class="badge bg-success">Aktif</span>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="/lab11_php_oop/index.php/artikel/ubah?id=<?php echo $row['id']; ?>" 
                               class="btn btn-sm btn-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/lab11_php_oop/index.php/artikel/hapus?id=<?php echo $row['id']; ?>" 
                               class="btn btn-sm btn-danger" 
                               onclick="return confirm('Yakin ingin menghapus artikel ini?')" 
                               title="Hapus">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="/lab11_php_oop/index.php/artikel/detail?id=<?php echo $row['id']; ?>" 
                               class="btn btn-sm btn-info" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Info jumlah data -->
    <div class="alert alert-info mt-3">
        <i class="fas fa-info-circle"></i> Menampilkan <?php echo $total_artikel; ?> artikel.
    </div>
    
<?php else: ?>
    <div class="card">
        <div class="card-body text-center py-5">
            <i class="fas fa-newspaper fa-4x text-muted mb-3"></i>
            <h5>Belum ada artikel</h5>
            <p class="text-muted">Mulai dengan menambahkan artikel pertama Anda.</p>
            <a href="/lab11_php_oop/index.php/artikel/tambah" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i> Tambah Artikel Pertama
            </a>
        </div>
    </div>
<?php endif; ?>

<!-- Tambahkan juga module hapus untuk melengkapi -->

<?php
// Buat file baru: module/artikel/hapus.php
// File ini akan dipanggil ketika tombol hapus diklik
?>