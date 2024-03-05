<?php
session_start(); // Pastikan Anda memulai sesi

include '../config/koneksi.php';

// Mendapatkan data dari permintaan POST
$id_konten = $_POST['id_konten'];

// Mendapatkan username dari sesi (sesuaikan dengan cara Anda menyimpan sesi)
$sessionUsername = $_SESSION['username'];

// Query SQL untuk mendapatkan username pemilik konten
$sqlGetUsername = "SELECT username FROM konten WHERE id_konten = ?";
$stmtGetUsername = $con->prepare($sqlGetUsername);
$stmtGetUsername->bind_param("s", $id_konten);
$stmtGetUsername->execute();
$resultGetUsername = $stmtGetUsername->get_result();

if ($resultGetUsername->num_rows > 0) {
    $row = $resultGetUsername->fetch_assoc();
    $usernameToRepost = $row['username'];

    // Memeriksa apakah pengguna mencoba untuk repost kontennya sendiri
    if ($usernameToRepost === $sessionUsername) {
        // Jika iya, kirim respon sebagai JSON
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Cannot repost own content.']);
        exit(); // Hentikan eksekusi skrip
    }

    // Query SQL untuk memeriksa apakah konten sudah di-repost oleh pengguna
    $sqlCheckRepost = "SELECT id_konten, status FROM konten WHERE username = ? AND id_konten = ?";
    $stmtCheckRepost = $con->prepare($sqlCheckRepost);
    $stmtCheckRepost->bind_param("ss", $sessionUsername, $id_konten);
    $stmtCheckRepost->execute();
    $resultCheckRepost = $stmtCheckRepost->get_result();

    if ($resultCheckRepost->num_rows == 0) {
        // Jika belum di-repost, lakukan repost dan kirim respon sebagai JSON
        $sqlRepost = "INSERT INTO konten (username, isi, jumlah_like, jumlah_repost, share, status) SELECT ?, isi, 0, 0, 0, 'Repost' FROM konten WHERE id_konten = ?";
        $stmtRepost = $con->prepare($sqlRepost);
        $stmtRepost->bind_param("ss", $sessionUsername, $id_konten);
        $stmtRepost->execute();

        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    } else {
        // Jika sudah di-repost, hapus repost dan kirim respon sebagai JSON
        $sqlDeleteRepost = "DELETE FROM konten WHERE username = ? AND id_konten = ?";
        $stmtDeleteRepost = $con->prepare($sqlDeleteRepost);
        $stmtDeleteRepost->bind_param("ss", $sessionUsername, $id_konten);
        $stmtDeleteRepost->execute();

        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Repost dihapus.']);
    }
} else {
    // Jika ID konten tidak valid
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'ID konten tidak valid.']);
}

// Menutup koneksi
$con->close();
?>
