<h3>Daftar Lowongan Kerja</h3>
<hr>
<?php
include 'Latihan_09_config.php';

$sql = "SELECT * FROM bursa_kerja ORDER BY tanggal_posting DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Perusahaan</th>
                <th>Lokasi</th>
                <th>Tanggal Posting</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['judul'] . "</td>
                <td>" . $row['deskripsi'] . "</td>
                <td>" . $row['perusahaan'] . "</td>
                <td>" . $row['lokasi'] . "</td>
                <td>" . $row['tanggal_posting'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada lowongan kerja.</p>";
}

$conn->close();