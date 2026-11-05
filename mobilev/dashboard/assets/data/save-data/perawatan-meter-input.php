<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wilayah = $_POST['wilayah'];
    $periode = $_POST['periode'];
    $dat1 = $_POST['data1'];
    $dat2 = $_POST['data2'];

    $periode .= '-01';

    // Mulai transaksi
    $connk->begin_transaction();

    try {
        // Periksa apakah data sudah ada di tabel distribusi
        $check_sql = "SELECT COUNT(*) AS count FROM ganti_meter WHERE wilayah = '$wilayah' AND waktu = '$periode'";
        $result = $connk->query($check_sql);
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            // Jika data sudah ada, batalkan transaksi
            throw new Exception("Data sudah pernah diinput, silahkan input data Wilayah lainnya.");
        } else {
            // Insert data ke tabel distribusi
            $sql = "INSERT INTO ganti_meter (wilayah, waktu, target, ganti_meter)
                     VALUES ('$wilayah', '$periode', '$dat1', '$dat2')";
            // Jalankan query
            if ($connk->query($sql)) {
                // Commit transaksi
                $connk->commit();
                echo "Posting Data Berhasil";
            } else {
                // Jika ada kesalahan, batalkan transaksi
                throw new Exception("Error: " . $connk->error);
            }
        }
    } catch (Exception $e) {
        // Jika ada pengecualian, batalkan transaksi dan tampilkan pesan error
        $connk->rollback();
        echo $e->getMessage();
    }
}

// Tutup koneksi
$connk->close();
