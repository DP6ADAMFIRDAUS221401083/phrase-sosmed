<?php
// Koneksi database
include '../config/koneksi.php';

if ($con->connect_error) {
    die("Koneksi database gagal: " . $con->connect_error);
}
// Query untuk mendapatkan data trending
$sql = "SELECT id_konten, COUNT(*) as interaction_count FROM interactions WHERE timestamp > NOW() - INTERVAL 1 DAY GROUP BY id_konten ORDER BY interaction_count DESC LIMIT 10";

$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Post ID: " . $row["id_konten"]. " - Interaksi: " . $row["interaction_count"]. "<br>";
    }
} else {
    echo "Tidak ada postingan trending saat ini.";
}
?>
