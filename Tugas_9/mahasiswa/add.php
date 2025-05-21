<?php include '../config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa | Sistem Akademik Kampus</title>
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
                <h2>Form Tambah Mahasiswa</h2>
                <p>Silahkan isi semua informasi yang diperlukan dibawah ini</p>
            </div>
            <form action="add-process.php" method="post">
                <div class="form-group">
                    <label for="npm">NPM:</label>
                    <input type="text" class="form-control" id="npm" name="npm" maxlength="13" placeholder="Masukkan NPM mahasiswa" required>
                </div>
                
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" maxlength="50" placeholder="Masukkan nama lengkap" required>
                </div>
                
                <div class="form-group">
                    <label for="jurusan">Jurusan:</label>
                    <select id="jurusan" class="form-control"  name="jurusan" required>
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="Teknik informatika">Teknik Informatika</option>
                        <option value="Sistem Operasi">Sistem Operasi</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea id="alamat" class="form-control" name="alamat" placeholder="Masukkan alamat lengkap" required></textarea>
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
    // Simpan nilai awal saat halaman dimuat
    const initialValues = {
        npm: document.querySelector('input[name="npm"]').value,
        nama: document.querySelector('input[name="nama"]').value,
        jurusan: document.querySelector('select[name="jurusan"]').value,
        alamat: document.querySelector('textarea[name="alamat"]').value
    };

    function resetForm() {
        document.querySelector('input[name="npm"]').value = initialValues.npm;
        document.querySelector('input[name="nama"]').value = initialValues.nama;
        document.querySelector('select[name="jurusan"]').value = initialValues.jurusan;
        document.querySelector('textarea[name="alamat"]').value = initialValues.alamat;
    }
</script>
</body>
</html>