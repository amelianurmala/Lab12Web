<?php
// module/home/index.php
$db = new Database();
?>

<div class="text-center py-5">
    <i class="fas fa-home fa-5x text-primary mb-4"></i>
    <h2>Selamat Datang di Sistem Manajemen Artikel</h2>
    <p class="lead text-muted mb-4">
        Sistem ini dibangun menggunakan PHP OOP dengan arsitektur modular.
    </p>
    
    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <i class="fas fa-newspaper fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Kelola Artikel</h5>
                    <p class="card-text">Buat, edit, dan hapus artikel dengan mudah.</p>
                    <a href="/lab11_php_oop/index.php/artikel/index" class="btn btn-primary">
                        <i class="fas fa-list"></i> Lihat Artikel
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <i class="fas fa-plus-circle fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Tambah Baru</h5>
                    <p class="card-text">Tambahkan artikel baru ke dalam sistem.</p>
                    <a href="/lab11_php_oop/index.php/artikel/tambah" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Artikel
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <i class="fas fa-info-circle fa-3x text-info mb-3"></i>
                    <h5 class="card-title">Tentang Sistem</h5>
                    <p class="card-text">Dibangun untuk Praktikum PHP OOP Lanjutan.</p>
                    <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#aboutModal">
                        <i class="fas fa-question-circle"></i> Info Sistem
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Statistik Sistem</h5>
            <div class="row text-center">
                <div class="col-md-3">
                    <h3 class="text-primary">
                        <?php 
                        $total_artikel = $db->query("SELECT COUNT(*) as total FROM artikel");
                        echo $total_artikel ? $total_artikel->fetch_assoc()['total'] : 0;
                        ?>
                    </h3>
                    <p class="text-muted">Total Artikel</p>
                </div>
                <div class="col-md-3">
                    <h3 class="text-success">
                        <?php echo date('Y-m-d'); ?>
                    </h3>
                    <p class="text-muted">Tanggal Hari Ini</p>
                </div>
                <div class="col-md-3">
                    <h3 class="text-warning">PHP <?php echo phpversion(); ?></h3>
                    <p class="text-muted">Versi PHP</p>
                </div>
                <div class="col-md-3">
                    <h3 class="text-danger">OOP</h3>
                    <p class="text-muted">Arsitektur</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal About -->
<div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aboutModalLabel">Tentang Sistem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Sistem Manajemen Artikel</h6>
                <p>Dibangun dengan:</p>
                <ul>
                    <li>PHP Object-Oriented Programming (OOP)</li>
                    <li>Arsitektur Modular</li>
                    <li>Routing Dinamis</li>
                    <li>Bootstrap 5</li>
                    <li>MySQL Database</li>
                </ul>
                <p><strong>Tujuan:</strong> Praktikum PHP OOP Lanjutan</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>