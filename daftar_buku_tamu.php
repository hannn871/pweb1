<h3>Daftar Buku Tamu</h3>
<hr>
<?php
include 'Latihan_09_config.php';

$sql = "SELECT * FROM buku_tamu ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nama'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['pesan'] . "</td>
                <td>" . $row['created_at'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada pesan.</p>";
}

$conn->close();