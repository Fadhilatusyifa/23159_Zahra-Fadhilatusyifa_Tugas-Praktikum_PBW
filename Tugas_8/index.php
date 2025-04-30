<?php
session_start();    // Memulai session, yang digunakan untuk menyimpan data user sementara


// Array pilihan jenis kelamin
$jenis_kelamin = [
    "Laki-laki",
    "Perempuan"
];


// Array nama maskapai penerbangan
$maskapai = [
    "Garuda Indonesia",
    "Lion Air",
    "Sriwijaya Air",
    "AirAsia",
    "Citilink"
];

// Array nama bandara asal dan pajak yang dikenakan
$bandara_asal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000,
];

// Array nama bandara tujuan dan pajak yang dikenakan
$bandara_tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000,
];

// Array kelas penerbangan dan harga tiket
$kelas_penerbangan = [
    "Ekonomi" => 1000000,
    "Bisnis" => 2000000,
    "First Class" => 3500000
];

// mengurutkan array berdasarkan kunci (nama) agar tampil lebih rapi
ksort($jenis_kelamin);
ksort($maskapai);
ksort($bandara_asal);
ksort($bandara_tujuan);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Rute Penerbangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar-index">
        <h1>Booking Penerbangan Kamu</h1>
            <div class="navbar-right-index">
                <a href="hasil.php">
                    <img src="Gambar/icon-right.png" alt="Ganti Page">
                </a>
            </div>
        </div>
    </div>

    <!-- Container utama untuk form -->
    <div class="form-container">
        <div class="container-index">

            <!-- Form pengisian data penumpan dan penerbangan -->
            <form action="proses.php" method="POST" class="ticket-form">
                <!-- Kolom Kiri from -->
                <div class="form-left">
                    <div class="form-group">
                        <div class = "label-input-group">
                            <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" id="namaLengkap" name="namaLengkap" required> 
                    </div>
                </div>

                <div class="form-group">
                    <div class = "label-input-group">
                        <label for="nik">Nomor Identitas</label>
                        <input type="text" id="nik" name="nik" required> 
                    </div>
                </div>

                <div class="form-group">
                        <div class="label-input-group">
                            <label for="tgllahir">Tanggal Lahir</label>
                            <input type="date" id="tgllahir" name="tgllahir" required> 
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label-input-group">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <select id="jenisKelamin" name="jenisKelamin" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <!-- Loop Pilihan jenis kelamin -->
                            <?php foreach($jenis_kelamin as $jk): ?>
                                <option value="<?= $jk ?>"><?= $jk ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                <div class="form-group">
                    <div class = "label-input-group">
                        <label for="notelp">Nomor Telepon</label>
                        <input type="number" id="notelp" name="notelp" required> 
                    </div>
                </div>
            </div>
                 
                <!-- Kolom Kanan form -->
                <div class="form-right">
                    <div class="form-group">
                        <div class = "label-input-group">
                            <label for="maskapai">Nama Maskapai</label>
                            <select id="maskapai" name="maskapai" required>
                                <option value="">-- Pilih Maskapai --</option>
                                <!-- Loop pilihan maskapai -->
                                <?php foreach($maskapai as $maskap): ?>
                                    <option value="<?= $maskap ?>"><?= $maskap ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label-input-group">
                            <label for="tanggal">Tanggal Penerbangan</label>
                            <input type="date" id="tanggal" name="tanggal" required> 
                        </div>
                    </div>


                    <div class="form-group">
                        <div class = "label-input-group">
                            <label for="asal">Bandara Asal</label>
                            <select id="asal" name="asal" required>
                                <!-- Loop bandara asal -->
                                <?php foreach($bandara_asal as $nama => $pajak): ?>
                                    <option value="<?= $nama ?>"><?= $nama ?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <div class = "label-input-group">
                            <label for="tujuan">Bandara Tujuan</label>
                            <select id="tujuan" name="tujuan" required>
                                <!-- Loop bandara tujuan -->
                                <?php foreach($bandara_tujuan as $nama => $pajak): ?>
                                    <option value="<?= $nama ?>"><?= $nama ?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="label-input-group">
                            <label for="kelas">Kelas Penerbangan</label>
                            <select id="kelas" name="kelas" required>
                                <!-- loop kelas dan harga penerbangan -->
                                <?php foreach($kelas_penerbangan as $kelas => $harga): ?>
                                    <option value="<?= $kelas ?>">
                                        <?= $kelas ?> - Rp <?= number_format($harga, 0, ',', '.') ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>  
                </div>

                <!-- Tombol Daftar -->
                <div class="button-group">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn-submit">Daftar</button>
                </div>
            </form>
        </div>
        
        <!-- Notifikasi yang akan muncul setelah sukses daftar / booking penerbangan -->
        <div id="notifikasi" class="notifikasi">
            <p>Penerbangan kamu berhasil di-booking, terima kasih!</p>
            <button id="okButton">OK</button>
        </div>
    <script src="script.js"></script>
</body>
</html>
