<?php
include '../config/database.php';

// Cek apakah request method adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi input
    $error = false;
    $error_message = '';
    
    // Validasi dan sanitasi kode mata kuliah
    if (empty($_POST['kodemk']) || strlen($_POST['kodemk']) > 6) {
        $error = true;
        $error_message .= "Kode mata kuliah tidak valid. ";
    } else {
        $kodemk = mysqli_real_escape_string($conn, trim($_POST['kodemk']));
        
        // Cek apakah kode mata kuliah sudah ada di database
        $check_query = "SELECT kodemk FROM matakuliah WHERE kodemk = '$kodemk'";
        $check_result = $conn->query($check_query);
        
        if ($check_result && $check_result->num_rows > 0) {
            $error = true;
            $error_message .= "Kode mata kuliah sudah terdaftar. ";
        }
    }
    
    // Validasi dan sanitasi nama mata kuliah
    if (empty($_POST['nama']) || strlen($_POST['nama']) > 50) {
        $error = true;
        $error_message .= "Nama mata kuliah tidak valid. ";
    } else {
        $nama = mysqli_real_escape_string($conn, trim($_POST['nama']));
    }
    
    // Validasi dan sanitasi jumlah SKS
    if (!isset($_POST['jumlah_sks']) || !is_numeric($_POST['jumlah_sks']) || 
        $_POST['jumlah_sks'] < 1 || $_POST['jumlah_sks'] > 10) {
        $error = true;
        $error_message .= "Jumlah SKS tidak valid. ";
    } else {
        $jumlah_sks = intval($_POST['jumlah_sks']);
    }
    
    // Jika tidak ada error, simpan data ke database
    if (!$error) {
        try {
            $sql = "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) 
                    VALUES ('$kodemk', '$nama', $jumlah_sks)";
            
            if ($conn->query($sql) === TRUE) {
                // Redirect ke halaman index dengan pesan sukses
                header("Location: index.php?success=1");
                exit;
            } else {
                throw new Exception("Error: " . $conn->error);
            }
        } catch (Exception $e) {
            // Redirect kembali ke form dengan pesan error
            header("Location: add.php?error=1&message=" . urlencode($e->getMessage()));
            exit;
        }
    } else {
        // Redirect kembali ke form dengan pesan error
        header("Location: add.php?error=1&message=" . urlencode($error_message));
        exit;
    }
} else {
    // Jika bukan request POST, redirect ke halaman index
    header("Location: index.php");
    exit;
}

// Tutup koneksi database
$conn->close();
?>