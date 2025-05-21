<?php include '../config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa | Sistem Akademik Kampus</title>
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
            <a href="index.php" class="active">
                <i class="fas fa-user-graduate"></i> Mahasiswa
            </a>
            <a href="../matakuliah/index.php">
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
        <h1>Data Mahasiswa</h1>
    </header>

    <!-- Main Content -->
    <div class="main-content"> 
            <div class="action-container">
                <div class="action-left">
                    <a href="add.php" class="btn">
                        <i class="fas fa-plus"></i> Tambah Mahasiswa
                    </a>
                    <a href="export-excel.php" class="btn btn-export">
                        <i class="fas fa-file-export"></i> Export Data
                    </a>
                </div>
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Cari NPM atau Nama...">
                    <i class="fas fa-search"></i>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Mengambil data mahasiswa dari database
                    $sql = "SELECT * FROM mahasiswa ORDER BY npm ASC";
                    $result = $conn->query($sql);
                    
                   if ($result->num_rows > 0) {
                    // Menampilkan data setiap mahasiswa
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["npm"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["jurusan"] . "</td>";
                        echo "<td>" . $row["alamat"] . "</td>";
                        echo "<td class='action-buttons'>
                                <a href='edit.php?npm=" . $row["npm"] . "' class='btn btn-edit'>
                                    <i class='fas fa-edit'></i> Edit
                                </a>
                                <a href='delete.php?npm=" . $row["npm"] . "' class='btn btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>
                                    <i class='fas fa-trash'></i> Hapus
                                </a>

                            </td>";
                        echo "</tr>";
                    }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Tidak ada data mahasiswa</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi pencarian untuk NPM dan Nama
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('table tbody tr'); // Diperbaiki selector

            tableRows.forEach(row => {
                const npm = row.cells[0].textContent.toLowerCase();   // Kolom NPM
                const nama = row.cells[1].textContent.toLowerCase();  // Kolom Nama

                if (npm.includes(searchTerm) || nama.includes(searchTerm)) {
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
<?php $conn->close(); ?>