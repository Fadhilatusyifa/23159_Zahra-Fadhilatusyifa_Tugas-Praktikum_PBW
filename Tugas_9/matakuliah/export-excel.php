<?php
include '../config/database.php';

// Header untuk file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data-matakuliah.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Query data mata kuliah
$sql = "SELECT * FROM matakuliah";
$result = $conn->query($sql);

// Output data ke tabel Excel
echo "<table border='1'>";
echo "<tr>
        <th>Kode MK</th>
        <th>Nama Mata Kuliah</th>
        <th>Jumlah SKS</th>
      </tr>";

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['kodemk']) . "</td>
                <td>" . htmlspecialchars($row['nama']) . "</td>
                <td>" . htmlspecialchars($row['jumlah_sks']) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
}
echo "</table>";
?>
