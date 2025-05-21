<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kodemk = $_POST['kodemk'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $jumlah_sks = $_POST['jumlah_sks'] ?? '';

    if ($kodemk && $nama && $jumlah_sks !== '') {
        $sql = "UPDATE matakuliah SET nama = ?, jumlah_sks = ? WHERE kodemk = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sis", $nama, $jumlah_sks, $kodemk);

        if ($stmt->execute()) {
            header("Location: index.php?success=1");
            exit();
        } else {
            echo "Gagal mengupdate data: " . $conn->error;
        }
    } else {
        echo "Semua data harus diisi.";
    }
} else {
    echo "Metode tidak diizinkan.";
}
