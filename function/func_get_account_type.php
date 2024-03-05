<?php
include '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil username dari permintaan POST
    $username = $_POST['username'];

    // Query SQL untuk mendapatkan tipe akun dari tabel profile
    $sql = "SELECT tipe_akun FROM profile WHERE username = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Mengembalikan tipe akun ke client
        echo $row['tipe_akun'];
    } else {
        // Jika username tidak ditemukan, kembalikan pesan kesalahan
        echo 'Error: Username not found.';
    }

    // Tutup statement
    $stmt->close();
    // Tutup koneksi
    $con->close();
} else {
    // Jika bukan permintaan POST, kembalikan pesan kesalahan
    echo 'Error: Invalid request.';
}
?>
