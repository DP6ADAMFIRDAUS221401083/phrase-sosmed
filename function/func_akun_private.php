<?php
// func_akun_private.php

include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Jika permintaan adalah GET, berarti kita ingin memeriksa status akun
    $username = $_GET['username'];

    // Lakukan koneksi ke database menggunakan $con (pastikan sudah terhubung)

    // Dapatkan nilai tipe_akun dari database
    $query = "SELECT tipe_akun FROM profile WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo $row['tipe_akun'];
    } else {
        echo "Gagal mendapatkan tipe_akun: " . mysqli_error($con);
    }

    // Tutup koneksi ke database jika diperlukan
    mysqli_close($con);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Jika permintaan adalah POST, berarti kita ingin memperbarui status akun
    $username = $_POST['username'];

    // Lakukan koneksi ke database menggunakan $con (pastikan sudah terhubung)

    // Dapatkan nilai tipe_akun dari database
    $query = "SELECT tipe_akun FROM profile WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentStatus = $row['tipe_akun'];

        // Ubah status akun
        if ($currentStatus == 'Public') {
            $queryUpdate = "UPDATE profile SET tipe_akun = 'Private' WHERE username = '$username'";
        } elseif ($currentStatus == 'Private') {
            $queryUpdate = "UPDATE profile SET tipe_akun = 'Public' WHERE username = '$username'";
        }

        // Lakukan pembaruan di database
        $resultUpdate = mysqli_query($con, $queryUpdate);

        if ($resultUpdate) {
            echo "Pembaruan berhasil!";
        } else {
            echo "Gagal melakukan pembaruan: " . mysqli_error($con);
        }
    } else {
        echo "Gagal mendapatkan tipe_akun: " . mysqli_error($con);
    }

    // Tutup koneksi ke database jika diperlukan
    mysqli_close($con);
} else {
    echo "Metode permintaan tidak valid.";
}
?>
