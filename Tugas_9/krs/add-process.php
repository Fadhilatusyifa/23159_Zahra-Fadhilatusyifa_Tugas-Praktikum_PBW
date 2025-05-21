<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mahasiswa_npm = isset($_POST['mahasiswa_npm']) ? $_POST['mahasiswa_npm'] : null;
    $matakuliah_kodemk = isset($_POST['matakuliah_kodemk']) ? $_POST['matakuliah_kodemk'] : null;

    if ($mahasiswa_npm && $matakuliah_kodemk) {
        $stmt = $conn->prepare("INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES (?, ?)");
        $stmt->bind_param("ss", $mahasiswa_npm, $matakuliah_kodemk);

        if ($stmt->execute()) {
            header("Location: index.php?success=1");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Data tidak lengkap. Pastikan semua field terisi.";
    }
}
$conn->close();
?>
