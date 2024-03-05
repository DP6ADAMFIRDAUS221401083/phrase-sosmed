<?php
include '../config/koneksi.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Assuming you have a MySQL connection established
    $selectQuery = "SELECT * FROM notification WHERE username = '$username' ORDER BY notification_date DESC LIMIT 10";
    $result = mysqli_query($con, $selectQuery);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="container mt-3" style="border-bottom: 1px solid #1c172d;">';
            echo '<div class="row">';
            echo '<div class="col-12">';
            echo '<div class="profile-contain">';
            echo '<img class="logo-notif mb-3" src="../img/logo.png" alt="Profile Picture">';
            echo '<div>';
            echo '<div class="profile-contain" style="text-align: start;">';
            echo '<p>There was sign-in activity to your account <b>' . $row['username'] . '</b> from the new device on ' . $row['notification_date'] . '.<br><a href="#">Review now</a></p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'Error retrieving notifications: ' . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: func_login.php");
    exit();
}
?>
