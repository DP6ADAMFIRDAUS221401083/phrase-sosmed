<?php
session_start(); // Pastikan Anda memulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan sesi username (sesuaikan dengan cara Anda menyimpan sesi)
    $username = $_SESSION['username'];

    // Mengatur direktori penyimpanan file (sesuaikan dengan struktur folder Anda)
    $uploadDir = '../img/';

    // Menambahkan timestamp pada nama file baru
    $newFileName = $username . '_' . time() . '.jpg';

    // Menentukan path lengkap file
    $filePath = $uploadDir . $newFileName;

    // Pindahkan file yang di-upload ke direktori penyimpanan
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)) {
        // Lakukan operasi lain jika diperlukan, misalnya, update ke database
        include '../config/koneksi.php';

        // Update rekord pada tabel users
        $updateQuery = "UPDATE users SET image = '$newFileName' WHERE username = '$username'";
        if ($con->query($updateQuery) === TRUE) {
            // Set header Cache-Control untuk menghindari cache
            header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
            header('Cache-Control: post-check=0, pre-check=0', false);
            header('Pragma: no-cache');

            echo "<script>alert('Upload And Update Success!');</script>";
        } else {
            echo "<script>alert('Upload Success, and Update Failed!');</script>";
        }

        // Tutup koneksi
        $con->close();
    } else {
        echo "<script>alert('Upload Failed!');</script>";
    }
} else {
    echo "Metode tidak diizinkan.";
}
?>
