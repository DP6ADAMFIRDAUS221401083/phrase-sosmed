<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Pastikan ID postingan tersedia dan tidak kosong
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        // Ambil ID postingan dari parameter URL
        $id_konten = $_GET["id"];

        // Panggil file koneksi untuk terhubung ke database
        include '../config/koneksi.php';

        // Periksa koneksi
        if ($con->connect_error) {
            die("Koneksi gagal: " . $con->connect_error);
        }

        // Query SQL untuk menghapus postingan berdasarkan ID
        $sql_delete = "DELETE FROM konten WHERE id_konten = '$id_konten'";
        if ($con->query($sql_delete) === TRUE) {
            // Redirect ke halaman sebelumnya atau halaman lain jika diperlukan
            header("Location: ../home/profile.php");
            exit();
        } else {
            echo "Error: " . $sql_delete . "<br>" . $con->error;
        }

        // Tutup koneksi
        $con->close();
    } else {
        echo "ID postingan tidak tersedia atau kosong.";
    }
} else {
    echo "Metode tidak diizinkan.";
}

?>
