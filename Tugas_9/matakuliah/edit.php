<?php
include '../config/database.php';

$kodemk = $_GET['kodemk'] ?? '';

if (!$kodemk) {
    echo "Kode Mata Kuliah tidak ditemukan!";
    exit();
}

$sql = "SELECT * FROM matakuliah WHERE kodemk = '$kodemk'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Data Mata Kuliah tidak ditemukan!";
    exit();
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah | Sistem Akademik Kampus</title>
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
        <h1>Edit Mata Kuliah</h1>
    </header>

    <!-- Main Content -->
    <div class="main-content">            
        <div class="form-container">
            <div class="form-header">
                <a href="index.php" class="btn-cancel">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
                <h2>Edit Mata Kuliah</h2>
                <p>Silahkan ubah informasi yang salah</p>
            </div>

        <form action="edit-process.php" method="post">
        <div class="form-group">
            <label>Kode Mata Kuliah</label>
            <input type="text" class="form-control" name="kodemk" value="<?= htmlspecialchars($row['kodemk']) ?>" reuired>
        </div>
        <div class="form-group">
            <label>Nama Mata Kuliah</label>
            <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required>
        </div>
        <div class="form-group">
            <label>Jumlah SKS</label>
            <input type="number" class="form-control" name="jumlah_sks" value="<?= htmlspecialchars($row['jumlah_sks']) ?>" required>
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
<script>
    // Simpan nilai awal saat halaman pertama kali dimuat
    const initialValues = {
        nama: document.querySelector('input[name="nama"]').value,
        jumlah_sks: document.querySelector('input[name="jumlah_sks"]').value
    };

    function resetForm() {
        document.querySelector('input[name="nama"]').value = initialValues.nama;
        document.querySelector('input[name="jumlah_sks"]').value = initialValues.jumlah_sks;
    }
</script>
</body>
</html>
