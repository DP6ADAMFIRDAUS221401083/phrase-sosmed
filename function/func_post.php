<?php
session_start();
include '../config/koneksi.php';

if ($con->connect_error) {
    die("Koneksi database gagal: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input
    $isi = filter_input(INPUT_POST, 'isi', FILTER_SANITIZE_STRING);

    // Check if the input is empty or contains inappropriate content
    if (empty($isi) || containsInappropriateContent($isi)) {
        echo "<script>alert('Input Forbidden!'); window.location='../home/index.php'</script>";
        exit();
    }

    $jumlah_like = 0;
    $jumlah_repost = 0;
    $share = 0;
    $status = "Non Repost";

    // Memeriksa apakah sesi username telah diset sebelumnya
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("INSERT INTO konten (username, isi, jumlah_like, jumlah_repost, share, status) 
                               VALUES (?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("ssiiis", $username, $isi, $jumlah_like, $jumlah_repost, $share, $status);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Konten Ditambahkan!'); window.location='../home/index.php'</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Sesi username belum diatur.";
    }
}

$con->close();

// Function to check for inappropriate content
function containsInappropriateContent($input) {
    // Add your list of inappropriate words or patterns here
    $inappropriateWords = array("kontol", "pepek", "p3p3k", "k0nt0l", "memek", "m3m3k", "dick", "d1ck", "ngentot", "ngentod", "kentod", "ngentid", "ngent0d", "kent0d", "kentot", "kent0t", "anjeng", "4nj3ng", "4njeng", "ah lu", "ahlu");

    foreach ($inappropriateWords as $word) {
        if (stripos($input, $word) !== false) {
            return true;
        }
    }

    return false;
}
?>
