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

        .heart-icon {
            transform-origin: center;
            color: #ff5838;
        }

        .heart-icon.clicked {
            animation: heartScaleClicked 0.3s ease-in-out;
            color: #000000;
        }

            @keyframes heartScale {
            0% {
                transform: scale(0.5);
            }
            50% {
                transform: scale(0.7);
            }
            100% {
                transform: scale(1);
            }
            }

            @keyframes heartScaleClicked {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(0.7);
            }
            100% {
                transform: scale(1);
                color: #000000;
            }
        }

        .repost-icon {
            transform-origin: center;
            color: #ff5838; /* Ganti dengan warna sesuai kebutuhan */
        }

        .repost-icon.clicked {
            animation: repostScaleClicked 0.3s ease-in-out;
            color: #000000;
        }

        @keyframes repostScale {
            0% {
                transform: scale(0.5);
            }
            50% {
                transform: scale(0.7);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes repostScaleClicked {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(0.7);
            }
            100% {
                transform: scale(1);
                color: #000000;
            }
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
            <img src="../img/logo.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li class="nav-link active" onclick="navigateTo('#')">
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
                    <img src="../img/logo.png" alt="Phrase Logo" style="max-width: 40px; position: sticky; top: 0;">
                </div>
            </div>
        </div>
        <div class="profile-main">
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
            <form method="post" action="../function/func_post.php"> 
                <div class="profile-input">
                    <input type="text" placeholder="Add Phrase?" name="isi" class="thought-input">
                    <button class="post-button" type="submit" name="post_button">Post</button>
                </div>
            </form>
        </div>
        <!-- START -->
        <?php include '../function/func_menampilkan_post.php'; ?>
        <!-- END -->
        
    </div>
    
    <div class="bottom-navbar">
        <a href="#" class="nav-item active"><i class="fas fa-home"></i></a>
        <a href="search.php" class="nav-item"><i class="fas fa-search"></i></a>
        <a href="notification.php" class="nav-item"><i class="fas fa-bell"></i></a>
        <a href="settings.php" class="nav-item"><i class="fas fa-gear"></i></a>
        <a href="profile.php" class="nav-item"><i class="fas fa-user"></i></a>
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
        function toggleLike(icon) {
            // Dapatkan id_konten dan username dari elemen ikon
            var id_konten = icon.dataset.idKonten;
            var username = getUsername(); // Ganti dengan cara Anda mendapatkan sesi login

            // Kirim permintaan ke skrip PHP menggunakan AJAX
            $.post('../function/func_likes_post.php', { id_konten: id_konten, username: username }, function(response) {
                console.log(response);
                
                // Periksa apakah like berhasil ditambahkan
                if (response.success) {
                    icon.classList.toggle('clicked'); // Toggle kelas clicked
                }
            });
        }
        // Fungsi untuk mendapatkan username dari PHP pada halaman
        function getUsername() {
            var username = "<?php echo $_SESSION['username']; ?>";
            return username;
        }
    </script>
    <script>
        function toggleRepost(icon) {
            // Dapatkan id_konten dan username dari elemen ikon
            var id_konten = icon.dataset.idKonten;
            var username = getUsername(); // Ganti dengan cara Anda mendapatkan sesi login

            // Tampilkan konfirmasi sebelum melakukan repost
            var confirmRepost = confirm("Apakah Anda yakin ingin repost?");
            if (!confirmRepost) {
                return; // Batalkan jika pengguna tidak yakin
            }

            // Kirim permintaan ke skrip PHP menggunakan AJAX
            $.post('../function/func_repost.php', { id_konten: id_konten, username: username }, function(response) {
                console.log(response);

                // Periksa apakah repost berhasil ditambahkan atau dihapus
                if (response.success) {
                    icon.classList.toggle('clicked'); // Toggle kelas clicked
                } else {
                    alert(response.message); // Tampilkan pesan jika repost gagal
                }
            });
        }
        // Fungsi untuk mendapatkan username dari PHP pada halaman
        function getUsername() {
            var username = "<?php echo $_SESSION['username']; ?>";
            return username;
        }
    </script>
    <script>
            document.getElementById('subscribeBtn').addEventListener('click', function () {
                var myModal = new bootstrap.Modal(document.getElementById('subscribeModal'));
                myModal.show();
            });
    </script>
    <script>
        function toggleCommentForm(id) {
            var commentForm = document.getElementById('commentForm' + id);
            if (commentForm.style.display === 'none' || commentForm.style.display === '') {
                commentForm.style.display = 'block';
            } else {
                commentForm.style.display = 'none';
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>
