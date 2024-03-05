<?php
include '../config/koneksi.php';

// Mendapatkan data dari permintaan POST
$id_konten = $_POST['id_konten'];
$username = $_POST['username'];

// Query SQL untuk memeriksa apakah pengguna sudah memberikan like
$sqlCheckLike = "SELECT * FROM likes WHERE id_konten = ? AND username = ?";
$stmtCheckLike = $con->prepare($sqlCheckLike);
$stmtCheckLike->bind_param("ss", $id_konten, $username);
$stmtCheckLike->execute();
$resultCheckLike = $stmtCheckLike->get_result();

// Jika pengguna sudah memberikan like, hapus like
if ($resultCheckLike->num_rows > 0) {
    $sqlRemoveLike = "DELETE FROM likes WHERE id_konten = ? AND username = ?";
    $stmtRemoveLike = $con->prepare($sqlRemoveLike);
    $stmtRemoveLike->bind_param("ss", $id_konten, $username);
    $stmtRemoveLike->execute();

    $response = ['success' => true, 'action' => 'remove']; // Respon berhasil untuk menghapus like
} else {
    // Jika pengguna belum memberikan like, tambahkan like
    $sqlAddLike = "INSERT INTO likes (id_konten, username) VALUES (?, ?)";
    $stmtAddLike = $con->prepare($sqlAddLike);
    $stmtAddLike->bind_param("ss", $id_konten, $username);
    $stmtAddLike->execute();

    $response = ['success' => true, 'action' => 'add']; // Respon berhasil untuk menambahkan like
}

// Mengirim respon sebagai JSON
header('Content-Type: application/json');
echo json_encode($response);

// Menutup koneksi
$con->close();
?>
