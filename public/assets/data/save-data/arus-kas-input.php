<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $periode = $_POST['periode'];
    $dat1 = $_POST['data1'];
    $dat2 = $_POST['data2'];
    $dat3 = $_POST['data3'];
    $dat4 = $_POST['data4'];

    // Mulai transaksi
    $connk->begin_transaction();

    try {
        // Periksa apakah data sudah ada di tabel distribusi
        $check_sql = "SELECT COUNT(*) AS count FROM arus_kas WHERE waktu = '$periode'";
        $result = $connk->query($check_sql);
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            // Jika data sudah ada, batalkan transaksi
            throw new Exception("Data sudah pernah diinput, silahkan input data periode lainnya.");
        } else {
            // Insert data ke tabel distribusi
            $sql = "INSERT INTO arus_kas (waktu, target_penerimaan, realisasi_penerimaan, target_pengeluaran, realisasi_pengeluaran)
                     VALUES ('$periode', '$dat1', '$dat2', '$dat3', '$dat4')";

            // Jalankan query
            if ($connk->query($sql) === TRUE) {
                // Commit transaksi
                $connk->commit();
                echo "Berhasil";
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
