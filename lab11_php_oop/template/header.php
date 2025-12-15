<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP Modular</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* BACKGROUND GRADIENT UNGU KE BIRU */
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #6a11cb 50%, #2575fc 100%);
            background-attachment: fixed;
            min-height: 100vh;
            padding-top: 20px;
            padding-bottom: 50px;
        }
        
        /* Glassmorphism effect untuk konten */
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .glass-sidebar {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .glass-navbar {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(10px);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Efek hover untuk tombol */
        .btn-gradient {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-gradient:hover {
            background: linear-gradient(45deg, #2575fc, #6a11cb);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Custom style untuk tabel */
        .table-glass {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            overflow: hidden;
        }
        
        /* Animasi fade in */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Style untuk judul dengan gradient text */
        .gradient-text {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Footer dengan transparansi */
        .glass-footer {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            border-top: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg glass-navbar mb-4 px-4">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold gradient-text" href="../home/index">
            PHP OOP Modular
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../home/index">Home</a>
                </li>

                <?php if (isset($_SESSION['is_login'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../artikel/index">
                            Data Artikel
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['is_login'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../user/logout">
                            <i class="fa fa-sign-out-alt"></i>
                            Logout (<?= $_SESSION['nama'] ?>)
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../user/login">
                            <i class="fa fa-sign-in-alt"></i>
                            Login
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

    </div>
</nav>
