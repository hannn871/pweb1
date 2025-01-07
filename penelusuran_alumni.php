<div class="container mt-5">
    <h2 class="mb-4">Penelusuran Alumni</h2>
    <form method="GET" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Alumni</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Cari Alumni</button>
    </form>
</div>
<?php
if (isset($_GET['nama'])) {
    include "Latihan_09_config.php"; // Koneksi database
    
    // Mengambil nama dari input dan menghindari SQL Injection
    $nama = $conn->real_escape_string($_GET['nama']);
    
    // Query untuk mencari alumni
    $sql = "SELECT * FROM alumni WHERE nama LIKE '%$nama%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Hasil Pencarian Alumni</h3>";
        echo "<table class='table table-bordered'>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tahun Lulus</th>
                    <th>Jurusan</th>
                    <th>Foto</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['nama'] . "</td>
                    <td>" . $row['tahun_lulus'] . "</td>
                    <td>" . $row['jurusan'] . "</td>
                    <td><img src='" . $row['foto'] . "' width='50'></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Tidak ada alumni yang ditemukan.</p>";
    }

    $conn->close();
}
?>