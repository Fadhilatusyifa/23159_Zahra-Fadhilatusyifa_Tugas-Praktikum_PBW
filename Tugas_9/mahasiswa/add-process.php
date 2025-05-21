<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil nilai dari form
    $npm = mysqli_real_escape_string($conn, $_POST['npm']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    
    // Query untuk menambahkan data ke database
    $sql = "INSERT INTO mahasiswa (npm, nama, jurusan, alamat) 
            VALUES ('$npm', '$nama', '$jurusan', '$alamat')";
    
    // Menjalankan query dan melakukan redirect
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?success=1");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>