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
            margin-bottom: 30px;
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

        /* Style the tab content (hidden by default) */
        .tabcontent {
            display: none;
        }

        /* Style the tab content to be inline */
        .tabcontent.inline {
            display: inline;
        }

        .follow-container {
            display: flex;
            align-items: center;
            margin: 5px auto 10px 0;
            padding: 8px;
            position: relative;
        }

        .profile-follow {
            width: 45px;
            height: 45px;
            border: 2px solid #1c172d;
            border-radius: 50%;
        }

        .modal-bro {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 10px;
        }
    
        .modal-content-bro {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 340px;
            text-align: center;
            border-radius: 10px;
        }
    
        .close {
            float: right;
            cursor: pointer;
            font-size: 30px;
        }
    
        .cancel {
            cursor: pointer;
            font-size: 16px;
            color: #555;
            margin-top: 10px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 10px;
        }
    
        .close:hover,
        .cancel:hover {
            color: rgb(0, 0, 0);
        }
    
        .drop-container {
            border: 2px dashed #e1e1e1;
            width: 300px;
            height: 150px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin-bottom: 20px;
            margin-top: 10px;
            transition: border 0.3s;
            border-radius: 10px;
        }
    
        .drop-container:hover {
            border: 2px dashed #000;
        }
    
        .drop-container h2 {
            margin: 0;
            color: #555;
            font-size: 16px;
        }
    
        .file-input {
            display: none;
        }
    
        .upload-button {
            /* Reuse the existing button style from your main code */
            /* Example styles, replace with your actual button styles */
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 10px;
        }
    
        .upload-button:hover {
            background-color: #0056b3;
        }
    
        .upload-button:active {
            background-color: #004080;
        }
    
        .upload-button:focus {
            outline: none;
        }
    
        .upload-button:disabled {
            background-color: #aaaaaa;
            cursor: not-allowed;
        }
    
        .upload-button:disabled:hover {
            background-color: #aaaaaa;
        }
    
        #imagePreview {
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
            border-radius: 50%;
        }
    
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
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
            <li class="nav-link" onclick="navigateTo('search.php')">
                <i class="fas fa-search"></i> Search
            </li>
            <li class="nav-link" onclick="navigateTo('notification.php')">
                <i class="fas fa-bell"></i> Notifications
            </li>
            <li class="nav-link" onclick="navigateTo('settings.php')">
                <i class="fas fa-gear"></i> Settings
            </li>
            <li class="nav-link active" onclick="navigateTo('#')">
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
        <div class="container text-center">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <img src="../img/logo.png" alt="Phrase Logo" style="max-width: 40px; position: sticky; top: 0;">
                </div>
            </div>
            <div class="row justify-content-center mb-2">
                <div class="col-12">
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
                            echo '<img class="profile-picture" src="../img/' . $nama_file . '" alt="Profile Picture" style="width: 170px; height: 170px; border-radius: 50%; border: 2px solid #1c172d;">';
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
                </div>
            </div>
            <div class="row justify-content-center mb-4">
                <div class="col-12">
                    <div class="profile-handle fw-bold" style="font-size: 17px;">@<?php echo $username; ?><?php
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
                </div>
            </div>

            <!--Modal Bro Profile-->
                <div id="myModal" class="modal-bro">
                    <div class="modal-content-bro">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <div id="imagePreviewContainer">
                        <img id="imagePreview" src="#" alt="Image Preview">
                        </div>
                        <div class="drop-container" id="dropContainer" ondrop="dropHandler(event);" ondragover="dragOverHandler(event)" onclick="clickHandler()">
                        <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" fill="#555" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M21 9h-6V3h-3v6H3v3h6v6h3v-6h6V9zm-9 9v-6H6v6h6zm6-6h-6v6h6v-6z"/>
                        </svg>
                        <h2>Click to Upload</h2>
                        <input type="file" class="file-input" id="fileInput" onchange="handleFiles(event.target.files)">
                        </div>
                        <div class="button-container">
                        <button class="upload-button" onclick="uploadFile()" id="uploadButton" disabled>Edit Profile</button>
                        <div class="cancel" onclick="cancelUpload()">Cancel</div>
                        </div>
                    </div>
                </div>
            <!-- END -->

            <div class="row justify-content-center mb-3">
                <div class="col-12">
                    <div class="profile-handle""><a href="#" onclick="openModal()" class="btn btn-sm rounded-5 fw-normal upload-button" style="background-color: #ff5838;">Edit Profile</a></div>
                </div>
            </div>
            <div class="row justify-content-center nav-content mb-3" style="border-bottom: 1px solid #1c172d; position: sticky; top: 0;  background: rgba(255, 200, 132, 0.9); transition: background-color 0.3s ease; background: transparent; backdrop-filter: blur(7px);">
                <div class="col-6">
                    <button class="btn tablink" onclick="openTab('post')" id="postTab"><i class="fa fa-th"></i></button>
                </div>
                <div class="col-6">
                    <button class="btn tablink" onclick="openTab('repost')" id="repostTab"><i class="fa fa-retweet"></i></button>
                </div>
            </div>
              <!--ISI KONTEN POST-->
                <div id="post" class="tabcontent">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="slider" style="margin-bottom: 10px;">
                                <div class="slider-icon" style="font-size: 24px; color: #1c172d;">
                                <?php
                                    include '../config/koneksi.php';

                                    // Periksa koneksi
                                    if ($con->connect_error) {
                                        die("Koneksi gagal: " . $con->connect_error);
                                    }

                                    // Mengambil username dari sesi yang sedang login
                                    if (isset($_SESSION['username'])) {
                                        $username = $_SESSION['username'];

                                        // Query SQL untuk mengambil konten dengan status "Non Repost" dan username tertentu
                                        $sql = "SELECT konten.id_konten, konten.username, konten.isi, users.image, profile.status FROM konten 
                                                INNER JOIN users ON konten.username = users.username
                                                INNER JOIN profile ON konten.username = profile.username
                                                WHERE konten.status = 'Non Repost' AND konten.username = '$username'
                                                ORDER BY konten.id_konten DESC";
                                        $result = $con->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Menampilkan konten menggunakan perulangan while
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<div class="profile-contain">';
                                                echo '<img class="profile-picture" src="../img/' . $row["image"] . '" alt="Profile Picture">';
                                                echo '<div class="profile-username" style="font-size: 18px; display: inline-block;">'; // Ubah ukuran font di sini
                                                echo $row["username"];
                                                if ($row["status"] === "Verified") {
                                                    echo '<span class="verified-badge">✓</span>';
                                                }
                                                echo '</div>';
                                                echo '<div style="display: inline-block; margin-left: auto;">';
                                                echo '<a href="javascript:void(0);" onclick="confirmDelete(' . $row['id_konten'] . ')" class="btn btn-sm btn-danger delete-btn" style="background-color: #ff5838; color: #000;">';
                                                echo '<i class="fas fa-trash"></i>';
                                                echo '</a>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '<div class="text-justify" style="font-size: 16px;">'; // Ubah ukuran font di sini
                                                echo '<p style="text-align: justify; margin: 13px;">' . $row["isi"] . '</p>';
                                                echo '</div>';
                                                echo '<hr>';
                                            }
                                        } else {
                                            echo "<p style='font-size: large'>No Post.</p>";
                                        }
                                    } else {
                                        echo "<p>Sesi username tidak ditemukan.</p>";
                                    }

                                    $con->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                    function confirmDelete(id) {
                        var confirmation = confirm("Are you sure you want to delete this post?");
                        if (confirmation) {
                            window.location.href = '../function/func_hapus_post.php?id=' + id;
                        }
                    }
                    </script>
                </div>
              <!--ISI KONTEN REPOST-->
                <div id="repost" class="tabcontent inline">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="slider" style="display: grid; align-items: center; margin-bottom: 10px;">
                            <div class="slider-icon" style="font-size: 24px; color: #1c172d;">
                            <?php
                                include '../config/koneksi.php';

                                // Periksa koneksi
                                if ($con->connect_error) {
                                    die("Koneksi gagal: " . $con->connect_error);
                                }

                                // Mengambil username dari sesi yang sedang login
                                if (isset($_SESSION['username'])) {
                                    $username = $_SESSION['username'];

                                    // Query SQL untuk mengambil konten dengan status "Repost" dan username tertentu
                                    $sql = "SELECT konten.id_konten, konten.username, konten.isi, users.image, profile.status FROM konten 
                                            INNER JOIN users ON konten.username = users.username
                                            INNER JOIN profile ON konten.username = profile.username
                                            WHERE konten.status = 'Repost' AND konten.username = '$username'
                                            ORDER BY konten.id_konten DESC";
                                    $result = $con->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Menampilkan konten menggunakan perulangan while
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<div class="profile-contain">';
                                            echo '<img class="profile-picture" src="../img/' . $row["image"] . '" alt="Profile Picture">';
                                            echo '<div class="profile-username" style="font-size: 18px; display: inline-block;">'; // Ubah ukuran font di sini
                                            echo $row["username"];
                                            if ($row["status"] === "Verified") {
                                                echo '<span class="verified-badge">✓</span>';
                                            }
                                            echo '</div>';
                                            echo '</div>';
                                            echo '<div class="text-justify" style="font-size: 16px;">'; // Ubah ukuran font di sini
                                            echo '<p style="text-align: justify; margin: 13px;">' . $row["isi"] . '</p>';
                                            echo '</div>';
                                            echo '<hr>';
                                        }
                                    } else {
                                        echo "<p style='font-size: large';>No Repost.</p>";
                                    }
                                } else {
                                    echo "<p>Sesi username tidak ditemukan.</p>";
                                }

                                $con->close();
                                ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
    </div>
    
    <div class="bottom-navbar">
        <a href="index.php" class="nav-item"><i class="fas fa-home"></i></a>
        <a href="search.php" class="nav-item"><i class="fas fa-search"></i></a>
        <a href="notification.php" class="nav-item"><i class="fas fa-bell"></i></a>
        <a href="settings.php" class="nav-item"><i class="fas fa-gear"></i></a>
        <a href="#" class="nav-item active"><i class="fas fa-user"></i></a>
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

    <!-- Tautan Bootstrap JavaScript dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
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
        var modal = document.getElementById('myModal');
        var uploadButton = document.getElementById('uploadButton');

        function openModal() {
            modal.style.display = 'block';
        }

        function closeModal() {
            modal.style.display = 'none';
        }

        function cancelUpload() {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.src = '';
            document.getElementById('imagePreviewContainer').style.display = 'none';
            closeModal();
            window.location.reload();
        }

        function dragOverHandler(event) {
            event.preventDefault();
            const dropContainer = document.getElementById('dropContainer');
            dropContainer.style.border = '2px dashed #000';
        }

        function dropHandler(event) {
            event.preventDefault();
            const dropContainer = document.getElementById('dropContainer');
            dropContainer.style.border = '2px dashed #e1e1e1';
            const files = event.dataTransfer.files;
            handleFiles(files);
        }

        function clickHandler() {
            const fileInput = document.getElementById('fileInput');
            fileInput.click();
        }

        function handleFiles(files) {
            var file = files[0];
            if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = e.target.result;
                document.getElementById('imagePreviewContainer').style.display = 'block';
            }
            reader.readAsDataURL(file);
            uploadButton.disabled = false;
            }
        }

        function uploadFile() {
            const input = document.getElementById('fileInput');
            const file = input.files[0];
            if (file) {
            // Mendapatkan sesi username dari PHP (sesuaikan dengan cara Anda menyimpan sesi)
            var username = '<?php echo $_SESSION['username']; ?>';

            // Membuat nama file baru dengan menambahkan username
            var newFileName = username + '.jpg';

            // Mengirim file ke server (misalnya menggunakan FormData dan XMLHttpRequest)
            var formData = new FormData();
            formData.append('file', file, newFileName);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../function/func_upload.php'); // Gantilah dengan path yang sesuai
            xhr.onload = function() {
                if (xhr.status === 200) {
                console.log('Upload berhasil!');
                // Lakukan operasi lain setelah upload berhasil
                } else {
                console.error('Upload gagal. Status: ' + xhr.status);
                }
            };
            xhr.send(formData);

            closeModal();
            } else {
            console.log('No file chosen');
            }
        }
    </script>
</body>
</html>
