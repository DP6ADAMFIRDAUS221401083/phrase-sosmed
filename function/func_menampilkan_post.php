<?php
include '../config/koneksi.php';
date_default_timezone_set('Asia/Jakarta');
// Memeriksa koneksi
if ($con->connect_error) {
    die("Koneksi gagal: " . $con->connect_error);
}

// Variabel username dari sesi yang sedang login
$loggedInUsername = $_SESSION['username'];

// Query SQL untuk mengambil konten dan likes berdasarkan relasinya
$sqlKonten = "
    SELECT konten.id_konten, konten.username, konten.isi,konten.media, konten.status, konten.posted_at, likes.id_konten AS liked
    FROM konten
    LEFT JOIN likes ON konten.id_konten = likes.id_konten AND likes.username = ?
    ORDER BY konten.id_konten DESC
";


$stmtKonten = $con->prepare($sqlKonten);
if (!$stmtKonten) {
    // Menangani kesalahan pada kueri SQL
    die("Error in statement: " . $con->error);
}
$stmtKonten->bind_param("s", $loggedInUsername);
$stmtKonten->execute();
$resultKonten = $stmtKonten->get_result();

if ($resultKonten->num_rows > 0) {
    while ($rowKonten = $resultKonten->fetch_assoc()) {
        echo '<div class="container mt-3" style="border-bottom: 1px solid #1c172d;">';
        echo '<div class="row">';
        echo '<div class="col-12">';
        echo '<div class="profile-contain">';

        // Memeriksa tipe_akun untuk menentukan apakah harus menampilkan gambar default
        $sqlTipeAkun = "SELECT tipe_akun FROM profile WHERE username = ?";
        $stmtTipeAkun = $con->prepare($sqlTipeAkun);
        $stmtTipeAkun->bind_param("s", $rowKonten['username']);
        $stmtTipeAkun->execute();
        $resultTipeAkun = $stmtTipeAkun->get_result();

        if ($resultTipeAkun->num_rows > 0) {
            $rowTipeAkun = $resultTipeAkun->fetch_assoc();
        
            // Tampilkan gambar default dan teks "Private account" jika tipe_akun adalah "Private"
            if ($rowTipeAkun["tipe_akun"] === "Private") {
                echo '<img class="profile-picture" src="../img/default.png" alt="Profile Picture">';
                echo '<div class="profile-username">Private account</div>';
            } else {
                // Tampilkan gambar profil dan username
                $sqlProfile = "SELECT image FROM users WHERE username = ?";
                $stmtProfile = $con->prepare($sqlProfile);
                $stmtProfile->bind_param("s", $rowKonten['username']);
                $stmtProfile->execute();
                $resultProfile = $stmtProfile->get_result();
        
                if ($resultProfile->num_rows > 0) {
                    $rowProfile = $resultProfile->fetch_assoc();
                    $nama_file = $rowProfile["image"];
                    $lokasi_file = "../img/" . $nama_file;
        
                    // Periksa apakah file ada
                    if (file_exists($lokasi_file)) {
                        echo '<img class="profile-picture" src="../img/' . $nama_file . '" alt="Profile Picture">';
                    } else {
                        echo "File tidak ditemukan.";
                    }
                } else {
                    echo "Tidak ada data pengguna ditemukan.";
                }
        
                // Tampilkan username
                echo '<div class="profile-username">';
                if ($rowKonten["username"] === $loggedInUsername) {
                    echo $rowKonten["username"];
                    // Query SQL untuk mengambil status
                    $sqlStatus = "SELECT status FROM profile WHERE username = ?";
                    $stmtStatus = $con->prepare($sqlStatus);
                    $stmtStatus->bind_param("s", $rowKonten["username"]);
                    $stmtStatus->execute();
                    $resultStatus = $stmtStatus->get_result();
        
                    if ($resultStatus->num_rows > 0) {
                        $rowStatus = $resultStatus->fetch_assoc();
                        if ($rowStatus["status"] === "Verified") {
                            echo '<span class="verified-badge">✓</span>';
                        }
                    }
                    echo '<span class="fw-normal" style="font-size: small;"> -You </span>';
                } else {
                    echo $rowKonten["username"];
        
                    // Query SQL untuk mengambil status
                    $sqlStatus = "SELECT status FROM profile WHERE username = ?";
                    $stmtStatus = $con->prepare($sqlStatus);
                    $stmtStatus->bind_param("s", $rowKonten["username"]);
                    $stmtStatus->execute();
                    $resultStatus = $stmtStatus->get_result();
        
                    if ($resultStatus->num_rows > 0) {
                        $rowStatus = $resultStatus->fetch_assoc();
                        if ($rowStatus["status"] === "Verified") {
                            echo '<span class="verified-badge">✓</span>';
                        }
                    }
                }
                echo '</div>'; 
            }
            
        }        
        $current_time = time();
        $posted_at = strtotime($rowKonten["posted_at"]);
        $time_diff = $current_time - $posted_at;
        
        $minutes_diff = round($time_diff / 60);
        $hours_diff = round($time_diff / 3600);
        $days_diff = round($time_diff / 86400);

        echo '<div class="row ms-2 me-2 mb-2 mt-2 text-start">'; // Tambah margin-top di sini
        echo '<div class="col-12" style="font-size: smaller; color: #ff5838;">';
        echo '• &nbsp;'; // Tambahkan &nbsp; untuk memberikan jarak
        
        if ($time_diff < 60){
            echo $time_diff . ' seconds ago';
        }
        elseif ($minutes_diff < 60) {
            // Menit yang lalu
            echo $minutes_diff . ' minutes ago';
        } elseif ($hours_diff < 24) {
            // Jam yang lalu
            echo $hours_diff . ' hours ago';
        } else {
            // Hari yang lalu
            echo $days_diff . ' days ago';
        }
        echo '</div>';
        echo '</div>';
        

        echo '</div>';
        echo '</div>';
        echo '</div>';

        // ISI POST
        echo '<div class="row ms-2 me-2 text-start">';
        echo '<div class="col-12">';

        if ($rowKonten["status"] === "Repost") {
            echo '<p style="color: #ff5838;"><i class="fas fa-retweet m-1"></i> Repost</p>';
        }

        echo '<p style="text-align: justify;">' . $rowKonten["isi"] . '</p>';
        echo '</div>';

        // Tampilkan gambar jika media ada
        if (!empty($rowKonten["media"])) {
            echo '<div class="col-12 text-center">';
            $nama_file = $rowKonten["media"];
            $lokasi_file = "../img_post/" . $nama_file;
            if (file_exists($lokasi_file)) {
                // Perbaiki sintaks style dan penutup tag img
                echo '<img src="../img_post/' . $rowKonten['media'] . '" alt="Posted Image" class="img-fluid" style="border: 2px solid #000; border-radius: 15px;">';
            } else {
                echo "File tidak ditemukan.";
            }
            echo '</div>';
        }

        echo '</div>';
        echo '<div class="row ms-2 me-2 mb-4 text-start">';
        echo '<div class="col-12" style="color: #ff5838; font-size: larger;">';

        // Menampilkan ikon dengan kondisi "liked" dan penanganan event dengan JavaScript
        echo '<i class="fas fa-heart m-2 heart-icon' . ($rowKonten['liked'] !== null ? ' clicked' : '') . '" onclick="toggleLike(this)" data-id-konten="' . $rowKonten['id_konten'] . '"></i><i class="fas fa-comment m-2" onclick="toggleCommentForm(' . $rowKonten['id_konten'] . ')"></i><i class="fas fa-retweet m-2 repost-icon" onclick="toggleRepost(this)" data-id-konten="' . $rowKonten['id_konten'] . '"></i>';
        echo '</div>';
        echo '</div>';






        // Display comments for the current post
        

        // Display comment form
        echo '<div id="commentForm' . $rowKonten['id_konten'] . '" style="display: none;">';
        echo '<form action="../function/func_insert_comment.php" method="post">'; // Ganti dengan path yang benar jika perlu
        echo '<input type="hidden" name="id_konten" value="' . $rowKonten['id_konten'] . '">';
        echo '<div class="profile-input">';
        echo '<input type="text" placeholder="Add Comment?" name="isi" class="thought-input">';
        echo '<button class="post-button" type="submit" name="comment_button">Comment</button>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo '</div>'; // Close the container for the entire post (user profile, post content, comments, and comment form)

        $sqlComments = "SELECT comment_text, comment_username FROM komentar WHERE id_konten = ?";
        $stmtComments = $con->prepare($sqlComments);
        $stmtComments->bind_param("i", $rowKonten['id_konten']);
        $stmtComments->execute();
        $resultComments = $stmtComments->get_result();

        if ($resultComments->num_rows > 0) {
            echo '<div class="comment-container" style="margin-left: 10px;">';
            echo '<h5 class="card-title fw-bold m-3">Comment</h5>';
            echo '<div class="row ms-2 me-2 mb-4 text-start">';
            echo '<div class="col-12">';
            while ($rowComment = $resultComments->fetch_assoc()) {
                echo '<div class="container mt-3" style="border-bottom: 1px solid #1c172d;">';
                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<div class="profile-contain">';

                // Mengambil tipe akun dari database
                $sqlTipeAkunComment = "SELECT tipe_akun FROM profile WHERE username = ?";
                $stmtTipeAkunComment = $con->prepare($sqlTipeAkunComment);
                $stmtTipeAkunComment->bind_param("s", $rowComment['comment_username']);
                $stmtTipeAkunComment->execute();
                $resultTipeAkunComment = $stmtTipeAkunComment->get_result();

                if ($resultTipeAkunComment->num_rows > 0) {
                    $rowTipeAkunComment = $resultTipeAkunComment->fetch_assoc();

                    // Tampilkan gambar default dan teks "Private account" jika tipe_akun adalah "Private"
                    if ($rowTipeAkunComment["tipe_akun"] === "Private") {
                        echo '<img class="profile-picture" src="../img/default.png" alt="Profile Picture">';
                        echo '<div class="profile-username">Private account</div>';
                    } else {
                        // Tampilkan gambar profil dan username
                        $sqlProfileComment = "SELECT image FROM users WHERE username = ?";
                        $stmtProfileComment = $con->prepare($sqlProfileComment);
                        $stmtProfileComment->bind_param("s", $rowComment['comment_username']);
                        $stmtProfileComment->execute();
                        $resultProfileComment = $stmtProfileComment->get_result();

                        if ($resultProfileComment->num_rows > 0) {
                            $rowProfileComment = $resultProfileComment->fetch_assoc();
                            $nama_file_comment = $rowProfileComment["image"];
                            $lokasi_file_comment = "../img/" . $nama_file_comment;

                            // Periksa apakah file ada
                            if (file_exists($lokasi_file_comment)) {
                                echo '<img class="profile-picture" src="../img/' . $nama_file_comment . '" alt="Profile Picture">';
                            } else {
                                echo "File tidak ditemukan.";
                            }
                        } else {
                            echo "Tidak ada data pengguna ditemukan.";
                        }

                        // Tampilkan username
                        echo '<div class="profile-username">';
                        if ($rowComment["comment_username"] === $loggedInUsername) {
                            echo $rowComment["comment_username"];
                            // Query SQL untuk mengambil status
                            $sqlStatusComment = "SELECT status FROM profile WHERE username = ?";
                            $stmtStatusComment = $con->prepare($sqlStatusComment);
                            $stmtStatusComment->bind_param("s", $rowComment["comment_username"]);
                            $stmtStatusComment->execute();
                            $resultStatusComment = $stmtStatusComment->get_result();

                            if ($resultStatusComment->num_rows > 0) {
                                $rowStatusComment = $resultStatusComment->fetch_assoc();
                                if ($rowStatusComment["status"] === "Verified") {
                                    echo '<span class="verified-badge">✓</span>';
                                }
                            }
                            echo '<span class="fw-normal" style="font-size: small;"> -You </span>';
                        } else {
                            echo $rowComment["comment_username"];

                            // Query SQL untuk mengambil status
                            $sqlStatusComment = "SELECT status FROM profile WHERE username = ?";
                            $stmtStatusComment = $con->prepare($sqlStatusComment);
                            $stmtStatusComment->bind_param("s", $rowComment["comment_username"]);
                            $stmtStatusComment->execute();
                            $resultStatusComment = $stmtStatusComment->get_result();

                            if ($resultStatusComment->num_rows > 0) {
                                $rowStatusComment = $resultStatusComment->fetch_assoc();
                                if ($rowStatusComment["status"] === "Verified") {
                                    echo '<span class="verified-badge">✓</span>';
                                }
                            }
                        }
                        echo '</div>';
                    }
                }

                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="row ms-2 me-2 text-start">';
                echo '<div class="col-12">';
                echo '<p style="text-align: justify; margin-bottom: 30px;">' . $rowComment["comment_text"] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>'; // Close the comment container
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
} else {
    echo "Tidak ada Postingan.";
}

// Menutup koneksi
$stmtKonten->close();
$con->close();
?>