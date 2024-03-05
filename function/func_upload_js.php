<?php
// func_upload_js.php

// Mulai sesi PHP
session_start();

// Fungsi untuk menangani upload file dan update timestamp
function uploadFile() {
    ?>
    <script>
        // Mendapatkan elemen file input
        const input = document.getElementById('fileInput');
        const file = input.files[0];
        
        if (file) {
            // Mendapatkan sesi timestamp dari PHP
            var sessionTimestamp = <?php echo $_SESSION['timestamp']; ?>;

            // Membuat nama file baru dengan menambahkan username
            var username = '<?php echo $_SESSION['username']; ?>';
            var newFileName = username + '.jpg';

            // Mendapatkan timestamp
            var timestamp = new Date().getTime();

            // Membandingkan timestamp dari sesi dengan timestamp baru
            if (sessionTimestamp && sessionTimestamp < timestamp) {
                // Jika timestamp baru, tambahkan parameter acak ke URL gambar
                var randomParam = '?' + timestamp;

                // Mendapatkan elemen gambar
                var imagePreview = document.getElementById('imagePreview');

                // Menambahkan parameter acak ke URL gambar
                var currentSrc = imagePreview.src;

                // Memastikan URL gambar sudah memiliki parameter
                if (currentSrc.indexOf('?') !== -1) {
                    imagePreview.src = currentSrc + randomParam;
                } else {
                    imagePreview.src = currentSrc + randomParam;
                }

                // Update timestamp di sesi
                updateSessionTimestamp(timestamp);
            }

            // Mengirim file ke server (misalnya menggunakan FormData dan XMLHttpRequest)
            var formData = new FormData();
            formData.append('file', file, newFileName);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../function/func_upload.php'); // Gantilah dengan path yang sesuai
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log('Upload berhasil!');
                    // Lakukan operasi lain setelah upload berhasil

                    // Mengganti timestamp di sesi
                    updateSessionTimestamp(timestamp);
                } else {
                    console.error('Upload gagal. Status: ' + xhr.status);
                }
            };
            xhr.send(formData);

            closeModal();
        } else {
            console.log('Tidak ada file yang dipilih');
        }
    </script>
    <?php
}

// Fungsi untuk memperbarui timestamp di sesi PHP
function updateSessionTimestamp($newTimestamp) {
    $_SESSION["timestamp"] = $newTimestamp;
}

// Panggil fungsi uploadFile
uploadFile();
?>
