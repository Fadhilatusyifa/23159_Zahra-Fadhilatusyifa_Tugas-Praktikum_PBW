<?php
include '../config/database.php';

$npm = $_GET['npm'];

// Hapus dari tabel krs terlebih dahulu
$conn->query("DELETE FROM krs WHERE mahasiswa_npm='$npm'");

// Baru hapus dari tabel mahasiswa
$sql = "DELETE FROM mahasiswa WHERE npm='$npm'";

if ($conn->query($sql)) {
    header("Location: index.php?success=1");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>