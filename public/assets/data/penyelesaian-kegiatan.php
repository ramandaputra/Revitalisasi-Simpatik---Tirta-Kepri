<?php
include 'koneksi.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tiket = $_POST['tiket'];
        $tglselesai = $_POST['tgl_selesai'];
        $petugas = $_POST['petugas'];
        $keterangan_penyelesaian = $_POST['keterangan_penyelesaian'];
        $status = 1;

        // Handle file upload
        $foto_penyelesaian = '';
        if (isset($_FILES['foto_penyelesaian']) && $_FILES['foto_penyelesaian']['error'] == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["foto_penyelesaian"]["name"]);
            if (move_uploaded_file($_FILES["foto_penyelesaian"]["tmp_name"], $target_file)) {
                $foto_penyelesaian = basename($_FILES["foto_penyelesaian"]["name"]);
            } else {
                throw new Exception("Error uploading file.");
            }
        }

        $query = "UPDATE spka_kegiatan SET tanggal_selesai = ?, petugas = ?, penyelesaian = ?, status = ?, foto_penyelesaian = ? WHERE tiket = ?";
        if ($stmt = $connk->prepare($query)) {
            // Bind the parameters correctly
            $stmt->bind_param("sssiss", $tglselesai, $petugas, $keterangan_penyelesaian, $status, $foto_penyelesaian, $tiket);
            if ($stmt->execute()) {
                echo "Penyelesaian kegiatan berhasil disimpan.";
            } else {
                throw new Exception("Error executing query.");
            }
            $stmt->close();
        } else {
            throw new Exception("Error preparing query.");
        }
    } else {
        throw new Exception("Invalid request.");
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    $connk->close();
}
