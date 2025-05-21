<?php
include '../config/database.php';

if (isset($_GET['kodemk'])) {
    $kodemk = $_GET['kodemk'];

    // Hapus dulu entri yang terkait di tabel KRS jika ada
    $conn->query("DELETE FROM krs WHERE matakuliah_kodemk = '$kodemk'");

    // Lanjutkan hapus dari tabel matakuliah
    $sql = "DELETE FROM matakuliah WHERE kodemk = '$kodemk'";

    if ($conn->query($sql)) {
        header("Location: index.php?success=1");
        exit();
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Parameter kode mata kuliah tidak ditemukan.";
}
?>
