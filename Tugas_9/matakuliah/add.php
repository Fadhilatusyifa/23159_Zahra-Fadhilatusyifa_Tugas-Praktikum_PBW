<?php include '../config/database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah | Sistem Akademik Kampus</title>
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
        <h1>Tambah Mata Kuliah</h1>
    </header>

    <!-- Main Content -->
    <div class="main-content">            
        <div class="form-container">
            <div class="form-header">
                <a href="index.php" class="btn-cancel">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
                <h2>Form Tambah Mata Kuliah</h2>
                <p>Silahkan isi semua informasi yang diperlukan dibawah ini</p>
            </div>
            
            <form action="add-process.php" method="post" id="matakuliahForm">
                <div class="form-group">
                    <label for="kodemk"> Kode Mata Kuliah</label>
                    <input type="text" class="form-control" id="kodemk" name="kodemk" placeholder="Masukkan kode mata kuliah" maxlength="6" required>
                    <div class="help-text">Maksimal 6 karakter</div>
                </div>
                
                <div class="form-group">
                    <label for="nama"> Nama Mata Kuliah</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama mata kuliah" maxlength="50" required>
                    <div class="help-text">Maksimal 50 karakter</div>
                </div>
                
                <div class="form-group">
                    <label for="jumlah_sks"> Jumlah SKS</label>
                    <input type="number" class="form-control" id="jumlah_sks" name="jumlah_sks" placeholder="Masukkan jumlah SKS" min="1" max="10" required>
                    <div class="help-text">Nilai antara 1-10</div>
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
    document.addEventListener('DOMContentLoaded', function() {
        // Form validation
        const form = document.getElementById('matakuliahForm');
        
        form.addEventListener('submit', function(e) {
            let valid = true;
            const kodemk = document.getElementById('kodemk');
            const nama = document.getElementById('nama');
            const jumlahSks = document.getElementById('jumlah_sks');
            
            // Reset errors
            removeErrorMessage(kodemk);
            removeErrorMessage(nama);
            removeErrorMessage(jumlahSks);
            
            // Validate kode mata kuliah
            if (!kodemk.value.trim()) {
                showErrorMessage(kodemk, 'Kode mata kuliah tidak boleh kosong');
                valid = false;
            } else if (kodemk.value.length > 6) {
                showErrorMessage(kodemk, 'Kode mata kuliah maksimal 6 karakter');
                valid = false;
            }
            
            // Validate nama
            if (!nama.value.trim()) {
                showErrorMessage(nama, 'Nama mata kuliah tidak boleh kosong');
                valid = false;
            } else if (nama.value.length > 50) {
                showErrorMessage(nama, 'Nama mata kuliah maksimal 50 karakter');
                valid = false;
            }
            
            // Validate jumlah SKS
            if (!jumlahSks.value) {
                showErrorMessage(jumlahSks, 'Jumlah SKS tidak boleh kosong');
                valid = false;
            } else if (jumlahSks.value < 1 || jumlahSks.value > 10) {
                showErrorMessage(jumlahSks, 'Jumlah SKS harus antara 1-10');
                valid = false;
            }
            
            if (!valid) {
                e.preventDefault();
            }
        });
        
        function showErrorMessage(input, message) {
            input.classList.add('error');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'error-message';
            errorDiv.textContent = message;
            input.parentNode.appendChild(errorDiv);
        }
        
        function removeErrorMessage(input) {
            input.classList.remove('error');
            const errorMessage = input.parentNode.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.remove();
            }
        }
    });

    // Simpan nilai awal saat halaman dimuat
    const initialValues = {
        kodemk: document.querySelector('input[name="kodemk"]').value,
        nama: document.querySelector('input[name="nama"]').value,
        jumlah_sks: document.querySelector('input[name="jumlah_sks"]').value
    };

    function resetForm() {
        document.querySelector('input[name="kodemk"]').value = initialValues.kodemk;
        document.querySelector('input[name="nama"]').value = initialValues.nama;
        document.querySelector('input[name="jumlah_sks"]').value = initialValues.jumlah_sks;
    }

    </script>
</body>
</html>