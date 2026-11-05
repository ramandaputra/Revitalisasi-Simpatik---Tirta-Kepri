<?php
include("x/koneksi.php");

try {
    // Get current month and year as default, format it to 'YYYYMM'
    $currentPeriod = date('Ym', strtotime('-1 month')); // e.g., '202409' for September 2024

    // Check if a period has been selected by the user
    $periode = isset($_GET['periode']) ? str_replace('-', '', $_GET['periode']) : $currentPeriod;

    // Query to fetch DMA data for the selected period, sorted by percentage
    $query = "SELECT dma, kehilangan, persentase FROM nrw_dma WHERE DATE_FORMAT(periode,'%Y%m') = '$periode' ORDER BY CAST(persentase AS DECIMAL(5,2)) DESC";

    // Execute the query using mysqli
    $result = mysqli_query($connk, $query);

    if (!$result) {
        throw new Exception("Query error: " . mysqli_error($connk));
    }

    // Fetch the data as an associative array
    $dmaData = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $dmaData[] = $row;
    }

    // Free the result set
    mysqli_free_result($result);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .red {
            background-color: #f8d7da;
        }

        .yellow {
            background-color: #fff3cd;
        }

        .green {
            background-color: #d4edda;
        }

        .table-responsive {
            max-height: 400px;
            overflow-y: auto;
        }

        table thead th {
            position: sticky;
            top: 0;
            background-color: #fff;
            z-index: 1;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Period Selection Form -->
        <form id="periodeForm" method="GET" class="mb-3">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <label for="periode" class="form-label">Pilih Periode:</label>
                    <input type="month" id="periode" name="periode" class="form-control" value="<?php echo htmlspecialchars(substr($periode, 0, 4) . '-' . substr($periode, 4)); ?>">
                </div>
            </div>
        </form>

        <!-- Table for DMA data -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-light">
                    <tr>
                        <th rowspan="2">DMA</th>
                        <th colspan="2">Kehilangan</th>
                    </tr>
                    <tr>
                        <th>m³</th>
                        <th>%</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($dmaData): ?>
                        <?php foreach ($dmaData as $row): ?>
                            <tr class="<?php
                                        if ($row['persentase'] >= 35) {
                                            echo 'red';
                                        } elseif ($row['persentase'] >= 25 && $row['persentase'] < 35) {
                                            echo 'yellow';
                                        } else {
                                            echo 'green';
                                        }
                                        ?>">
                                <td><?php echo htmlspecialchars($row['dma']); ?></td>
                                <td><?php echo number_format($row['kehilangan'], 0, ',', '.'); ?> m³</td>
                                <td><?php echo number_format($row['persentase'], 2, ',', '.'); ?>%</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">Data belum tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script to auto-submit the form when the period changes -->
    <script>
        document.getElementById('periode').addEventListener('change', function() {
            document.getElementById('periodeForm').submit();
        });
    </script>
</body>

</html>