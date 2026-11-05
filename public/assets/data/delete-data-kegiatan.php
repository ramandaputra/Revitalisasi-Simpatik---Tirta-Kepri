<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dapatkan tiket dari permintaan POST
    $tiket = isset($_POST['tiket']) ? $_POST['tiket'] : '';

    // Periksa apakah tiket ada
    if (!empty($tiket)) {
        // Query untuk menghapus data berdasarkan tiket
        $query = "DELETE FROM spka_kegiatan WHERE tiket = ?";

        // Siapkan pernyataan SQL
        if ($stmt = $connk->prepare($query)) {
            $stmt->bind_param('s', $tiket); // "s" menunjukkan tipe string
            if ($stmt->execute()) {
                // Berhasil dihapus
                echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
            } else {
                // Gagal menghapus data
                echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data']);
            }
            $stmt->close();
        } else {
            // Gagal menyiapkan pernyataan SQL
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyiapkan query']);
        }
    } else {
        // Tiket tidak diberikan
        echo json_encode(['status' => 'error', 'message' => 'Tiket tidak ditemukan']);
    }
} else {
    // Metode permintaan tidak valid
    echo json_encode(['status' => 'error', 'message' => 'Metode permintaan tidak valid']);
}

// Tutup koneksi
$connk->close();
