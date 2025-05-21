<?php include '../config/database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah | Sistem Akademik Kampus</title>
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
            <a href="../index.php">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="../mahasiswa/index.php">
                <i class="fas fa-user-graduate"></i> Mahasiswa
            </a>
            <a href="index.php" class="active">
                <i class="fas fa-book-open"></i> Mata Kuliah
            </a>
            <a href="../krs/index.php">
                <i class="fas fa-tasks"></i> KRS
            </a>
        </nav>
        
        <div class="sidebar-footer">
            <p>&copy; 2025 Sistem Akademik</p>
        </div>
    </div>

    <!-- Top Header -->
    <header class="top-header">
        <h1>Data Mata Kuliah</h1>
    </header>

        <!-- Main Content -->
        <div class="main-content">

            <div class="action-container">
                <div class="action-left">
                    <a href="add.php" class="btn">
                        <i class="fas fa-plus"></i> Tambah Mata Kuliah
                    </a>
                    <a href="export-excel.php" class="btn btn-export">
                        <i class="fas fa-file-export"></i> Export Data
                    </a>
                </div>
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Cari Kode MK atau Nama MK...">
                    <i class="fas fa-search"></i>
                </div>
            </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode MK</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM matakuliah";
                    $result = $conn->query($sql);
                                
                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($row['kodemk']) ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['jumlah_sks']) ?></td>
                            <td class="actions">
                            <a href="edit.php?kodemk=<?= urlencode($row['kodemk']) ?>" class="btn btn-edit" title="Edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="delete.php?kodemk=<?= urlencode($row['kodemk']) ?>" class="btn btn-delete" title="Hapus" 
                                onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                            </td>
                        </tr>
                    <?php 
                    endwhile;
                    } else {
                        echo '<tr><td colspan="4" class="no-data">Tidak ada data mata kuliah</td></tr>';
                            }
                    ?>
                </tbody>
                </table>
            </div>
        </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi pencarian sederhana
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('.table tbody tr');
            
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if(text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
    </script>
</body>
</html>