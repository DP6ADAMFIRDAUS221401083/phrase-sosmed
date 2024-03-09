<?php include '../function/func_kunci.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home / Phrascape</title>
    <!-- Tautan Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="../img/favicon.png" type="image/png">
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #ffc884;
        }

        /* Header */
        .logo {
            padding: 15px;
            text-align: center;
        }

        .logo img {
            width: 55px;
            margin-right: 80px;
        }

        /* Side Navbar */
        .side-navbar {
            background-color: #ffc884;
            width: 350px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            border-right: 1px solid #1c172d;
            padding-top: 20px;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
            margin-left: 100px;
        }

        .nav-link {
            cursor: pointer;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #1c172d;
            padding: 15px;
            margin: 10px 0;
            border-radius: 30px;
        }

        .nav-link:hover {
            background-color: #fe9840;
            border-radius: 30px;
            color: #1c172d;
        }

        .active {
            font-weight: bold;
            color: #ff5838;
            cursor: not-allowed;
        }

        .nav-link i {
            margin-right: 10px;
            width: 20px;
        }

        /* Tweet Button */
        .tweet-button {
            background-color: #ff5838;
            color: #1c172d;
            border: none;
            padding: 12px 20px;
            margin: 15px 15px 10px 100px;
            width: 60%;
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
        }

        .tweet-button:hover {
            background-color: #1c172d;
            color: #fff;
            border: none;
            padding: 12px 20px;
            margin: 15px 15px 10px 100px;
            width: 60%;
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
        }

        /* Profile Section */
        .profile-main {
            display: flex;
            align-items: center;
            margin: 10px auto 5px 0;
            padding: 8px;
            position: sticky;
            top: 0; /* Membuat elemen tetap di atas saat discroll */
            background-color: #ffc884;
            z-index: 1000;
            border-bottom: 1px solid #1c172d;
            background: rgba(255, 200, 132, 0.9); /* Tambahkan background dengan opacity */
            transition: background-color 0.3s ease; /* Efek transisi */
        }

        .profile-main.is-sticky {
            background: rgba(255, 200, 132, 0.8); /* Background penuh saat elemen tetap (sticky) */
            background: transparent;
            backdrop-filter: blur(7px);
        }

        .profile-main .container {
            position: relative;
            z-index: 1001;
        }

        .profile-main .container img {
            width: 40px;
            margin-right: 80px;
        }

        .profile-input {
            display: flex;
            align-items: center;
            margin-left: 15px;
        }

        .thought-input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 30px;
            background-color: transparent;
            color: #1c172d;
            font-size: 16px;
            width: 300px;
            height: 40px;
            margin: 0 10px;
        }

        .post-button {
            background-color: #ff5838;
            color: #1c172d;
            border: none;
            padding: 12px 28px 12px 28px;
            margin: 15px 0 10px 0;
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
        }

        .post-button:hover {
            background-color: #1c172d;
            color: #fff;
        }

        /* Profile Container */
        .profile-container {
            display: flex;
            align-items: center;
            margin: 160px auto 20px 100px;
            padding: 8px;
            position: relative;
        }

        .follow-container {
            display: flex;
            align-items: center;
            margin: 5px auto 10px 0;
            padding: 8px;
            position: relative;
        }

        .profile-contain {
            display: flex;
            align-items: center;
            margin: 10px auto 10px auto;
            padding: 8px;
        }

        .logo-notif {
            max-width: 40px;
            margin: 0 10px 0 8px;
            cursor: pointer;
        }

        .profile-container:hover {
            background-color: #fe9840;
            border-radius: 60px;
            padding: 8px;
        }

        .profile-picture {
            width: 50px;
            height: 50px;
            border: 2px solid #ff5838;
            border-radius: 50%;
        }

        .profile-follow {
            width: 45px;
            height: 45px;
            border: 2px solid #1c172d;
            border-radius: 50%;
        }

        .profile-content {
            width: 50px;
            height: 50px;
            border: 2px solid #1c172d;
            border-radius: 50%;
            margin-top: 8px 8px;
            cursor: pointer;
        }

        .profile-username {
            margin-left: 10px;
            font-weight: bold;
            color: #1c172d;
            cursor: pointer;
        }

        .profile-handle {
            margin-left: 10px;
            font-weight: normal;
            font-size: 13px;
            color: #1c172d;
        }

        .profile-key {
            margin-left: 5px;
        }

        /* Side Right */
        .side-right {
            background-color: #ffc884;
            width: 350px;
            height: 100%;
            position: fixed;
            top: 0;
            right: 0;
            color: #1c172d;
            border-left: 1px solid #1c172d;
            padding: 20px;
            text-align: center;
            overflow: auto;
        }

        /* Main Content */
        .main-content {
            padding: 20px;
            margin-left: 350px;
            margin-right: 350px;
            text-align: center;
            height: 100%;
            color: #1c172d;
        }

        /* Verified Badge */
        .verified-badge {
            background-color: #1da1f2;
            color: #fff;
            font-size: 12px;
            padding: 2px 4px;
            border-radius: 50%;
            margin-left: 5px;
        }

        .trending:hover {
            background-color: #ffc884;
            border-radius: 15px;
        }

        .notif-content {
            margin: 10px 0 0 20px;
            text-align: start;
            color: #1c172d;
            cursor: pointer;
        }

        .custom-search-box {
            display: flex;
            width: 100%;
            max-width: 800px;
            min-width: 300px;
        }

        .search-input {
            flex: 1;
            border-radius: 30px 0 0 30px;
            background-color: #fe9840;
            border: 1px solid #ff5838;
            padding: 10px;
        }

        .search-button {
            background-color: #ff5838;
            color: #fff;
            border: none;
            border-radius: 0 30px 30px 0;
            padding: 0 15px 0 10px;
            cursor: pointer;
        }

        /* Media Query for Small Screens */
        @media (max-width: 1024px) {
            .side-navbar {
                display: none;
            }

            .bottom-navbar {
                position: fixed;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                background-color: #ff5838;
                padding: 18px;
                border-radius: 30px 30px 0 0;
                display: flex;
                justify-content: space-around;
                width: 100%;
                z-index: 1000;
            }

            .nav-item {
                text-decoration: none;
                color: #fff;
                padding: 10px 15px;
                margin-right: 10px;
                border-radius: 50%;
                transition: background-color 0.3s ease;
            }

            .nav-item:hover {
                background-color: #1c172d;
                padding: 10px 15px;
            }

            .tweet-button {
                display: none;
            }

            /* Update style for mobile and tablet */
            .side-right {
                display: none;
            }

            .main-content {
                width: 100%;
                box-sizing: border-box;
                text-align: center;
                margin-left: 0;
                margin-right: 0;
            }

            .thought-input {
                width: 100%;
                margin: 0;
            }

            .active {
                background-color: #1c172d;
                padding: 10px 15px;
            }

            /* Remove border-bottom under the header on small screens */
            .main-content .profile-main::after {
                display: none;
            }
        }
    </style>
