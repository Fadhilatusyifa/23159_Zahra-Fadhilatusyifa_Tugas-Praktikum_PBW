<?php
include '../config/database.php';

$npm = mysqli_real_escape_string($conn, $_GET['npm']); 
$sql = "SELECT * FROM mahasiswa WHERE npm='$npm'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa | Sistem Akademik Kampus</title>
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
                <i class="fas fa-home"></i> <span>Dashboard</span>
            </a>
            <a href="index.php" class="active">
                <i class="fas fa-user-graduate"></i> <span>Mahasiswa</span>
            </a>
            <a href="../matakuliah/index.php">
                <i class="fas fa-book-open"></i> <span>Mata Kuliah</span>
            </a>
            <a href="../krs/index.php">
                <i class="fas fa-tasks"></i> <span>KRS</span>
            </a>
        </nav>
        
        <div class="sidebar-footer">
            <p>&copy; 2025 Sistem Akademik</p>
        </div>
    </div>

    <!-- Top Header -->
    <header class="top-header">
        <h1>Tambah Data Mahasiswa</h1>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="form-container">
            <div class="form-header">
                <a href="index.php" class="btn-cancel">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
                <h2>Edit Mahasiswa</h2>
                <p>Silahkan ubah informasi yang salah</p>
            </div>
            <form action="edit-process.php" method="post">
                <div class="form-group">
                    <label for="npm">NPM:</label>
                    <input type="text" class="form-control" id="npm" name="npm" value="<?= $row['npm'] ?>" readonly>
                    <small>NPM tidak dapat diubah</small>
                </div>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan:</label>
                    <select class="form-control" id="jurusan" name="jurusan" required>
                        <option value="Teknik informatika" <?= $row['jurusan'] == 'Teknik informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
                        <option value="Sistem Operasi" <?= $row['jurusan'] == 'Sistem Operasi' ? 'selected' : '' ?>>Sistem Operasi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" id="alamat" name="alamat" required><?= $row['alamat'] ?></textarea>
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

    <!-- JavaScript -->
    <script>
        // Simpan nilai awal
        const initialValues = {
            nama: "<?= addslashes($row['nama']) ?>",
            jurusan: "<?= addslashes($row['jurusan']) ?>",
            alamat: "<?= addslashes($row['alamat']) ?>"
        };

        function resetForm() {
            document.querySelector('input[name="nama"]').value = initialValues.nama;
            document.querySelector('select[name="jurusan"]').value = initialValues.jurusan;
            document.querySelector('textarea[name="alamat"]').value = initialValues.alamat;
        }
    </script>
</body>
</html>
