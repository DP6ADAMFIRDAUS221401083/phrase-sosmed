<?php
session_start();
include '../config/koneksi.php';

if ($con->connect_error) {
    die("Koneksi database gagal: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input, pastikan data yang diperlukan tersedia
    if (isset($_POST['id_konten']) && isset($_POST['isi'])) {
        $id_konten = $_POST['id_konten'];
        $isi_komentar = $_POST['isi'];
        $comment_username = $_SESSION['username'];

        // Query SQL untuk memasukkan komentar ke dalam tabel komentar
        $sqlInsertComment = "INSERT INTO komentar (id_konten, comment_text, comment_username) VALUES (?, ?, ?)";
        
        $stmtInsertComment = $con->prepare($sqlInsertComment);
        $stmtInsertComment->bind_param("iss", $id_konten, $isi_komentar, $comment_username);
        
        if ($stmtInsertComment->execute()) {
            echo "<script>alert('Comment Add!'); window.location='../home/index.php'</script>";
        } else {
            echo "Error: " . $sqlInsertComment . "<br>" . $con->error;
        }

        $stmtInsertComment->close();
    } else {
        // Data yang dibutuhkan tidak lengkap
        echo "Data yang dibutuhkan tidak lengkap.";
    }
} else {
    // Metode HTTP tidak sesuai
    echo "Metode HTTP tidak sesuai. Gunakan metode POST.";
}

$con->close();
?>
