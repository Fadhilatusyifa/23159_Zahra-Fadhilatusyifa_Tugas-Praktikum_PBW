<?php
include '../config/database.php';

// Atur header agar browser mendownload file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_mahasiswa.xls");

// Buat tabel HTML untuk diekspor ke Excel
echo "<table border='1'>";
echo "<tr>
        <th>NPM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Alamat</th>
      </tr>";

$sql = "SELECT * FROM mahasiswa ORDER BY npm ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['npm']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
        echo "<td>" . htmlspecialchars($row['jurusan']) . "</td>";
        echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
}
echo "</table>";

$conn->close();
?>
