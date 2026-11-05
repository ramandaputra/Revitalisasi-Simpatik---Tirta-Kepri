<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jdu = $_POST['jdu'];
    $periode = $_POST['periode'];
    $dat0 = $_POST['data0'];
    $dat1 = $_POST['data1'];
    $dat2 = $_POST['data2'];
    $dat3 = $_POST['data3'];
    $has1 = $_POST['hasil1'];
    $has2 = $_POST['hasil2'];

    // Append '-01' to the periode to make it a valid date format for MySQL
    $periode .= '-01';

    // Tentukan nilai waduk berdasarkan nilai jdu
    $waduk = '';
    switch ($jdu) {
        case 'HDPE':
        case 'PCM':
        case 'RPD':
        case 'WK':
            $waduk = 'Sei Pulai';
            break;
        case 'GESEK':
            $waduk = 'Sei Gesek';
            break;
        case 'KJG':
            $waduk = 'Kolong Enam';
            break;
        case 'TUB':
            $waduk = 'Sei Jago';
            break;
        default:
            $waduk = 'Unknown'; // Atau null jika tidak ada nilai default yang diinginkan
            break;
    }

    // Tentukan nilai wilayah berdasarkan nilai jdu
    $wilayah = '';
    switch ($jdu) {
        case 'HDPE':
        case 'PCM':
        case 'RPD':
        case 'WK':
        case 'GESEK':
            $wilayah = 'TNJ';
            break;
        case 'KJG':
            $wilayah = 'KJG';
            break;
        case 'TUB':
            $wilayah = 'TUB';
            break;
        default:
            $wilayah = 'Unknown'; // Atau null jika tidak ada nilai default yang diinginkan
            break;
    }

    // Mulai transaksi
    $connk->begin_transaction();

    try {
        // Periksa apakah data sudah ada di tabel distribusi
        $check_sql = "SELECT COUNT(*) AS count FROM distribusi WHERE jdu = '$jdu' AND waktu = '$periode'";
        $result = $connk->query($check_sql);
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            // Jika data sudah ada, batalkan transaksi
            throw new Exception("Data sudah pernah diinput, silahkan input data JDU lainnya.");
        } else {
            // Insert data ke tabel distribusi
            $sql1 = "INSERT INTO distribusi (jdu, waktu, target, distribusi, waduk)
                     VALUES ('$jdu', '$periode', '$dat0', '$dat3', '$waduk')";

            // Insert data ke tabel nrw
            $sql2 = "INSERT INTO nrw (jdu, waktu, pelanggan, penjualan, kehilangan, persentase, waduk, wilayah)
                     VALUES ('$jdu', '$periode', '$dat1', '$dat2', '$has1', '$has2', '$waduk', '$wilayah')";

            // Jalankan query
            if ($connk->query($sql1) === TRUE && $connk->query($sql2) === TRUE) {
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
