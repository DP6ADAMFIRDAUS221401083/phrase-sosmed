<?php

// Membuat koneksi ke database 
include '../config/koneksi.php';

if ($con->connect_error) {
    die("Koneksi database gagal: " . $con->connect_error);
}
// Query SQL
$sql = "
    SELECT id_konten, COUNT(*) as interaction_count
    FROM interaction
    WHERE timestamp > NOW() - INTERVAL 1 DAY
    GROUP BY id_konten
    ORDER BY interaction_count DESC
    LIMIT 10;
";

$result = $conn->query($sql);

// Memeriksa apakah query berhasil dijalankan
if ($result) {
    // Menampilkan hasil query
    echo "<table border='1'>
            <tr>
                <th>Post ID</th>
                <th>Interaction Count</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["post_id"] . "</td>
                <td>" . $row["interaction_count"] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    // Menampilkan pesan kesalahan jika query gagal
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();

?>
