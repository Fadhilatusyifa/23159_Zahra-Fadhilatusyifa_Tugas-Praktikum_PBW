<?php
session_start();

// Mengambil data dari session jika ada, kalau tidak, buat array kosong
$data = isset($_SESSION['data']) ? $_SESSION['data'] : [];

// Mengecek apakah ada parameter noPenerbangan yang dikirimkan melalui URL
$noPenerbanganDetail = isset($_GET['noPenerbangan']) ? $_GET['noPenerbangan'] : null;
$detail = null; // variabel untuk menyimpan data detail penerbangan yang ditemukan

//  Mengecek jika nomor penerbangan tersedia dan data tidak kosong
if ($noPenerbanganDetail && !empty($data)) {
    foreach ($data as $item) {
        // Mencari data penerbangan berdasarkan nomor penerbangan yang cocok
        if ($item['NoPenerbangan'] == $noPenerbanganDetail) {
            $detail = $item; // Menyimpan data detail penerbangan yang ditemukan ke variabel detail
            break; // Menghentikan perulangan setelah data ditemukan 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Penerbangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar-detail">
        <h1>Detail Penerbangan</h1>
            <div class="navbar-left-detail">
                <a href="hasil.php">
                    <img src="Gambar/icon-left.png" alt="Ganti Page">
                </a>
            </div>
        </div>
    </div>

<?php if (!$detail): ?>
    <!-- Jika data tidak ditemukan -->
    <p>Data tidak ditemukan.</p>
<?php else: ?>
    <!-- Menampilkan detail penerbangan, jika data ditemukan -->
     <div class="form-container">
        <div class="detail-data">
            <div class="container-detail">
                <!-- Menampilkan rute penerbangan (asal ke tujuan) -->
                <div class="rute-penerbangan">
                    <div class="bandara">
                        <strong><?= htmlspecialchars($detail['Asal']) ?></strong>
                        <img src="Gambar/icon-pesawat-detail.png" class = "ikon-pesawat">
                        <strong><?= htmlspecialchars($detail['Tujuan']) ?></strong>
                    </div>

                    <!-- Menampilkan maskapai penerbangan -->
                    <div class="penerbangan">
                        <img src="Gambar/gambarpesawat.png" class = "poto-pesawat">
                        <div class="info-penerbangan">
                            <strong><?= htmlspecialchars($detail['Maskapai']) ?></strong>
                        </div>
                    </div>    
                </div>

                <!-- Menampilkan dua kolom data, yaitu penumpang dan penerbangan -->
                <div class="table-split">
                <!-- Kolom kiri untuk menampilkan informasi penumpang -->
                    <div class="table-left">
                        <table class="detail-table">
                            <tr><th colspan="2" class="section-header">Detail Penumpang</th></tr>
                            <tr><td>Nama Lengkap</td><td><?= htmlspecialchars($detail['Nama Lengkap']) ?></td></tr>
                            <tr><td>NIK</td><td><?= htmlspecialchars($detail['NIK']) ?></td></tr>
                            <tr><td>Tanggal Lahir</td><td><?= htmlspecialchars($detail['Tanggal Lahir']) ?></td></tr>
                            <tr><td>Jenis Kelamin</td><td><?= htmlspecialchars($detail['Jenis Kelamin']) ?></td></tr>
                            <tr><td>Nomor Telepon</td><td><?= htmlspecialchars($detail['Nomor Telepon']) ?></td></tr>
                        </table>
                    </div>

                    <!-- Kolom kanan untuk menampilkan informasi penerbangan dan harga nya -->
                    <div class="table-right">
                        <table class="detail-table">
                            <tr><th colspan="2" class="section-header">Detail Penerbangan</th></tr>
                            <tr><td>No Penerbangan</td><td><?= htmlspecialchars($detail['NoPenerbangan']) ?></td></tr>
                            <tr><td>Tanggal Penerbangan</td><td><?= htmlspecialchars($detail['Tanggal Penerbangan']) ?></td></tr>
                            <tr><td>Asal</td><td><?= htmlspecialchars($detail['Asal']) ?></td></tr>
                            <tr><td>Tujuan</td><td><?= htmlspecialchars($detail['Tujuan']) ?></td></tr>
                            <tr><th colspan="2" class="section-header">Detail Pembayaran</th></tr>
                            <tr><td>Harga Tiket</td><td>Rp <?= number_format($detail['Harga Tiket'], 0, ',', '.') ?></td></tr>
                            <tr><td>Total Pajak</td><td>Rp <?= number_format($detail['Total Pajak'], 0, ',', '.') ?></td></tr>
                            <tr><td>Total Harga Tiket</td><td>Rp <?= number_format($detail['Total Harga Tiket'], 0, ',', '.') ?></td></tr>
                        </table>
                    </div>
                </div>

                <!-- Menampilkan barcode berdasarkan nomor penerbangan -->
                <div class="barcode-container">
                    <img src="https://bwipjs-api.metafloor.com/?bcid=code128&text=<?= urlencode($detail['NoPenerbangan']) ?>&scale=4" alt="Barcode">
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol untuk mencetak tiket / detail penerbangan -->
    <div class="print-button-container">
        <button onclick="window.print()" class="print-button">
            <img src="Gambar/icon-print.png" class="icon-print" alt="Print Icon">
            Cetak
        </button>
    </div>
<?php endif; ?>

</body>
</html>
