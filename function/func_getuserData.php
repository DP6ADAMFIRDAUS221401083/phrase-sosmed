<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];

        // Fetch user data
        $userDataSql = "SELECT image, status FROM users WHERE username = ?";
        $userDataStmt = $con->prepare($userDataSql);
        $userDataStmt->bind_param("s", $username);
        $userDataStmt->execute();
        $userDataStmt->bind_result($imageFileName, $status);
        $userDataStmt->fetch();
        $userDataStmt->close();

        // Fetch user posts
        $userPostsSql = "SELECT id_konten, username, isi FROM konten WHERE status = 'Non Repost' AND username = ? ORDER BY id_konten DESC";
        $userPostsStmt = $con->prepare($userPostsSql);
        $userPostsStmt->bind_param("s", $username);
        $userPostsStmt->execute();
        $userPostsResult = $userPostsStmt->get_result();
        $userPosts = [];
        while ($row = $userPostsResult->fetch_assoc()) {
            $userPosts[] = $row;
        }
        $userPostsStmt->close();

        // Combine user data and posts
        $response = [
            'image' => $imageFileName,
            'status' => $status,
            'posts' => $userPosts
        ];

        // Send the combined response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        echo "Invalid request: Missing 'username' parameter.";
    }
} else {
    echo "Invalid request method. Use POST.";
}

mysqli_close($con);
?>
