<?php
session_start();
include '../config/koneksi.php';

if ($con->connect_error) {
    die("Koneksi database gagal: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi dan membersihkan input
    $isi = filter_input(INPUT_POST, 'isi', FILTER_SANITIZE_STRING);

    // Periksa apakah input kosong atau mengandung konten yang tidak pantas
    if (empty($isi) || containsInappropriateContent($isi)) {
        echo "<script>alert('Input Dilarang!'); window.location='../home/index.php'</script>";
        exit();
    }

    $jumlah_like = 0;
    $jumlah_repost = 0;
    $share = 0;
    $status = "Non Repost";

    $media_id = null; // Inisialisasi media_id

    // Periksa apakah file diunggah
    if(isset($_FILES['media'])){
        $errors = array();
        $file_name = $_FILES['media']['name'];
        $file_size = $_FILES['media']['size'];
        $file_tmp = $_FILES['media']['tmp_name'];
        $file_type = $_FILES['media']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $extensions = array("jpeg", "jpg", "png");

        if(!in_array($file_ext, $extensions)){
            $errors[] = "Ekstensi tidak diizinkan, pilih file JPEG atau PNG.";
        }

        if($file_size > 2097152) { // Ukuran maksimum dalam byte (2 MB)
            $errors[] = 'Ukuran file harus kurang dari 2 MB';
        }

        if(empty($errors)){
            $unique_name = uniqid() . '.' . $file_ext;

            if(move_uploaded_file($file_tmp, "../img_post/".$unique_name)){
                $stmt = $con->prepare("INSERT INTO konten (media, username, isi, jumlah_like, jumlah_repost, share, status, posted_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
                $stmt->bind_param("sssiiss", $unique_name, $_SESSION['username'], $isi, $jumlah_like, $jumlah_repost, $share, $status);
                $stmt->execute();

                echo "<script>alert('Konten Ditambahkan!'); window.location='../home/index.php'</script>";
            } else {
                echo "Gagal memindahkan file yang diunggah.";
            }
        } else {
            foreach($errors as $error){
                echo $error . "<br>";
            }
        }
    }

    $con->close();
}

// Fungsi untuk memeriksa konten yang tidak pantas
function containsInappropriateContent($input) {
    // Tambahkan daftar kata atau pola yang tidak pantas di sini
    $inappropriateWords = array("kontol", "pepek", "p3p3k", "k0nt0l", "memek", "m3m3k", "dick", "d1ck", "ngentot", "ngentod", "kentod", "ngentid", "ngent0d", "kent0d", "kentot", "kent0t", "anjeng", "4nj3ng", "4njeng", "ah lu", "ahlu");

    foreach ($inappropriateWords as $word) {
        if (stripos($input, $word) !== false) {
            return true;
        }
    }

    return false;
}
?>