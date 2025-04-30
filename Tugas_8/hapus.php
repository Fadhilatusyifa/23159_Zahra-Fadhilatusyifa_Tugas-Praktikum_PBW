<?php
session_start();

// Mengecek apakah data dikirim melalui form POST dan nomor penerbangan tersedia
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['noPenerbangan'])) {
    $noPenerbangan = $_POST['noPenerbangan'];   // Mengambil nomor penerbangan yang mau dihapus
    
    // Mengecek apakah ada data yang tersimpan di session
    if (isset($_SESSION['data'])) {
        // Memeriksa satu per satu data di session
        foreach ($_SESSION['data'] as $key => $item) {
            // kalau nomor penerbangan yang ada di session sama dengan nomor penerbangan yang mau dihapus
            if ($item['NoPenerbangan'] == $noPenerbangan) {
                unset($_SESSION['data'][$key]);  // Menghapus data dari session
                $_SESSION['data'] = array_values($_SESSION['data']); // Mengatur ulang array
                break; // Keluar dari loop setelah data ditemukan dan dihapus
            }
        }
    }
}

// setelah selesai kembali ke halaman hasil.php
header("Location: hasil.php");
exit;
