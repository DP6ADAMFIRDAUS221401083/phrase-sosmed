<?php
session_start();
include '../config/koneksi.php';

if ($con->connect_error) {
    die("Koneksi database gagal: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $image = 'default.png'; // tambahkan ini

    // Query untuk mengecek apakah username sudah digunakan
    $checkQuery = "SELECT * FROM users WHERE username = ?";
    $checkStmt = $con->prepare($checkQuery);
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['errorMessage'] = "Username is already in use";
        header("Location: ../authentication/register.php");
        exit;
    } else {
        // Query untuk menyimpan data pengguna ke database
        $query = "INSERT INTO users (username, email, password, image) VALUES (?, ?, ?, ?)"; // tambahkan kolom image
        $stmt = $con->prepare($query);
        $stmt->bind_param("ssss", $username, $email, $password, $image); // tambahkan parameter image

        if ($stmt->execute()) {
            $profileQuery = "INSERT INTO profile (username, following, follower, likes, status) VALUES (?, 0, 0, 0, 'Non Verified')";
            $profileStmt = $con->prepare($profileQuery);
            $profileStmt->bind_param("s", $username);

            if ($profileStmt->execute()) {
                echo "<script>alert('Sign up Success'); window.location='../index.php'</script>";
                exit;
            } else {
                $_SESSION['errorMessage'] = "Gagal mendaftar.";
                echo "<script>alert('Sign up failed'); window.location='../authentication/register.php'</script>";
                exit;
            }
        } else {
            $_SESSION['errorMessage'] = "Failed to register.";
            echo "<script>alert('Sign up gagal'); window.location='../authentication/register.php'</script>";
            exit;
        }        
    }
}
?>
