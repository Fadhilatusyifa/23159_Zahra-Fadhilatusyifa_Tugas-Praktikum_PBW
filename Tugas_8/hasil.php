<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hapus_semua'])) {
    unset($_SESSION['data']);   // Menghapus semua data penerbangan dari session
    header("Location: " . $_SERVER['PHP_SELF']);    // Redirect ke halaman ini sendiri setelah hapus
    exit;
}

// Mengambil data dari session jika ada, jika tidak ada maka kosongkan array
$data = isset($_SESSION['data']) ? $_SESSION['data'] : [];

// Cek apakah ada parameter GET 'noPenerbangan', jika ada tampilkan detail, jika tidak, tampilkan semua
$noPenerbanganDetail = isset($_GET['noPenerbangan']) ? $_GET['noPenerbangan'] : null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penerbangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Bagian Navbar -->
    <div class="navbar-hasil">
        <h1>Data Penerbangan</h1>
        <img src="Gambar/gambarrutepesawat.png" alt="" class = "ikon-pesawat-hasil">
        <div class="navbar-left-hasil">
            <a href="index.php">
                <img src="Gambar/icon-left.png" alt="Ganti Page">
            </a>
        </div>
    </div>

<?php if (!$noPenerbanganDetail): ?>
    <div class="container-data">
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $d): ?>
                <!-- Untuk Informasi data Penerbangan -->
                <div class="flight-card">
                    <div class="flight-left">
                        <img src="Gambar/icon-plane.png" class="icon-plane">
                        <div class="flight-name"><?= htmlspecialchars($d['Maskapai']) ?></div> <!-- Nama maskapai -->
                    </div>
                    <div class="flight-center">
                        <div class="flight-number"><?= htmlspecialchars($d['NoPenerbangan']) ?></div> <!-- Nomor penerbangan -->
                    </div>
                    <!-- Untuk menghapus satu data penerbangan -->
                    <div class="flight-right">
                        <form action="hapus.php" method="POST" class="form-hapus">
                            <input type="hidden" name="noPenerbangan" value="<?= htmlspecialchars($d['NoPenerbangan']) ?>">
                            <button type="submit" class="hapus-button" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <img src="Gambar/icon-sampah.png" alt="Hapus"> <!-- Tombol hapus -->
                            </button>
                        </form>
                    
                    <!-- Tombol untuk melihat detail penerbangan -->
                    <a class="btn-detail" href="detail.php?noPenerbangan=<?= htmlspecialchars($d['NoPenerbangan']) ?>">Detail</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?> <!-- Jika belum ada data penerbangan -->
            <p style="text-align:center;">Belum ada data penerbangan.</p>
        <?php endif; ?>
    </div>
    
    <!-- untuk menghapus semua data penerbangan -->
    <form method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua data?');">
        <button type="submit" name="hapus_semua" class="btn-hapus-semua">
            Hapus Semua Data
        </button>
    </form>

<?php endif; ?>  <!-- Akhir pengecekan detail penerbangan -->

</body>
</html>
