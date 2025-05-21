<?php include 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik Kampus</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Sistem Akademik</h2>
            <p>Kampus</p>
        </div>
        
        <nav class="sidebar-nav">
            <a href="#" class="active">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="mahasiswa/index.php">
                <i class="fas fa-user-graduate"></i> Mahasiswa
            </a>
            <a href="matakuliah/index.php">
                <i class="fas fa-book-open"></i> Mata Kuliah
            </a>
            <a href="krs/index.php">
                <i class="fas fa-tasks"></i> KRS
            </a>
        </nav>
        
        <div class="sidebar-footer">
            <p>&copy; 2025 Sistem Akademik</p>
        </div>
    </div>

     <!-- Top Header -->
    <header class="top-header">
        <h1>Dashboard</h1>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-container">
            <!-- Quick Stats -->
            <div class="stats-container">
                <div class="stats-card">
                    <h4>Statistik Cepat</h4>
                    <div class="stats-grid">
                        <?php
                        // Hitung jumlah mahasiswa
                        $sql_mhs = "SELECT COUNT(*) as total FROM mahasiswa";
                        $result_mhs = $conn->query($sql_mhs);
                        $total_mhs = $result_mhs->fetch_assoc()['total'];

                        // Hitung jumlah mata kuliah
                        $sql_mk = "SELECT COUNT(*) as total FROM matakuliah";
                        $result_mk = $conn->query($sql_mk);
                        $total_mk = $result_mk->fetch_assoc()['total'];

                        // Hitung jumlah KRS
                        $sql_krs = "SELECT COUNT(*) as total FROM krs";
                        $result_krs = $conn->query($sql_krs);
                        $total_krs = $result_krs->fetch_assoc()['total'];
                        ?>
                        <div class="stat-item">
                            <h2><?= $total_mhs ?></h2>
                            <p>Mahasiswa Terdaftar</p>
                        </div>
                        <div class="stat-item">
                            <h2><?= $total_mk ?></h2>
                            <p>Mata Kuliah Tersedia</p>
                        </div>
                        <div class="stat-item">
                            <h2><?= $total_krs ?></h2>
                            <p>KRS Aktif</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Container -->
            <div class="card-container">
                <!-- Mahasiswa Card -->
                <div class="card">
                    <div class="card-content">
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Data Mahasiswa</h3>
                        <p>Kelola data mahasiswa termasuk NPM, nama, jurusan, dan alamat</p>
                        <a href="mahasiswa/index.php" class="btn">
                            <i class="fas fa-user-graduate"></i> Kelola Mahasiswa
                        </a>
                    </div>
                </div>

                <!-- Mata Kuliah Card -->
                <div class="card">
                    <div class="card-content">
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3>Mata Kuliah</h3>
                        <p>Kelola data mata kuliah termasuk kode MK, nama, dan jumlah SKS</p>
                        <a href="matakuliah/index.php" class="btn">
                            <i class="fas fa-book-open"></i> Kelola Mata Kuliah
                        </a>
                    </div>
                </div>

                <!-- KRS Card -->
                <div class="card">
                    <div class="card-content">
                        <div class="icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h3>Kartu Rencana Studi</h3>
                        <p>Kelola KRS mahasiswa dan pemilihan mata kuliah</p>
                        <a href="krs/index.php" class="btn">
                            <i class="fas fa-tasks"></i> Kelola KRS
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>