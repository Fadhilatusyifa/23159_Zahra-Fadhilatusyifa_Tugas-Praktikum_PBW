<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    
    $sql = "UPDATE mahasiswa SET 
            nama='$nama', 
            jurusan='$jurusan', 
            alamat='$alamat' 
            WHERE npm='$npm'";
    
    if ($conn->query($sql)) {
        header("Location: index.php?success=1");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>