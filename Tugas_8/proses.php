<?php
session_start();

// Mengecek apakah form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data tanggal dari form
    $tanggal = $_POST['tanggal']; 

    // buat nomor penerbangan berdasarkan tanggal + ID unik
    $nomorPenerbangan = date("Ymd", strtotime($tanggal)) . '-' . uniqid();

    // Mengambil semua data dari form input
    $namaLengkap = $_POST['namaLengkap'];
    $nik = $_POST['nik'];
    $tgllahir = $_POST['tgllahir'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $notelp = $_POST['notelp'];
    $maskapai = $_POST['maskapai'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $kelas = $_POST['kelas']; 

    // Menentukan harga tiket berdasarkan kelas penerbangan
    switch ($kelas) {
        case "Ekonomi":
            $harga_tiket = 1000000;
            break;
        case "Bisnis":
            $harga_tiket = 2000000;
            break;
        case "First Class":
            $harga_tiket = 3500000;
            break;
        default:
            $harga_tiket = 0; // Jika kelas penerbangan tidak dikenali
    }

    // Menentukan pajak berdasarkan bandara asal
    switch ($asal) {
        case "Soekarno Hatta":
            $pajak_asal = 65000;
            break;
        case "Husein Sastranegara":
            $pajak_asal = 50000;
            break;
        case "Abdul Rachman Saleh":
            $pajak_asal = 40000;
            break;
        case "Juanda":
            $pajak_asal = 30000;
            break;
        default:
            $pajak_asal = 0;  // Jika penerbangan asal tidak dikenali
    }

    // Menentukan pajak berdasarkan bandara tujuan
    switch ($tujuan) {
        case "Ngurah Rai":
            $pajak_tujuan = 85000;
            break;
        case "Hasanuddin":
            $pajak_tujuan = 70000;
            break;
        case "Inanwatan":
            $pajak_tujuan = 90000;
            break;
        case "Sultan Iskandar Muda":
            $pajak_tujuan = 60000;
            break;
        default:
            $pajak_tujuan = 0;  // Jika tujuan bandara tidak dikenali
    }

    // Menghitung total pajak dan total harga tiket
    $total_pajak = $pajak_asal + $pajak_tujuan;
    $total_harga = $harga_tiket + $total_pajak;

    // Menyimpan data ke dalam session
    $data_baru = [
        "NoPenerbangan" => $nomorPenerbangan,
        "Nama Lengkap" => $namaLengkap,
        "NIK" => $nik,
        "Tanggal Lahir" => $tgllahir,
        "Jenis Kelamin" => $jenisKelamin,
        "Nomor Telepon" => $notelp,
        "Tanggal Penerbangan" => $tanggal,
        "Maskapai" => $maskapai,
        "Asal" => $asal,
        "Tujuan" => $tujuan,
        "Harga Tiket" => $harga_tiket,
        "Total Pajak" => $total_pajak,
        "Total Harga Tiket" => $total_harga,
    ];

    // membuat array kosong terlebih dahulu jika session belum ada
    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = []; 
    }

    // Menambahkan data baru ke dalam session
    $_SESSION['data'][] = $data_baru; 

    // Mengarahkan ke halaman hasil.php untuk melihat data yang dimasukkan 
    header("Location: hasil.php");
    exit();
} else {
    // jika bukan metode POST, tampilkan pesan error
    echo "Akses tidak sah.";
}
?>
