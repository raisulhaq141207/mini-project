<?php
/**
 * Presentation Layer
 * Menggabungkan Data Layer dan Processing Layer, merender data ke tabel HTML.
 */

require_once "products.php";
require_once "functions.php";

$totalNilaiStok = hitungTotalNilaiStok($products);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Product Information System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #1a4d8f;
        }
        .summary {
            background-color: #eaf2fb;
            border-left: 4px solid #1a4d8f;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #1a4d8f;
            color: #fff;
        }
        tr.stok-kritis {
            background-color: #fdecea;
            color: #b00020;
            font-weight: bold;
        }
        .badge {
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
        .badge-kritis {
            background-color: #b00020;
            color: #fff;
        }
        .badge-aman {
            background-color: #2e7d32;
            color: #fff;
        }
    </style>
</head>
<body>

    <h1>Product Information System</h1>

    <div class="summary">
        Total Nilai Stok Gudang: <?= formatRupiah($totalNilaiStok) ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $produk): ?>
                <?php $status = cekStatusStok($produk["stok"]); ?>
                <tr class="<?= $status === "kritis" ? "stok-kritis" : "" ?>">
                    <td><?= htmlspecialchars($produk["id"]) ?></td>
                    <td><?= htmlspecialchars($produk["nama"]) ?></td>
                    <td><?= htmlspecialchars($produk["kategori"]) ?></td>
                    <td><?= formatRupiah($produk["harga"]) ?></td>
                    <td><?= htmlspecialchars($produk["stok"]) ?></td>
                    <td><?= htmlspecialchars($produk["deskripsi"]) ?></td>
                    <td>
                        <span class="badge <?= $status === "kritis" ? "badge-kritis" : "badge-aman" ?>">
                            <?= strtoupper($status) ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