</head>
<body>
    <nav class="side-navbar">
        <div class="logo">
            <img src="../img/logo.png" alt="Twitter Logo">
        </div>
        <ul class="nav-links">
            <li class="nav-link" onclick="navigateTo('index.php')">
                <i class="fas fa-home"></i> Home
            </li>
            <li class="nav-link active" onclick="navigateTo('#')">
                <i class="fas fa-search"></i> Search
            </li>
            <li class="nav-link" onclick="navigateTo('notification.php')">
                <i class="fas fa-bell"></i> Notifications
            </li>
            <li class="nav-link" onclick="navigateTo('settings.php')">
                <i class="fas fa-gear"></i> Settings
            </li>
            <li class="nav-link" onclick="navigateTo('profile.php')">
                <i class="fas fa-user"></i> Profile
            </li>
        </ul>
        <form method="post" action="../function/func_logout.php"> 
            <button class="tweet-button" type="submit" name="logout_button">Logout</button>
        </form>
        <div class="profile-container mb-3">
        <?php
            include '../config/koneksi.php';

            // Periksa koneksi
            if ($con->connect_error) {
                die("Koneksi gagal: " . $con->connect_error);
            }

            // Mengambil username dari sesi yang sedang login
            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];

                // Ambil nama file dari database berdasarkan username yang sedang login
                $sql = "SELECT image FROM users WHERE username = '$username'";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    // Jika data tersedia
                    $row = $result->fetch_assoc();
                    $nama_file = $row["image"];
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
            } else {
                echo "Sesi username tidak ditemukan.";
            }

            // Menutup koneksi
            $con->close();
            ?>
            <div>
                <div class="profile-username"><?php echo $username; ?><?php
                include '../config/koneksi.php';

                // Periksa koneksi
                if ($con->connect_error) {
                    die("Koneksi gagal: " . $con->connect_error);
                }

                // Sesuaikan query untuk mendapatkan status dan tipe_akun berdasarkan username dari sesi
                $username = $_SESSION['username']; // Sesuaikan dengan nama variabel sesi yang Anda gunakan

                // Query untuk mendapatkan status dan tipe_akun dari tabel konten berdasarkan username
                $sql = "SELECT status, tipe_akun FROM profile WHERE username = '$username'";
                $result = $con->query($sql);

                if ($result) {
                    // Output data dari setiap baris
                    while ($row = $result->fetch_assoc()) {
                        // Memeriksa status dan menampilkan keterangan yang diminta
                        if ($row["status"] === "Verified") {
                            echo '<span class="verified-badge">✓</span>';
                        } elseif ($row["status"] === "Non Verified") {
                            // Tidak melakukan apa-apa jika status adalah "Non Verified"
                        } else {
                            var_dump($row["status"]); // Tambahkan ini untuk memeriksa nilai status
                        }

                        // Memeriksa tipe_akun dan menampilkan ikon sesuai
                        if ($row["tipe_akun"] === "Private") {
                            echo ' <i class="fa-solid fa-lock"></i>';
                        }
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $con->error; // Tambahkan ini untuk menampilkan pesan error
                }

                $con->close();
                ?>
                </div>
                <div class="profile-handle">@<?php echo $username; ?></div>
            </div>
        </div>
    </nav>

    <div class="side-right">
        <div class="row mb-2">
            <div class="col-12">
                <div class="card m-1 rounded-4 text-start text-dark p-2" style="background-color: #fe9840;">
                    <div class="card-body">
                      <h5 class="card-title fw-bold mb-3">Phrase Premium</h5>
                      <p class="card-text fw-normal">Subscribe to access new features and, if eligible, receive a revenue share of ad revenue.</p>
                      <a href="#" class="btn rounded-5 fw-bold ps-3 pe-3" style="background-color: #ff5838;" data-toggle="modal" data-target="#customModal">Subscribe</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="container">
            <div class="row justify-content-center mb-2">
                <div class="col-12">
                    <img src="../img/logo.png" alt="Twitter Logo" style="max-width: 40px; position: sticky; top: 0;">
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-12 mt-3 mb-3">
                    <form method="GET" action="search.php">
                        <div class="input-group custom-search-box">
                        <input type="text" name="search" class="form-control search-input text-dark" id="search-input" placeholder="Search.." aria-label="Search" aria-describedby="search-button">
                        <button class="btn search-button" type="submit" id="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
<!-- fitur trending-->
            <div class="row">
                <div class="col-12">
                <div class="card rounded-4 text-start text-dark p-2" style="background-color: #fe9840;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-start">
                                <h4>Trending </h4>

                                <?php
                                // Membuat koneksi ke database 
                                include '../config/koneksi.php';

                                if ($con->connect_error) {
                                    die("Koneksi database gagal: " . $con->connect_error);
                                }

                                // Query SQL untuk mendapatkan kata-kata trending
                                $sql = "
                                SELECT i.id_konten, COUNT(*) as interaction_count, k.isi
                                FROM interaction i
                                JOIN konten k ON i.id_konten = k.id_konten
                                WHERE i.timestamp > NOW() - INTERVAL 1 DAY
                                GROUP BY i.id_konten
                                ORDER BY interaction_count DESC
                                LIMIT 10;
                                ";

                                $result = $con->query($sql);

                                // Memeriksa apakah query berhasil dijalankan
                                if ($result) {
                                    echo "<ul>";
                                    while ($row = $result->fetch_assoc()) {
                                        // Menampilkan kata-kata trending sebagai daftar
                                        echo "<li>" . $row["isi"] . "</li>";
                                    }
                                    echo "</ul>";
                                } else {
                                    // Menampilkan pesan kesalahan jika query gagal
                                    echo "Error: " . $sql . "<br>" . $con->error;
                                }

                                // Menutup koneksi
                                $con->close();
                                ?>
                            </div>
        </div>
    </div>
</div>

                </div>
            </div>

            <?php
include '../config/koneksi.php';

// Fungsi untuk membersihkan input
function cleanInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Periksa apakah ada permintaan pencarian
if (isset($_GET['search'])) {
    // Bersihkan nilai pencarian
    $searchTerm = cleanInput($_GET['search']);

    // Query SQL untuk mencari data berdasarkan username pada tabel profile
    $sql = "SELECT profile.username, profile.status, users.image FROM profile
            INNER JOIN users ON profile.username = users.username
            WHERE profile.username LIKE ?";

    // Persiapkan statement SQL
    $stmt = $con->prepare($sql);

    // Bind parameter
    $searchTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("s", $searchTerm);

    // Eksekusi statement
    $stmt->execute();

    // Ambil hasil query
    $result = $stmt->get_result();

    // Cek apakah ada hasil
    if ($result->num_rows > 0) {
        // Tampilkan hasil pencarian
        while ($row = $result->fetch_assoc()) {
            echo '<div class="row mt-2">';
            echo '    <div class="col-12">';
            echo '        <div class="card rounded-4 text-start text-dark p-2" style="background-color: #fe9840;">';
            echo '            <div class="card-body">';
            echo '                <div class="row">';
            echo '                    <div class="col-2 text-end">';
            // Tambahkan tautan ke profil user berdasarkan username
            echo '                        <a href="javascript:void(0);" onclick="openProfile(\'' . $row['username'] . '\')" class="card-text fw-bold">';
            echo '                            <img src="../img/' . $row['image'] . '" alt="profile pict" style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid #1c172d">';
            echo '                        </a>';
            echo '                    </div>';
            echo '                    <div class="col-5 text-start mt-2">';
            // Tambahkan tautan ke profil user berdasarkan username
            echo '                        <a href="javascript:void(0);" onclick="openProfile(\'' . $row['username'] . '\')" class="card-text fw-bold">';
            echo '                            ' . $row['username'];
            // Tampilkan badge Verified jika status adalah Verified
            if ($row['status'] === 'Verified') {
                echo '<span class="verified-badge">✓</span>';
            }
            echo '                        </a>';
            echo '                    </div>';
            echo '                </div>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
    } else {
        // Tampilkan pesan jika tidak ada hasil
        echo 'No results found.';
    }

    // Tutup statement
    $stmt->close();
} else {
    // Tampilkan pesan jika tidak ada permintaan pencarian
    echo 'No search term provided.';
}

// Tutup koneksi
$con->close();
?>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="customModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #fe9840; border: none;">
            <!-- Modal Header -->
            <div class="modal-header" style="border-bottom: none;">
                <h4 class="modal-title fw-bold" style="color: #1c172d;">Phrase Premium</h4>
                <button type="button" class="close btn btn-danger" data-dismiss="modal" style="color: #1c172d;">X</button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center mb-5 fw-bold" style="color: #1c172d;">Unleash the power of connection,<br>redefine your social narrative!</h4>
                </div>
                </div>
                <div class="row mb-5 justify-content-center">
                <!-- Card 1 -->
                <div class="col-sm-5">
                    <div class="card" style="background-color: #ffc884; border-radius: 25px;">
                    <div class="card-body p-5">
                        <h5 class="card-title fw-bold mb-3" style="color: #1c172d;">Phrase Basic</h5>
                        <p class="card-text mb-5" style="color: #1c172d;"><i class="fa-solid fa-check"></i> No Blue Tick<br><i class="fa-brands fa-rocketchat"></i> Limit Character Post<br><i class="fa-solid fa-rectangle-ad"></i> Adsense<br><i class="fa-solid fa-rocket"></i> Basic Server Features</p>
                        <button class="btn btn-dark w-100" style="background-color: #1c172d;">Free</button>
                    </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-sm-5">
                    <div class="card" style="background-color: #ffc884; border-radius: 25px;">
                    <div class="card-body p-5">
                        <h5 class="card-title fw-bold mb-3" style="color: #1c172d;">Phrase Premium</h5>
                        <p class="card-text mb-5" style="color: #1c172d;"><i class="fa-solid fa-check"></i> Blue Tick<br><i class="fa-brands fa-rocketchat"></i> Extended Character Post<br><i class="fa-solid fa-rectangle-ad"></i> Ads-Free Experience<br><i class="fa-solid fa-rocket"></i> Advance Server Features</p>
                        <button class="btn btn-dark w-100" style="background-color: #1c172d;">$19/Month</button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row text-end">
                    <div class="col-12">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    
    <div class="bottom-navbar">
        <a href="index.php" class="nav-item"><i class="fas fa-home"></i></a>
        <a href="#" class="nav-item active"><i class="fas fa-search"></i></a>
        <a href="notification.php" class="nav-item"><i class="fas fa-bell"></i></a>
        <a href="settings.php" class="nav-item"><i class="fas fa-gear"></i></a>
        <a href="profile.php" class="nav-item"><i class="fas fa-user"></i></a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profile Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeProfileModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <!-- Konten modal -->
                        <img id="profile-picture" class="profile-picture mb-3" alt="Profile Picture" style="width: 170px; height: 170px; border-radius: 50%; border: 2px solid #1c172d;">
                    <div class="profile-handle fw-bold" style="font-size: 17px;" id="profile-handle"></div>

                    <!-- Tab link -->
                    <div class="row justify-content-center mt-3">
                        <div class="col-6">
                            <button class="btn tablink" onclick="openTab('post')" id="postTab"><i class="fa fa-th"></i></button>
                        </div>
                        <div class="col-6">
                            <button class="btn tablink" onclick="openTab('repost')" id="repostTab"><i class="fa fa-retweet"></i></button>
                        </div>
                    </div>
                    <hr color="#1c172d">
                    <!-- ISI KONTEN POST -->
                    <div id="post" class="tabcontent">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="slider" style="margin-bottom: 10px;">
                                    <div class="slider-icon" style="font-size: 24px; color: #1c172d;">
                                    <?php
include '../config/koneksi.php';

// Mengambil kata kunci pencarian dari parameter GET
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Query SQL untuk menampilkan post berdasarkan username
    $sql = "SELECT konten.id_konten, konten.username, konten.isi, users.image, profile.status 
            FROM konten 
            INNER JOIN users ON konten.username = users.username
            INNER JOIN profile ON konten.username = profile.username
            WHERE konten.status = 'Non Repost' AND konten.username = '$username'
            ORDER BY konten.id_konten DESC";

    $result = mysqli_query($con, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Menampilkan hasil pencarian menggunakan PHP
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="profile-contain">';
                echo '<img class="profile-picture" src="../img/' . $row["image"] . '" alt="Profile Picture">';
                echo '<div class="profile-username" style="font-size: 18px; display: inline-block;">'; // Sesuaikan ukuran font di sini
                echo $row["username"];
                if ($row["status"] === "Verified") {
                    echo '<span class="verified-badge">✓</span>';
                }
                echo '</div>';
                echo '</div>';
                echo '<div class="text-justify" style="font-size: 16px;">'; // Sesuaikan ukuran font di sini
                echo '<p style="text-align: justify; margin: 13px;">' . $row["isi"] . '</p>';
                echo '</div>';
                echo '<hr>';
            }
        } else {
            echo "<p style='font-size: large'>No Post for the given username.</p>";
        }
    } else {
        // Tampilkan pesan kesalahan SQL
        echo "Error: " . mysqli_error($con);
    }

    // Tutup koneksi
    mysqli_close($con);
} else {
    // Tampilkan pesan jika parameter 'username' tidak tersedia dalam URL
    echo "Tidak dapat menampilkan post. Parameter 'username' tidak tersedia dalam URL.";
}
?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--ISI KONTEN REPOST-->
                    <div id="repost" class="tabcontent inline">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="slider" style="display: grid; align-items: center; margin-bottom: 10px;">
                                    <div class="slider-icon" style="font-size: 24px; color: #1c172d;">
                                    <?php
                                        include '../config/koneksi.php';

                                        // Mengambil kata kunci pencarian dari parameter GET
                                        if (isset($_GET['search'])) {
                                            $search = $_GET['search'];

                                            // Query SQL untuk pencarian berdasarkan username atau konten
                                            $sql = "SELECT konten.id_konten, konten.username, konten.isi, users.image, profile.status 
                                                    FROM konten 
                                                    INNER JOIN users ON konten.username = users.username
                                                    INNER JOIN profile ON konten.username = profile.username
                                                    WHERE konten.status = 'Repost' AND (konten.username LIKE '%$search%' OR konten.isi LIKE '%$search%')
                                                    ORDER BY konten.id_konten DESC";

                                            $result = mysqli_query($con, $sql);

                                            if ($result) {
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Menampilkan hasil pencarian menggunakan PHP
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<div class="profile-contain">';
                                                        echo '<img class="profile-picture" src="../img/' . $row["image"] . '" alt="Profile Picture">';
                                                        echo '<div class="profile-username" style="font-size: 18px; display: inline-block;">'; // Sesuaikan ukuran font di sini
                                                        echo $row["username"];
                                                        if ($row["status"] === "Verified") {
                                                            echo '<span class="verified-badge">✓</span>';
                                                        }
                                                        echo '</div>';
                                                        echo '</div>';
                                                        echo '<div class="text-justify" style="font-size: 16px;">'; // Sesuaikan ukuran font di sini
                                                        echo '<p style="text-align: justify; margin: 13px;">' . $row["isi"] . '</p>';
                                                        echo '</div>';
                                                        echo '<hr>';
                                                    }
                                                } else {
                                                    echo "<p style='font-size: large'>No reposts.</p>";
                                                }
                                            } else {
                                                // Tampilkan pesan kesalahan SQL
                                                echo "Error: " . mysqli_error($con);
                                            }

                                            // Tutup koneksi
                                            mysqli_close($con);
                                        } else {
                                            // Tampilkan pesan jika parameter 'search' tidak tersedia dalam URL
                                            echo "Pencarian tidak dapat dilakukan. Parameter search tidak tersedia.";
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <!-- Tautan Bootstrap JavaScript dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('scroll', function() {
            const profileMain = document.querySelector('.profile-main');
    
            if (window.scrollY > 0) {
                profileMain.classList.add('is-sticky');
            } else {
                profileMain.classList.remove('is-sticky');
            }
        });
    </script>
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
    <script>
        // Fungsi untuk mengganti konten tab yang aktif
        function openTab(tabName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          tablinks = document.getElementsByClassName("tablink");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
          }
          document.getElementById(tabName).style.display = "inline";
          document.getElementById(tabName + 'Tab').classList.add("active");
        }
        // Set tab "post" sebagai tab default yang aktif
        openTab('post');
    </script>
    <script>
        function openProfile(username) {
            // Kirim permintaan AJAX untuk mendapatkan informasi tipe akun
            $.ajax({
                type: "POST",
                url: "../function/func_get_account_type.php", // Ganti dengan skrip yang sesuai
                data: { username: username },
                success: function (response) {
                    // Handle response dari server
                    if (response === 'Private') {
                        // Jika tipe akun adalah Private, tampilkan alert
                        alert('This Account is Private');
                    } else {
                        // Jika tipe akun adalah Public, tampilkan modal seperti sebelumnya
                        openProfileModal(username);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Fungsi untuk membuka modal dan menetapkan nilai
        function openProfileModal(username, status) {
    $(document).ready(function() {
        // Ambil username dari URL
       

        // Lakukan AJAX untuk mendapatkan nama file gambar dari tabel pengguna
        $.ajax({
            url: '../function/func_getuserData.php', // Ganti dengan path yang benar ke server backend Anda
            method: 'POST',
            data: { username: username },
            success: function(response) {
                // Response harus berupa nama file gambar dari tabel pengguna
                var imageFileName = response;

                // Cek direktori ../img/
                var imagePath = '../img/' + imageFileName;

                // Menetapkan nilai ke dalam elemen modal
                document.getElementById('profile-picture').src = '../img/' + imageFileName;
                document.getElementById('profile-handle').innerHTML = '@' + username;;

                // Tambahkan badge Verified jika status adalah Verified
                if (status === 'Verified') {
                    document.getElementById('profile-handle').innerHTML += '<span class="verified-badge">✓</span>';
                }

                // Membuka modal
                $('#profileModal').modal('show');
            },
            error: function(error) {
                console.error('Error:', error);
                // Handle error sesuai kebutuhan Anda
            }
        });
    });
}

    // Fungsi untuk menutup modal
    function closeProfileModal() {
        $('#profileModal').modal('hide');
    }

    // Fungsi untuk mendapatkan parameter dari URL
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    // Tanggapan terhadap klik tombol
    $('#openProfileButton').on('click', function() {
        // Ambil nama pengguna dari parameter URL 'search'
        var username = getUrlParameter('search');

        // Panggil fungsi untuk membuka modal dengan nilai yang diambil dari URL
        openProfileModal(username, 'Verified'); // Gantilah 'Verified' dengan status yang sesuai
    });
    </script>
</body>
</html>
