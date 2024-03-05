<?php
session_start();
include '../config/koneksi.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Assuming you have a MySQL connection established
    $insertQuery = "INSERT INTO notification (username, notif_konten, notification_date) VALUES ('$username', 'Ada aktivitas masuk ke akun Anda dari perangkat baru pada ' . CURDATE(), NOW())";
    $insertResult = mysqli_query($con, $insertQuery);

    if (!$insertResult) {
        echo 'Error inserting notification: ' . mysqli_error($con);
    }
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}
?>
