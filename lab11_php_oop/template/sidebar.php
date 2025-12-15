<div class="sidebar-content">
    <h4 class="mb-3 text-primary">
        <i class="fas fa-bars me-2"></i>Menu Navigasi
    </h4>
    <div class="list-group">
        <a href="/lab11_php_oop/index.php/artikel/index" 
           class="list-group-item list-group-item-action border-0 mb-2 rounded-pill <?php echo (isset($mod) && $mod == 'artikel' && $page == 'index') ? 'active btn-gradient' : 'bg-light'; ?>">
            <i class="fas fa-newspaper me-2"></i> Daftar Artikel
        </a>
        <a href="/lab11_php_oop/index.php/artikel/tambah" 
           class="list-group-item list-group-item-action border-0 mb-2 rounded-pill <?php echo (isset($mod) && $mod == 'artikel' && $page == 'tambah') ? 'active btn-gradient' : 'bg-light'; ?>">
            <i class="fas fa-plus-circle me-2"></i> Tambah Artikel
        </a>
        <a href="/lab11_php_oop/index.php/home/index" 
           class="list-group-item list-group-item-action border-0 mb-2 rounded-pill <?php echo (isset($mod) && $mod == 'home') ? 'active btn-gradient' : 'bg-light'; ?>">
            <i class="fas fa-home me-2"></i> Dashboard
        </a>
    </div>
    
    <hr class="my-4">
    
    <div class="glass-card p-3 mt-3">
        <h6 class="text-primary mb-2">
            <i class="fas fa-info-circle me-2"></i>Info Sistem
        </h6>
        <div class="small">
            <p class="mb-1">
                <strong><i class="fas fa-cube me-2"></i>Modul:</strong> 
                <span class="badge bg-primary"><?php echo isset($mod) ? $mod : 'home'; ?></span>
            </p>
            <p class="mb-1">
                <strong><i class="fas fa-file me-2"></i>Halaman:</strong> 
                <span class="badge bg-info"><?php echo isset($page) ? $page : 'index'; ?></span>
            </p>
            <p class="mb-0">
                <strong><i class="fas fa-clock me-2"></i>Waktu:</strong> 
                <span class="text-muted"><?php echo date('H:i:s'); ?></span>
            </p>
        </div>
    </div>
    
    <div class="mt-4 text-center">
        <div class="spinner-grow text-primary spinner-grow-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-info spinner-grow-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-success spinner-grow-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>