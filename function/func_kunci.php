<?php
// Mulai sesi
session_start();

// Periksa apakah sesi username sudah diset
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

$username = $_SESSION['username']; // Mengonversi sesi menjadi variabel
?>
