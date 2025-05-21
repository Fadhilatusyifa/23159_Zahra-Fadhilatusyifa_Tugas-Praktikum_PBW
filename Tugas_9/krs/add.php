<?php include '../config/database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data KRS | Sistem Akademik Kampus</title>
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
        <h1>Tambah KRS</h1>
    </header>

     <!-- Main Content -->
    <div class="main-content">            
        <div class="form-container">
            <div class="form-header">
                <a href="index.php" class="btn-cancel">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
                <h2>Form Tambah KRS</h2>
                <p>Silahkan isi semua informasi yang diperlukan dibawah ini</p>
            </div>

            <form action="add-process.php" method="post">
                <div class="form-group">
                    <label for="mahasiswa_npm">Mahasiswa:</label>
                    <select class="form-control" name="mahasiswa_npm" id="mahasiswa_npm" required>
                        <option value="" disabled selected>-- Pilih Mahasiswa --</option>
                        <?php
                        $sql = "SELECT * FROM mahasiswa ORDER BY nama";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()):
                        ?>
                        <option value="<?= $row['npm'] ?>"><?= $row['npm'] ?> - <?= htmlspecialchars($row['nama']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="matakuliah_kodemk">Mata Kuliah:</label>
                    <select class="form-control" name="matakuliah_kodemk" id="matakuliah_kodemk" required>
                        <option value="" disabled selected>-- Pilih Mata Kuliah --</option>
                        <?php
                        $sql = "SELECT * FROM matakuliah ORDER BY nama";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()):
                        ?>
                        <option value="<?= $row['kodemk'] ?>"><?= $row['kodemk'] ?> - <?= htmlspecialchars($row['nama']) ?> (<?= $row['jumlah_sks'] ?> SKS)</option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-cancel" onclick="resetForm()">
                        <i class="fas fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
    function resetForm() {
        document.getElementById("mahasiswa_npm").selectedIndex = 0;
        document.getElementById("matakuliah_kodemk").selectedIndex = 0;
    }
</script>

</body>
</html>