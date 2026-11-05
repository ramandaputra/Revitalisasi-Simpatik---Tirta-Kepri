<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dma = $_POST['dma'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['periode'];
    $kegiatan = $_POST['kegiatan'];

    // Direktori untuk menyimpan foto yang diupload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Mengecek apakah file yang diupload adalah gambar
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Mengecek apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Sorry, foto sudah di pernah di upload.";
        $uploadOk = 0;
    }

    // Mengecek ukuran file
    if ($_FILES["foto"]["size"] > 5000000) { // 5MB max
        echo "Sorry, file terlalu besar max 5MB";
        $uploadOk = 0;
    }

    // Hanya memperbolehkan tipe file tertentu
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, hanya JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
    }

    // Mengecek apakah $uploadOk bernilai 0 karena ada error
    if ($uploadOk == 0) {
        echo "Sorry, foto gagal upload.";
        // Jika semua kondisi terpenuhi, coba upload file
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "Foto " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " berhasil di upload. ";

            $sql = "INSERT INTO spka_kegiatan (dma, kategori, tanggal_lapor, kegiatan, foto_kegiatan) VALUES ('$dma', '$kategori', '$tanggal', '$kegiatan', '$target_file')";

            if ($connk->query($sql) === TRUE) {
                echo "Kegiatan berhasil disimpan!";
            } else {
                echo "Error: " . $sql . "<br>" . $connk->error;
            }

            $connk->close();
        } else {
            echo "Kegiatan tidak bisa di simpan, max ukuran foto 5MB";
        }
    }
}
