<?php
session_start();
include '../config/koneksi.php';

if ($con->connect_error) {
    die("Koneksi database gagal: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $con->prepare($query);

    // Check if the prepare statement was successful
    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Successful login
            $_SESSION['username'] = $username;

            // Insert notification
            $insertQuery = "INSERT INTO notification (username, notif_konten, notification_date) VALUES (?, CONCAT('Ada aktivitas masuk ke akun Anda dari perangkat baru pada ', CURDATE()), NOW())";
            $insertStmt = $con->prepare($insertQuery);

            // Check if the prepare statement for insertion was successful
            if ($insertStmt) {
                $insertStmt->bind_param("s", $username);
                $insertStmt->execute();
                $insertStmt->close();
                
                echo "<script>alert('Login Success'); window.location='../home/index.php'</script>";
                exit;
            } else {
                echo "Error preparing insert statement: " . $con->error;
            }
        } else {
            echo "<script>alert('Incorrect Username or Password'); window.location='../index.php'</script>";
        }

        $stmt->close();
    } else {
        echo "Error preparing select statement: " . $con->error;
    }
}
?>
