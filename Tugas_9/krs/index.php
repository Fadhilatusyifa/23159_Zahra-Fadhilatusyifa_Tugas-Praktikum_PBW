<?php include '../config/database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data KRS | Sistem Akademik Kampus </title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="../matakuliah/index.php">
                <i class="fas fa-book-open"></i> Mata Kuliah
            </a>
            <a href="index.php" class="active">
                <i class="fas fa-tasks"></i> KRS
            </a>
        </nav>
        
        <div class="sidebar-footer">
            <p>&copy; 2025 Sistem Akademik</p>
        </div>
    </div>

    <!-- Top Header -->
    <header class="top-header">
        <h1>Data KRS</h1>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="action-container">
                <div class="action-left">
                    <a href="add.php" class="btn">
                        <i class="fas fa-plus"></i> Tambah KRS
                    </a>
                    <a href="export-excel.php" class="btn btn-export">
                        <i class="fas fa-file-export"></i> Export Data
                    </a>
                </div>
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Cari Nama atau Mata Kuliah..">
                    <i class="fas fa-search"></i>
                </div>
            </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Mata Kuliah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT k.*, m.nama as nama_mahasiswa, mk.nama as nama_matakuliah, mk.jumlah_sks
                    FROM krs k
                    JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
                    JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk";
                
                $result = $conn->query($sql);
                $no = 1;

                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $no++ . '</td>';
                        echo '<td>' . htmlspecialchars($row['nama_mahasiswa']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['nama_matakuliah']) . '</td>';
                        echo '<td>
                            <span class="highlight">' . htmlspecialchars($row['nama_mahasiswa']) . '</span> Mengambil Mata Kuliah 
                            <span class="highlight">' . htmlspecialchars($row['nama_matakuliah']) . '</span> (' . $row['jumlah_sks'] . ' SKS)
                        </td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="4" class="no-data">Tidak ada data KRS</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('table tbody tr'); // perbaikan selector

            tableRows.forEach(row => {
                const nama = row.cells[1]?.textContent.toLowerCase();  // kolom nama mahasiswa
                const matakuliah = row.cells[2]?.textContent.toLowerCase();  // kolom nama matakuliah

                if ((nama && nama.includes(searchTerm)) || (matakuliah && matakuliah.includes(searchTerm))) {
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