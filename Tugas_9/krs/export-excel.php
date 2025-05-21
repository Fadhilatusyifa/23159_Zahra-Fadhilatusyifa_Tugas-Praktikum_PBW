<?php
include '../config/database.php';

// Atur header agar browser mendownload file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_krs.xls");

// Buat tabel HTML untuk diekspor ke Excel
echo "<table border='1'>";
echo "<tr>
        <th>No</th>
        <th>Nama Mahasiswa</th>
        <th>Mata Kuliah</th>
        <th>Jumlah SKS</th>
        <th>Keterangan</th>
      </tr>";

$sql = "SELECT k.*, m.nama as nama_mahasiswa, mk.nama as nama_matakuliah, mk.jumlah_sks
        FROM krs k
        JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
        JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk";

$result = $conn->query($sql);
$no = 1;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $keterangan = $row['nama_mahasiswa'] . ' Mengambil Mata Kuliah ' . $row['nama_matakuliah'] . ' (' . $row['jumlah_sks'] . ' SKS)';
        
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . htmlspecialchars($row['nama_mahasiswa']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama_matakuliah']) . "</td>";
        echo "<td>" . $row['jumlah_sks'] . "</td>";
        echo "<td>" . htmlspecialchars($keterangan) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
}

echo "</table>";
$conn->close();
?>
